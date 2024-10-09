<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\TableService;
use App\Http\Controllers\Controller;
use App\Http\Resources\TableResource;

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
        return TableResource::collection($tables);
    }

    public function show($id)
    {
        $table = $this->tableService->findTableById($id);
        return new TableResource($table);
    }

    public function store(Request $request)
    {
        $table = $this->tableService->createTable($request->all());
        return new TableResource($table);
    }

    public function update(Request $request, $id)
    {
        $table = $this->tableService->updateTable($id, $request->all());
        return new TableResource($table);
    }

    public function destroy($id)
    {
        $response = $this->tableService->deleteTable($id);
        return response()->json($response);
    }
}
