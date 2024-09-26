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

    public function getAllPayments()
    {
        return $this->paymentRepository->getAllPayments();
    }

    public function findPaymentById($id)
    {
        return $this->paymentRepository->findPaymentById($id);
    }

    public function createPayment(array $data)
    {
        return $this->paymentRepository->createPayment($data);
    }

    public function updatePayment($id, array $data)
    {
        return $this->paymentRepository->updatePayment($id, $data);
    }

    public function deletePayment($id)
    {
        return $this->paymentRepository->deletePayment($id);
    }
}
