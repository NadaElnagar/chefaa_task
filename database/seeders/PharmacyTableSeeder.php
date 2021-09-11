<?php

namespace Database\Seeders;

use App\Models\Pharmacies;
use Illuminate\Database\Seeder;

class PharmacyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pharmacies::factory()->count(20000)->create();
    }
}
