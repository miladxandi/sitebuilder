<?php


namespace Model\Repository\MainFunction;


use Model\Repository\BaseRepository;

class CustomerRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->Table = 'customers';
    }

}
