<?php
namespace App\Repositories;

use App\Models\OrderItem;

class OrderItemRepository
{
    protected $model;

    public function __construct(OrderItem $orderItem)
    {
        $this->model = $orderItem;
    }
    public function getAllOrderItems()
    {
        return $this->model->all();
    }

    public function findOrderItemById($id)
    {
        return $this->model->find($id);
    }

    public function createOrderItem(array $data)
    {
        return $this->model->create($data);
    }

    public function updateOrderItem($id, array $data)
    {
        $order = $this->findOrderItemById($id);
        return $order->update($data);
    }

    public function deleteOrderItem($id)
    {
        return $this->findOrderItemById($id)->delete();
    }
}