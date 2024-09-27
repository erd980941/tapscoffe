<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\OrderItemService;
use App\Http\Controllers\Controller;

class OrderItemController extends Controller
{
    protected $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    public function index()
    {
        $orders = $this->orderItemService->getAllOrderItems();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = $this->orderItemService->findOrderItemById($id);
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $order = $this->orderItemService->createOrderItem($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, $id)
    {
        $order = $this->orderItemService->updateOrderItem($id, $request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $this->orderItemService->deleteOrderItem($id);
        return response()->json(null, 204);
    }
}
