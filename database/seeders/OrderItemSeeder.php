<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderItem::create(['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 30.00]);
        OrderItem::create(['order_id' => 1, 'product_id' => 2, 'quantity' => 1, 'price' => 100.00]);
    }
}
