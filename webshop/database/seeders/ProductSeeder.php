<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Big Boy Beanie Bag',
            'price' => '6000',
            'description' => 'heel bekend'
        ]);

        Product::factory()->count(20)->create();
    }
}
