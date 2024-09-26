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

    public function getAllTables()
    {
        return $this->tableRepository->getAllTables();
    }

    public function findTableById($id)
    {
        return $this->tableRepository->findTableById($id);
    }

    public function createTable(array $data)
    {
        return $this->tableRepository->createTable($data);
    }

    public function updateTable($id, array $data)
    {
        return $this->tableRepository->updateTable($id, $data);
    }

    public function deleteTable($id)
    {
        return $this->tableRepository->deleteTable($id);
    }
}
