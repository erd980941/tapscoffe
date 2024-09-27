<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;

use App\Services\OrderService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = $this->orderService->findOrderById($id);
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $order = $this->orderService->createOrder($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, $id)
    {
        $order = $this->orderService->updateOrder($id, $request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $this->orderService->deleteOrder($id);
        return response()->json(null, 204);
    }
}
