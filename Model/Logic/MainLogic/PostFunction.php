<?php
/**
 * Created by PhpStorm.
 * User: farva
 * Date: 13/04/2018
 * Time: 06:33 PM
 */

namespace Model\Logic\MainLogic;


use Model\Logic\DataContract;
use Model\Repository\MainFunction\PostRepository;
use Route\Show\View;

final class PostFunction implements DataContract
{
    private $Post;
    private $String;

    public function __construct()
    {
        $this->Post = new PostRepository();
    }

    public function Register($data)
    {
        if (isset($_POST['submit'])) {
            $Name = addslashes($_POST["PostName"]);
            $Url = addslashes(preg_replace('/\s+/', '-', $_POST["PostUrl"]));
            if (count_chars($_POST['PostContent']) <= 58) {
                $Summary = $_POST["PostContent"];
            } else {
                $Summary = substr($_POST["PostContent"], 0, 58);
            }
            $DefaultDirectory = "Content/Shared/Posts/";
            $FileType = "." . substr($_FILES["PostImage"]["type"], 6);
            $Content = addslashes($_POST["PostContent"]);
            $Author = $_COOKIE['Firstname'];
            $Date = $_COOKIE['Firstname'];;
            $Image = $_FILES["PostImage"]["name"];
            if ($Image != null) {
                $TargetFile = $DefaultDirectory . basename($_FILES["PostImage"]["name"]);
                if (file_exists($TargetFile)) {
                    $NewTargetFile = $DefaultDirectory . rand(0, 500000) . $FileType;
                    if (move_uploaded_file($_FILES["PostImage"]['tmp_name'], $NewTargetFile)) {
                        $Insert = $this->Post->Insert(['Post_Name'=>$Name, 'Post_Url'=>$Url, 'Post_Summary'=>$Summary, 'Post_Content'=>$Content,'Post_Author'=>$Author,'Post_Date'=>$Date,'Post_Image'=>$NewTargetFile]);
                        if ($Insert == 1) {
                            header("Location: /Panel/Posts");
                        } else {
                            header("Location: /Panel/NewPost");

                        }

                    } else {
                        echo "Image did not upload!";
                        header("Location: /Panel/NewPost");

                    }
                } else {
                    if (move_uploaded_file($_FILES["PostImage"]['tmp_name'], $TargetFile)) {
                        $Insert = $this->Post->Insert(['Post_Name'=>$Name, 'Post_Url'=>$Url, 'Post_Summary'=>$Summary, 'Post_Content'=>$Content,'Post_Author'=>$Author,'Post_Date'=>$Date,'Post_Image'=>$TargetFile]);
                        if ($Insert == 1) {
                            header("Location: /Panel/Posts");
                        } else {
                            header("Location: /Panel/NewPost");

                        }

                    } else {
                        echo "Image did not upload!";
                        header("Location: /Panel/NewPost");

                    }
                }
            } else {
                $Insert = $this->Post->Insert(['Post_Name'=>$Name, 'Post_Url'=>$Url, 'Post_Summary'=>$Summary, 'Post_Content'=>$Content,'Post_Author'=>$Author,'Post_Date'=>$Date,'Post_Image'=>"Content/Shared/SimplistV2.png"]);
                if ($Insert == 1) {
                    header("Location: /Panel/Posts");
                } else {
                    header("Location: /Panel/NewPost");

                }
            }
        }
    }

    public function Update($QuerryString)
    {
        $Id = $QuerryString['pid'];
        if ($this->Post->GetPostById($Id)['Rows'] == 1) {
            $Viewbag = ['PostInfo' => $this->Post->GetPostById($Id)['Values']];
            if ($Viewbag['PostInfo'][0]['Post_Author'] == $_COOKIE['Firstname']) {
                if (isset($_POST['submit'])) {

                    $PostInfo = $Viewbag['PostInfo'][0];
                    $PrevImage = $PostInfo['Post_Image'];
                    $DefaultDirectory = "Content/Shared/Posts/";
                    $FileType = "." . substr($_FILES["PostImage"]["type"], 6);
                    $Id = $PostInfo['Post_Id'];
                    $Name = $_POST["PostName"];
                    $Url = preg_replace('/\s+/', '-', $_POST["PostUrl"]);
                    if (count_chars($_POST['PostContent']) <= 58) {
                        $Summary = $_POST["PostContent"];

                    } else {
                        $Summary = substr($_POST["PostContent"], 0, 58);
                    }
                    $Content = $_POST["PostContent"];
                    $Author = $_POST["PostAuthor"];
                    $Image = $_FILES["PostImage"]["name"];

                    if ($Image != null) {
                        $TargetFile = $DefaultDirectory . basename($Image);
                        if (file_exists($TargetFile)) {
                            $NewTargetFile = $DefaultDirectory . rand(0, 500000) . $FileType;
                            if (move_uploaded_file($_FILES["PostImage"]['tmp_name'], $NewTargetFile)) {
                                $Update = $this->Post->Update($Id, $Name, $Url, $Summary, $Content, $Author, $NewTargetFile);
                                if ($Update['Rows'] == 1) {
                                    unlink($PostInfo['Post_Image']);
                                    header("Location: /Panel/Posts");
                                } else {
                                    header("Location: /Panel/Posts/Update/?pid=" . $PostInfo['Post_Id']);

                                }

                            } else {
                                echo "Image did not upload!";
                                header("Location: /Panel/Posts/Update/?pid=" . $PostInfo['Post_Id']);

                            }
                        } else {
                            if (move_uploaded_file($_FILES["PostImage"]['tmp_name'], $TargetFile)) {
                                $Update = $this->Post->Update($Id, $Name, $Url, $Summary, $Content, $Author, $TargetFile);
                                if ($Update['Rows'] == 1) {

                                    unlink($PostInfo['Post_Image']);
                                    header("Location: /Panel/Posts");
                                } else {
                                    header("Location: /Panel/Posts/Update/?pid=" . $PostInfo['Post_Id']);

                                }

                            } else {
                                echo "Image did not upload!";
                                header("Location: /Panel/Posts/Update/?pid=" . $PostInfo['Post_Id']);

                            }
                        }
                    } else {
                        $Update = $this->Post->Update($Id, $Name, $Url, $Summary, $Content, $Author, $PrevImage);
                        if ($Update['Rows'] == 1) {
                            header("Location: /Panel/Posts");
                        } else {
                            header("Location: /Panel/Posts/Update/?pid=" . $PostInfo['Post_Id']);

                        }
                    }

                }
                View::Process("Panel.Admin.PostUpdate", $Viewbag);
            } else {
                header("Location: /Forbidden");
            }
        } else {
            View::Process("Helper.Home.Error404");
        }
    }

    public function Delete($QuerryString)
    {
        $Id = $QuerryString['pid'];
        if ($this->Post->GetPostById($Id)['Rows'] == 1) {
            $Viewbag = ['PostInfo' => $this->Post->GetPostById($Id)['Values']];
            if ($Viewbag['PostInfo'][0]['Post_Author'] == $_COOKIE['Firstname']) {
                $PostInfo = $Viewbag['PostInfo'][0];
                unlink($PostInfo['Post_Image']);
                $Delete = $this->Post->Delete($Id);

                if ($Delete['Rows'] == 1) {
                    header("Location: /Panel/Posts");
                } else {
                    header("Location: /Panel/Posts/Update/?pid=0");
                }
            } else {
                header("Location: /Forbidden");
            }
        } else {
            View::Process("Helper.Home.Error404");
        }
    }

    public function Show()
    {
        return $this->Post->GetPost();
    }
}
