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
    
}
