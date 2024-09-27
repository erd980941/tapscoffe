<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $payments = $this->paymentService->getAllPayments();
        return PaymentResource::collection($payments);
    }

    public function show($id)
    {
        $payment = $this->paymentService->findPaymentById($id);
        return new PaymentResource($payment);
    }

    public function store(Request $request)
    {
        $payment = $this->paymentService->createPayment($request->all());
        return new PaymentResource($payment);
    }

    public function update(Request $request, $id)
    {
        $payment = $this->paymentService->updatePayment($id, $request->all());
        return new PaymentResource($payment);
    }

    public function destroy($id)
    {
        $this->paymentService->deletePayment($id);
        return response()->json(['message' => 'Payment deleted successfully'], 204);
    }
}
