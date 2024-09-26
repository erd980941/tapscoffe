<?php
namespace App\Services;

use App\Repositories\TableRepository;
use App\DTO\CreateTableDTO;

class TableService
{
    protected $tableRepository;

    public function __construct(TableRepository $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }


}
