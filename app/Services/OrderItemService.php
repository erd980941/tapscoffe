<?php
namespace App\Services;

use App\Repositories\OrderItemRepository;
use App\DTO\CreateOrderItemDTO;

class OrderItemService
{
    protected $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function getAllOrderItems()
    {
        return $this->orderItemRepository->getAllOrderItems();
    }

    public function findOrderItemById($id)
    {
        return $this->orderItemRepository->findOrderItemById($id);
    }

    public function createOrderItem(array $data)
    {
        return $this->orderItemRepository->createOrderItem($data);
    }

    public function updateOrderItem($id, array $data)
    {
        return $this->orderItemRepository->updateOrderItem($id, $data);
    }

    public function deleteOrderItem($id)
    {
        return $this->orderItemRepository->deleteOrderItem($id);
    }
}
