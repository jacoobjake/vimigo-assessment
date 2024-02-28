<?php

namespace Database\Seeders;

use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Product 1',
                'description' => 'Some product',
                'subscription_fee' => 100,
            ],
            [
                'id' => 2,
                'name' => 'Product 2',
                'description' => 'Some product',
                'subscription_fee' => 130,
            ],
            [
                'id' => 3,
                'name' => 'Product 3',
                'description' => 'Some product',
                'subscription_fee' => 80,
            ],
        ];

        if(!Product::count()) {
            foreach($products as $product) {
                Product::create($product);
            }
        }
    }
}
