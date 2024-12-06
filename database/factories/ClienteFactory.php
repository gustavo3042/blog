<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\CheckList ;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      /*

  $name = $this->faker->unique()->word(20);

        return [

          'nombre' => $name,
          'direccion' => $this->faker->lastName,
          'telefono' =>$this->faker->phoneNumber,
          'correo' => $this->faker->unique()->safeEmail,
          'check_lists_id' => CheckList::all()->random()->id

        ];

        */
    }
}
