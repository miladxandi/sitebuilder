<?php


namespace Controller\Panel;


use Controller\BaseController;
use Model\Logic\MainLogic\CustomerFunction;

class CustomerController extends  BaseController
{
    public function __construct()
    {
        $this->Function= new CustomerFunction();
    }
    public function All()
    {
        var_dump($this->Function->Show());
    }
}
