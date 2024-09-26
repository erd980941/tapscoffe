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


}
