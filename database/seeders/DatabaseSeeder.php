<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Product::factory()->create();
        Cart::factory(5)->create();
    }
}
