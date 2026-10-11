<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['title' => 'В наличии', 'icon' => 'check'],
            ['title' => 'Под заказ', 'icon' => 'clock'],
            ['title' => 'Нет в наличии', 'icon' => 'times'],
        ];

        foreach ($statuses as $status) {
            Status::forceCreate($status);
        }
    }
}