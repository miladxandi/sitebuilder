<?php


namespace Controller\Main;


use Route\Show\View;

class TemplateController
{
    public function list()
    {
        View::Process("Main.Home.Templates");
    }

    public function single()
    {
        View::Process("Main.Home.Template");
    }
}
