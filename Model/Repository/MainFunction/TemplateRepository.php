<?php

namespace Model\Repository\MainFunction;

use Model\Repository\BaseRepository;

class TemplateRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->Table = "templates";
        $this->PrimaryKey = "Id";
    }
}