<?php


namespace Model\Logic\MainLogic;


use Model\Logic\DataContract;
use Model\Repository\MainFunction\CustomerRepository;

class CustomerFunction implements DataContract
{
    public $repository;
    public function __construct()
    {
        $this->repository =  new CustomerRepository();
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
        return $this->repository->All();
    }
}
