<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\OrderItemService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItemResource;

class OrderItemController extends Controller
{
    protected $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    public function index()
    {
        $orderItems = $this->orderItemService->getAllOrderItems();
        return OrderItemResource::collection($orderItems);
    }

    public function show($id)
    {
        $orderItem = $this->orderItemService->findOrderItemById($id);
        return new OrderItemResource($orderItem);
    }

    public function store(Request $request)
    {
        $orderItem = $this->orderItemService->createOrderItem($request->all());
        return new OrderItemResource($orderItem);
    }

    public function update(Request $request, $id)
    {
        $orderItem = $this->orderItemService->updateOrderItem($id, $request->all());
        return new OrderItemResource($orderItem);
    }

    public function destroy($id)
    {
        $this->orderItemService->deleteOrderItem($id);
        return response()->json(['message' => 'Order Item deleted successfully'], 204);
    }
}
