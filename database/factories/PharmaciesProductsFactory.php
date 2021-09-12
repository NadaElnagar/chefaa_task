<?php

namespace Database\Factories;

use App\Models\Pharmacies;
use App\Models\PharmaciesProducts;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class PharmaciesProductsFactory  extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PharmaciesProducts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_ids =  Products::pluck('id')->toarray();
        $pharmacies_ids =  Pharmacies::pluck('id')->toarray();
        return [
            'products_id' =>$product_ids[array_rand($product_ids)],
            'pharmacies_id' =>  $pharmacies_ids[array_rand($pharmacies_ids)],
            'quantity' =>  $this->faker->numberBetween(0, 9999),
            'price' =>  $this->faker->numberBetween(0, 9999),
        ];
    }
}
