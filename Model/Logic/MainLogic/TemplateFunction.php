<?php

namespace Model\Logic\MainLogic;

use Model\Logic\DataContract;
use Model\Repository\MainFunction\TemplateRepository;

class TemplateFunction implements DataContract
{
    private $Repository;

    public function __construct()
    {
        $this->Repository = new TemplateRepository();
    }

    public function Register($data)
    {
        // TODO: Implement Register() method.
    }

    public function Update($QuerryString)
    {
        // TODO: Implement Update() method.
    }

    public function Delete($QuerryString)
    {
        // TODO: Implement Delete() method.
    }

    public function Show()
    {
        $Viewbag = ['Templates'=>$this->Repository->All()];
        return $Viewbag;
    }
}