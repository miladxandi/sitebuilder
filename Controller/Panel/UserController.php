<?php


namespace Controller\Panel;


use Controller\BaseController;
use Core\Configurations\Routing;
use Middleware\Important\Security;
use Model\Logic\MainLogic\UserFunction;
use Route\Show\View;

class UserController extends BaseController
{

    public function __construct()
    {
        $this->Function = new UserFunction();

    }

    public function Login($Input = null)
    {
        if (isset($_POST['submit']) && isset($_POST['Username']) && isset($_POST['Password'])) {
            $Viewbag = $this->Function->Login();
            $Viewbag['Title'] = 'Login';
            View::Process("Panel.User.Login", $Viewbag);
        }
        else {
            if (isset($_GET['Logout']) && strtolower($_GET['Logout']) == strtolower("True")) {
                if (isset($_COOKIE['Username'])) {
                    setcookie("Username", null, time() - 3600, "", $_SERVER['HTTP_HOST'], Routing::$SecureProtocol, true);
                    setcookie("Firstname",null,time()-3600,"",$_SERVER['HTTP_HOST'],Routing::$SecureProtocol,true);
                    setcookie("LoginToken",null,time()-3600,"",$_SERVER['HTTP_HOST'],Routing::$SecureProtocol,true);
                    setcookie("lcsrn_Validation",null,time()-3600,"",$_SERVER['HTTP_HOST'],Routing::$SecureProtocol,true);
                    $Viewbag = ['Success' => 'You Logged out successfully!!','Title' => 'Login'];
                    View::Process("Panel.User.Login", $Viewbag);

                } else {
                    $Viewbag = ['Title' => 'Login'];
                    View::Process("Panel.User.Login", $Viewbag);
                }
            }
            else {
                $Viewbag = ['Title' => 'Login'];
                View::Process("Panel.User.Login", $Viewbag);
            }
        }
    }

    public function Signup()
    {
        if (isset($_POST['submit']) && isset($_POST['Username']) && isset($_POST['Password'])  && isset($_POST['Firstname']) && isset($_POST['Lastname']) && isset($_POST['Email']) )
        {
            $Viewbag = $this->Function->Register($_POST);
            $Viewbag['Title'] = 'Signup';
            View::Process("Panel.User.Signup",$Viewbag);
        }
        else
        {
            $Viewbag = ['Title' => 'Signup'];
            View::Process("Panel.User.Signup",$Viewbag);
        }
    }



    public function Lock()
    {
        $this->Function->LockScreen();
        View::Process("Panel.User.Lockscreen");
    }
}
