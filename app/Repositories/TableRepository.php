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
        try {

            $data = $this->model->create($data);

            return [
                'success' => true,
                'message' => 'Table added successfully',
                'data' => $data
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'An error occurred while add the table',
                'error' => $e->getMessage()
            ];
        }
    }

    public function updateTable($id, array $data)
    {
        try {
            $table = $this->findTableById($id);

            if (!$table) {
                return [
                    'success' => false,
                    'message' => 'Tablo bulunamadı.'
                ];
            }

            $table->update($data);

            return [
                'success' => true,
                'message' => 'Table updated successfully',
                'data' => $table  
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'An error occurred while updating the table',
                'error' => $e->getMessage()
            ];
        }
    }

    public function deleteTable($id)
{
    try {
        $table = $this->findTableById($id);

       

        $table->delete();

        return [
            'success' => true,
            'message' => 'Table deleted successfully'
        ];
    } catch (\Exception $e) {
        return [
            'success' => false,
            'message' => 'An error occurred while deleting the table',
            'error' => $e->getMessage()
        ];
    }
}

}
