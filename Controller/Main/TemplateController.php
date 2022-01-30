<?php


namespace Controller\Main;


use Controller\BaseController;
use Model\Logic\MainLogic\TemplateFunction;
use Route\Show\View;

class TemplateController extends BaseController
{

    public function __construct()
    {
        $this->Function = new TemplateFunction();
    }
    public function list()
    {
        $Viewbag = $this->Function->Show();
        View::Process("Main.Home.Templates",$Viewbag);
    }

    public function single()
    {
        View::Process("Main.Home.Template");
    }
}
