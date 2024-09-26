<?php
namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    protected $model;

    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }
    
}
