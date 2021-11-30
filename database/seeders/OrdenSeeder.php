<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\OrdenServicio;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $orden = OrdenServicio::factory(20)->create();

      foreach ($orden as $servicio) {

        Image::factory(20)->create([
        'imageable_id' => $servicio->id,
        'imageable_type' => OrdenServicio::class

        ]);
    }
}
}
