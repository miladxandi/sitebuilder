<?php

namespace Route\Core;


use Middleware\Important\Security;
use Model\Repository\MainFunction\UrlRepository;
use Route\Show\View;
use Plugin\Utility\Jsoner;

class Router
{

    protected static $BaseController="Controller\\";
    protected static $BaseMiddleware="Middleware\\";
    public static function Register()
    {
        $CurrentRoute= self::getCurrentRoute()['URI'];
        $QueryString= self::getCurrentRoute()['QuerryString'];
        if (strpos(strtolower($CurrentRoute),preg_replace('/[A-Z]+/','api','api'))==1)
        {
            $Api = self::isApiDefined($CurrentRoute);
            $Allowed=null;
            $Blocked=null;
            foreach (explode(',',$Api['allowed']) as $AllowedVerb)
            {
                $Allowed[strtolower($AllowedVerb)] = strtolower($AllowedVerb);
            }
            foreach (explode(',',$Api['blocked']) as $BlockedVerb)
            {
                $Blocked[strtolower($BlockedVerb)] = strtolower($BlockedVerb);
            }
            $CurrentApiVerb = self::currentRequestVerb();
            if (array_search(strtolower($CurrentApiVerb),($Allowed))==strtolower($CurrentApiVerb) && array_search(strtolower($CurrentApiVerb),$Blocked)!=strtolower($CurrentApiVerb) && $Api!=0)
            {
                list($Folder,$Controller,$Method)=explode(".",$Api['target']);
                $ControllerClass= self::$BaseController.$Folder."\\".$Controller."Controller";
                $ControllerInstance = new $ControllerClass;
                $MiddlewareInstance= new Security();

                if ($Api['middleware']!="")
                {
                    list($Way,$Series,$Check)=explode(".",$Api['middleware']);
                    $MiddlewareClass = self::$BaseMiddleware.$Way."\\".$Series."Middleware";
                    $MiddlewareInstance= new $MiddlewareClass;
                    if (method_exists($ControllerInstance,"$Method")&& method_exists($MiddlewareInstance,"$Check"))
                    {
                        if ($QueryString!=null)
                        {
                            if($MiddlewareInstance->$Check($CurrentApiVerb,$QueryString)['Status']==true)
                            {
                                $ControllerInstance->$Method($CurrentApiVerb,$QueryString);
                            }
                            else
                            {

                                header("Location: ".$MiddlewareInstance->$Check($CurrentApiVerb,$QueryString)['Route']."");
                            }
                        }
                        else
                        {
                            if($MiddlewareInstance->$Check()['Status']==true)
                            {
                                $ControllerInstance->$Method($CurrentApiVerb);
                            }
                            else
                            {
                                header("Location: ".$MiddlewareInstance->$Check()['Route']."");
                            }
                        }
                    }
                }
                else if (method_exists($ControllerInstance,"$Method") )
                {
                    if($QueryString!=null)
                    {
                        if($MiddlewareInstance->Index()['Status']==true)
                        {
                            $ControllerInstance->$Method($CurrentApiVerb,$QueryString);
                        }
                        else
                        {

                            header("Location: ".$MiddlewareInstance->Index()['Route']."");
                        }

                    }
                    else
                    {
                        if($MiddlewareInstance->Index()['Status']==true)
                        {
                            $ControllerInstance->$Method();
                        }
                        else
                        {

                            header("Location: ".$MiddlewareInstance->Index()['Route']."");
                        }
                    }
                }
                else
                {
                    Jsoner::Json(["Code"=>404,"Text"=>"Not Found"],404);
                }
            }
            else
            {
                if ($Api == 0)
                {
                    Jsoner::Json(["Code"=>404,"Text"=>"Not Found"],404);
                }
                elseif (array_search(strtolower($CurrentApiVerb),$Blocked)==strtolower($CurrentApiVerb) || array_search(strtolower($CurrentApiVerb),$Allowed)!=strtolower($CurrentApiVerb))
                {
                    Jsoner::Json(["Code"=>405,"Text"=>"Method Not Allowed"],404);

                }
                else
                {
                    Jsoner::Json(["Code"=>402,"Text"=>"Bad request"],402);
                }
            }
        }
        else
        {
            $Routes = self::isRouteDefined($CurrentRoute);
            $GetRequestVerb = $Routes['get'];
            $PostRequestVerb = $Routes['post'];
            $CurrentRouteVerb = self::currentRequestVerb();
            if (($CurrentRouteVerb=='get' && $GetRequestVerb == true)||($CurrentRouteVerb == 'post' && $PostRequestVerb == true))
            {
                list($Folder,$Controller,$Method)=explode(".",$Routes['target']);
                $ControllerClass= self::$BaseController.$Folder."\\".$Controller."Controller";
                $ControllerInstance = new $ControllerClass;
                $MiddlewareInstance= new Security();

                if ($Routes['middleware']!="")
                {
                    list($Way,$Series,$Check)=explode(".",$Routes['middleware']);
                    $MiddlewareClass = self::$BaseMiddleware.$Way."\\".$Series."Middleware";
                    $MiddlewareInstance= new $MiddlewareClass;
                    if (method_exists($ControllerInstance,"$Method")&& method_exists($MiddlewareInstance,"$Check"))
                    {
                        if ($QueryString!=null)
                        {
                            if($MiddlewareInstance->$Check($QueryString)['Status']==true)
                            {
                                $ControllerInstance->$Method($QueryString);
                            }
                            else
                            {

                                header("Location: ".$MiddlewareInstance->$Check($QueryString)['Route']."");
                            }
                        }
                        else
                        {
                            if($MiddlewareInstance->$Check()['Status']==true)
                            {
                                $ControllerInstance->$Method();
                            }
                            else
                            {
                                header("Location: ".$MiddlewareInstance->$Check()['Route']."");
                            }
                        }
                    }
                }
                else if (method_exists($ControllerInstance,"$Method"))
                {
                    if ($QueryString!=null)
                    {
                        if($MiddlewareInstance->Index($QueryString)['Status']==true)
                        {
                            $ControllerInstance->$Method($QueryString);
                        }
                        else
                        {

                            header("Location: ".$MiddlewareInstance->Index($QueryString)['Route']."");
                        }
                    }
                    else
                    {
                        if($MiddlewareInstance->Index()['Status']==true)
                        {
                            $ControllerInstance->$Method();
                        }
                        else
                        {
                            header("Location: ".$MiddlewareInstance->Index()['Route']."");
                        }
                    }
                }
                else
                {
                    View::Process('Helper.Home.Error404');
                }
            }
            else if ($Routes==1)
            {
                $Url = new UrlRepository();
                $Url->Counter(substr(self::getCurrentRoute()['URI'],3));
                $UrlAddress = $Url->FindByUrl(substr(self::getCurrentRoute()['URI'],3))['Values'][0];
                header("Location: ".$UrlAddress['target']);
            }
            else if ($Routes==2)
            {
                $Url = new UrlRepository();
                $Url->Counter(substr(self::getCurrentRoute()['URI'],7));
                $UrlAddress = $Url->FindByUrl(substr(self::getCurrentRoute()['URI'],7))['Values'][0];
                header("Location: ".$UrlAddress['target']);

            }
            else
            {
                if ($Routes==0)
                {
                    View::Process('Helper.Home.Error404');
                }
                else
                {
                    if ($CurrentRouteVerb=='get' && $GetRequestVerb == false)
                    {
                        header("Location: /methodnotallowed");
                    }
                    else if($CurrentRouteVerb=='post' && $PostRequestVerb == true)
                    {
                        header("Location: /methodnotallowed");
                    }
                    else
                    {
                        View::Process('Helper.Home.Error404');
                    }
                }
            }
        }
    }

    public static function getCurrentRoute()
    {
        $QueryString=null;
        $URI=$_SERVER['REQUEST_URI'];
        $QueryString = null;
        foreach ($_REQUEST as $Key => $Req)
        {
            $QueryString[$Key] = $Req;
        }
        return ['QuerryString'=>$QueryString,'URI'=>$URI];
    }

    public static function isRouteDefined(string $FullRoute)
    {
        $Url = new UrlRepository();

        if (strpos($FullRoute, "?"))
        {
            $Route = substr($FullRoute, 0, strpos($FullRoute, "?"));
        }
        else
        {
            $Route = $FullRoute;
        }
        $Routes = self::getRoutes();
        if (array_key_exists(preg_replace('/[A-Z]/',strtolower($Route),strtolower($Route)),$Routes) )
        {
            return $Routes[preg_replace('/[A-Z]/',strtolower($Route),strtolower($Route))];
        }
        else if ($Url->FindByUrl(substr(self::getCurrentRoute()['URI'],3))['Rows']==1)
        {
            return 1;
        }
        else if ($Url->FindByUrl(substr(self::getCurrentRoute()['URI'],7))['Rows']==1)
        {
            return 2;
        }
        elseif (array_key_exists($Route,$Routes) && $Routes[$Route]['important'] == true )
        {
            return $Routes[$Route];
        }
        else
        {
            return 0;
        }
    }
    public static function isApiDefined(string $FullApi)
    {
        if (strpos($FullApi, "?"))
        {
            $Api = substr($FullApi, 0, strpos($FullApi, "?"));
        }
        else
        {
            $Api = $FullApi;
        }
        $ListApi = self::getApi();
        if (array_key_exists(preg_replace('/[A-Z]/',strtolower($Api),strtolower($Api)),$ListApi))
        {
            return $ListApi[preg_replace('/[A-Z]/',strtolower($Api),strtolower($Api))];
        }
        elseif (array_key_exists($Api,$ListApi) && $ListApi[$Api]['important'] == true )
        {
            return $ListApi[$Api];
        }
        else
        {
            return 0;
        }
    }

    public static function getRoutes()
    {
        $Routes = include PATH . DIRECTORY_SEPARATOR . 'Setting/Routes.php';
        return $Routes;
    }
    public static function getApi()
    {
        $Routes = include PATH . DIRECTORY_SEPARATOR . 'Setting/Api.php';
        return $Routes;
    }
    public static function currentRequestVerb()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}