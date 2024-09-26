<?php
namespace App\DTO;

class CreateOrderDTO
{
    public $customer_id;
    public $total_price;

    public function __construct($customer_id, $total_price)
    {
        $this->customer_id = $customer_id;
        $this->total_price = $total_price;
    }
}
