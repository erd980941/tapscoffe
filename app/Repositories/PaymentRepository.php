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
    public function getAllPayments()
    {
        return $this->model->all();
    }

    public function findPaymentById($id)
    {
        return $this->model->find($id);
    }

    public function createPayment(array $data)
    {
        return $this->model->create($data);
    }

    public function updatePayment($id, array $data)
    {
        $order = $this->findPaymentById($id);
        return $order->update($data);
    }

    public function deletePayment($id)
    {
        return $this->findPaymentById($id)->delete();
    }
}
