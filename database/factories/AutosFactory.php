<?php

namespace Database\Factories;

use App\Models\Autos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AutosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Autos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


      $name = $this->faker->unique()->word(20);

        return [

          'marca' => $name,
          'modelo'=> $this->faker->lastName,
          'ano' => $this->faker->date('Y-m-d'),
          'color'=>  $this->faker->randomElement(['red','yellow','green','blue','indigo','purple','pink'])



        ];
    }
}
