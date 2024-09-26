<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TableService;

class TableController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function index()
    {
        $tables = $this->tableService->getAllTables();
        return response()->json($tables);
    }

    public function show($id)
    {
        $table = $this->tableService->findTableById($id);
        return response()->json($table);
    }

    public function store(Request $request)
    {
        $table = $this->tableService->createTable($request->all());
        return response()->json($table, 201);
    }

    public function update(Request $request, $id)
    {
        $table = $this->tableService->updateTable($id, $request->all());
        return response()->json($table);
    }

    public function destroy($id)
    {
        $this->tableService->deleteTable($id);
        return response()->json(null, 204);
    }
}
