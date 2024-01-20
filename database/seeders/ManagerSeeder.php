<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manager::factory()
            ->has(Order::factory()->count(3), 'orders')
            ->count(50)
            ->create();
    }
}
