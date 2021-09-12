<?php

namespace Database\Seeders;

use App\Models\PharmaciesProducts;
use Database\Factories\PharmaciesProductsFactory;
use Illuminate\Database\Seeder;

class PharmaciesProductsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       PharmaciesProducts::factory()->count(10000)->create();
     }
}
