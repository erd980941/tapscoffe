<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Çay', 'price' => 30.00, 'type' => 'drink']);
        Product::create(['name' => 'Americano', 'price' => 100.00, 'type' => 'drink']);
        Product::create(['name' => 'Limonata', 'price' => 125.00, 'type' => 'drink']);
    }
}
