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
    
}