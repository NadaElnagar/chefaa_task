<?php

namespace Database\Factories;

use App\Models\Pharmacies;
use Illuminate\Database\Eloquent\Factories\Factory;

class pharmaciesFactory   extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pharmacies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'address' =>  $this->faker->text()
        ];
    }
}
