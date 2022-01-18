<?php

namespace Controller\Main;


use Controller\BaseController;
use Model\Logic\MainLogic\PostFunction;
use Model\Repository\MainFunction\PostRepository;
use Route\Show\View;

class HomeController extends BaseController
{

	public function __construct()
	{
		$this->Function = new PostFunction();
		$this->Repository = new PostRepository();
	}

	public function Index()
	{
        $Viewbag = ['PostInfo'=>$this->Function->Show()];
		View::Process("Main.Home.Index",$Viewbag);
	}

	public function Signup()
	{
        $Viewbag = ['PostInfo'=>$this->Function->Show()];
        View::Process("Main.Home.Signup",$Viewbag);
	}
    public function Login ()
    {
        $Viewbag = ['PostInfo'=>$this->Function->Show()];
        View::Process("Main.Home.Login",$Viewbag);
    }
}