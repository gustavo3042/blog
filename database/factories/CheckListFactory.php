<?php

namespace Database\Factories;

use App\Models\CheckList;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CheckListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CheckList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      $name= $this->faker->unique()->sentence();

        return [

'encargado' => $name,
'fecha' => $this->faker->date('Y-m-d'),
'status' => $this->faker->randomElement([1,2]),
'problema' => $this->faker->text(2000),
'solucion' => $this->faker->text(2000),
'patente' => $this->faker->firstname,

'user_id' => User::all()->random()->id,
//'client_id'=> Cliente::all()->random()->id

        ];
    }
}
