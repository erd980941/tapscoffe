<?php
namespace App\Services;

use App\Repositories\OrderRepository;
use App\DTO\CreateOrderDTO;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


}
