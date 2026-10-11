<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'MacBook Pro 16"',
                'content' => 'Мощный ноутбук для профессионалов',
                'category_id' => 1,
                'status_id' => 1,
                'price' => 199990,
                'old_price' => 219990,
                'hit' => 1,
                'sale' => 0,
            ],
            [
                'title' => 'iPhone 15 Pro',
                'content' => 'Флагманский смартфон',
                'category_id' => 2,
                'status_id' => 1,
                'price' => 129990,
                'old_price' => 139990,
                'hit' => 1,
                'sale' => 1,
            ],
            [
                'title' => 'iPad Air',
                'content' => 'Лёгкий и мощный планшет',
                'category_id' => 3,
                'status_id' => 2,
                'price' => 59990,
                'old_price' => 0,
                'hit' => 0,
                'sale' => 0,
            ],
        ];

        foreach ($products as $product) {
            Product::forceCreate($product);
        }
    }
}