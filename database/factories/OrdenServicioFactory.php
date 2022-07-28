<?php

namespace Database\Factories;

use App\Models\OrdenServicio;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Autos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrdenServicioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrdenServicio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      /*


        $name= $this->faker->unique()->sentence();

        return [

          'encargado' => $name,
          'fecha' => $this->faker->date('Y-m-d'),
          'status' => $this->faker->randomElement([1,2]),
          'problema' => $this->faker->text(2000),
          'solucion' => $this->faker->text(2000),
          'patente' => $this->faker->firstname,

          'user_id' => User::all()->random()->id,
          'cliente_id'=> Cliente::all()->random()->id,
          'auto_id' => Autos::all()->random()->id


        ];


        */
    }
}
