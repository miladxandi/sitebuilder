<?php

namespace Core\Requirement;


class oLoad
{
    private $BaseUrl;
    private $Css;
    private $Js;
    private $Image;
    public function __construct(string $CssPath,string $JsPath,string $ImagePath)
    {
        $this->BaseUrl='';
        $this->Css= $CssPath;
        $this->Js= $JsPath;
        $this->Image= $ImagePath;

    }
    public function Loader(string $Extension,string $Name,string $UniqueUrl=null,$Local=false,bool $UniqueType=false,string $ImageAlt=null,int $ImageWidth=null,int $ImageHeight=null,string $ImageStyle=null,string $ImageClass=null)
    {
        if (($UniqueUrl==null || $UniqueUrl=="") && $UniqueType==false)
        {
            if ($Extension=="js")
            {
                echo '<script src="'.$this->BaseUrl."/".$this->Js."/".$Name.".".$Extension.'"></script>';
            }
            else if($Extension=="css")
            {
                echo '<link rel="stylesheet" type="text/css" href="'.$this->BaseUrl."/".$this->Css."/".$Name.".".$Extension  .'">';
            }
            else if($Extension=="png"||$Extension=="jpg"||$Extension=="jpeg"||$Extension=="ico")
            {
                echo '<img src="'. $this->BaseUrl."/".$this->Image."/".$Name.".".$Extension  .'" Width="'.$ImageWidth.'px" Height="'.$ImageHeight.'px" Class="'.$ImageClass.'" alt="'.$ImageAlt.'">';
            }
        }
        else
        {
            if ($UniqueType==true&&$UniqueUrl!=null)
            {
                if ($Local==true )
                {
                    echo '../../../'.$UniqueUrl."/".$Name.".".$Extension.'';
                }
                else if ($Local==false)
                {
                    echo ''.$UniqueUrl."/".$Name.".".$Extension.'';
                }
            }
            else if($UniqueType!=true && ($UniqueUrl!=null || $UniqueUrl!=""))
            {
                if ($Local==false || $Local=="")
                {
                    if ($Extension=="js")
                    {
                        echo '<script src="'.$UniqueUrl."/".$Name.".".$Extension.'"></script>';
                    }
                    else if($Extension=="css")
                    {
                        echo '<link rel="stylesheet" type="text/css" href="'.$UniqueUrl."/".$Name.".".$Extension.'">';
                    }
                    else if($Extension=="png"||$Extension=="jpg"||$Extension=="jpeg"||$Extension=="ico")
                    {
                        echo '<img src="'.$UniqueUrl."/".$Name.".".$Extension.'" Width="'.$ImageWidth.'px" Height="'.$ImageHeight.'px" Class="'.$ImageClass.'" Style="'.$ImageStyle.'" alt="'.$ImageAlt.'">';
                    }
                }
                elseif ($Local==true)
                {
                    if ($Extension=="js")
                    {
                        echo '<script src="'."../../../Script/".$UniqueUrl."/".$Name.".".$Extension.'"></script>';
                    }
                    else if($Extension=="css")
                    {
                        echo '<link rel="stylesheet" type="text/css" href="'."../../../Style/".$UniqueUrl."/".$Name.".".$Extension.'">';
                    }
                    else if($Extension=="png"||$Extension=="jpg"||$Extension=="jpeg"||$Extension=="ico")
                    {
                        echo '<img src="'."../../../Content/".$UniqueUrl."/".$Name.".".$Extension.'" Width="'.$ImageWidth.'px" Height="'.$ImageHeight.'px" Class="'.$ImageClass.'" Style="'.$ImageStyle.'" alt="'.$ImageAlt.'">';
                    }
                }
                else
                {
                    if ($Extension=="js")
                    {
                        echo '<script src="'.$UniqueUrl."/".$Name.".".$Extension.'"></script>';
                    }
                    else if($Extension=="css")
                    {
                        echo '<link rel="stylesheet" type="text/css" href="'.$UniqueUrl."/".$Name.".".$Extension.'">';
                    }
                    else if($Extension=="png"||$Extension=="jpg"||$Extension=="jpeg"||$Extension=="ico")
                    {
                        echo '<img src="'.$UniqueUrl."/".$Name.".".$Extension.'" Width="'.$ImageWidth.'px" Height="'.$ImageHeight.'px" Style="'.$ImageStyle.'" alt="'.$ImageAlt.'">';
                    }
                }
            }
        }
    }
}
