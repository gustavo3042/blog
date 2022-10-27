<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Reparaciones;
use App\Models\Cliente;
use App\Models\Tag;
use App\Models\Autos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();


Storage::deleteDirectory('posts');
Storage::makeDirectory('posts');
//Storage::deleteDirectory('check_lists');
//Storage::makeDirectory('check_lists');
//Storage::deleteDirectory('orden_servicios');
//Storage::makeDirectory('orden_servicios');

$this->call(RoleSeeder::class);
$this->call(UserSeeder::class);



Category::factory(0)->create();
Tag::factory(0)->create();
//Reparaciones::factory(8)->create();
//Autos::factory(5)->create();



$this->call(PostSeeder::class);

//Cliente::factory(5)->create();

//$this->call(CheckListseeder::class);

//$this->call(OrdenSeeder::class);



    }
}
