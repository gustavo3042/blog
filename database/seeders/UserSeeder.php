<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      User::create([
'name'=> 'Gustavo Andres Rios',
'email' =>'metal123z3042@gmail.com',
'password' =>bcrypt('12345678')

      ])->assignRole('Admin'); //se le asigna un rol a este usuario

User::factory(1)->create();
    }
}
