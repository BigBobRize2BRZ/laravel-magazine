<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['title' => 'Ноутбуки'],
            ['title' => 'Смартфоны'],
            ['title' => 'Планшеты'],
        ];

        foreach ($categories as $category) {
            Category::forceCreate($category);
        }
    }
}