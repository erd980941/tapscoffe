<?php

namespace App\Services;

use App\DTO\CreateOrderDTO;
use Illuminate\Support\Facades\DB;
use App\Repositories\OrderRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\TableRepository;

class OrderService
{
    protected $orderRepository;
    protected $orderItemRepository;
    protected $tableRepository;

    public function __construct(OrderRepository $orderRepository, OrderItemRepository $orderItemRepository, TableRepository $tableRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->tableRepository = $tableRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function findOrderById($id)
    {
        return $this->orderRepository->findOrderById($id);
    }

    public function createOrder(array $data)
    {

        return DB::transaction(function () use ($data) {

            $order =  $this->orderRepository->createOrder([
                'table_id' => $data['table_id'],
                'user_id' => 1
            ]);



            foreach ($data['order_items'] as $item) {
                $this->orderItemRepository->createOrderItem([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            return $this->tableRepository->updateStatus($data['table_id'], 'occupied');
        });
    }

    public function updateOrder($id, array $data)
    {
        try {
            return DB::transaction(function () use ($id, $data) {

                $order =  $this->orderRepository->findOrderById($id);
    
    
                foreach ($data['order_items'] as $item) {
                    $this->orderItemRepository->createOrderItem([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
    
                $table =  $this->tableRepository->findTableById($data['table_id']);
                return [
                    'success' => true,
                    'message' => "Siparişler Başarıyla Güncellendi!",
                    'data' => $table
                ];
            });
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'An error occurred while updating the order',
                'error' => $e->getMessage()
            ];
        }
    }

    public function deleteOrder($id)
    {
        return $this->orderRepository->deleteOrder($id);
    }
}
