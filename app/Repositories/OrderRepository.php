<?php
namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    protected $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function getAllOrders()
    {
        return $this->model->all();
    }

    public function findOrderById($id)
    {
        return $this->model->find($id);
    }

    public function createOrder(array $data)
    {
        return $this->model->create($data);
    }

    public function updateOrder($id, array $data)
    {
        $order = $this->findOrderById($id);
        return $order->update($data);
    }

    public function deleteOrder($id)
    {
        return $this->findOrderById($id)->delete();
    }
    
}
