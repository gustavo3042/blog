<?php

namespace Database\Factories;

use App\Models\reparaciones;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class reparacionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = reparaciones::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      $name = $this->faker->unique()->word(20);
        return [

          'name' => $name,
          'Precio' => $this->faker->numberBetween($min = 1500, $max = 450000)

          //randomDigit
        ];
    }
}
