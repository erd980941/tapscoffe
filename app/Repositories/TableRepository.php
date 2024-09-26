<?php
namespace App\Repositories;

use App\Models\Table;

class TableRepository
{
    protected $model;

    public function __construct(Table $table)
    {
        $this->model = $table;
    }
    public function getAllTables()
    {
        return $this->model->all();
    }

    public function findTableById($id)
    {
        return $this->model->find($id);
    }

    public function createTable(array $data)
    {
        return $this->model->create($data);
    }

    public function updateTable($id, array $data)
    {
        $order = $this->findTableById($id);
        return $order->update($data);
    }

    public function deleteTable($id)
    {
        return $this->findTableById($id)->delete();
    }
}
