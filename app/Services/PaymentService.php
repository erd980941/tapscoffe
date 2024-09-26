<?php
namespace App\Services;

use App\Repositories\PaymentRepository;
use App\DTO\CreatePaymentDTO;

class PaymentService
{
    protected $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }


}
