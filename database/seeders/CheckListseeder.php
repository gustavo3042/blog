<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\CheckList; 


class CheckListseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

/*
      $check = CheckList::factory(1)->create();

      foreach ($check as $checklist) {

        Image::factory(1)->create([
        'imageable_id' => $checklist->id,
        'imageable_type' => CheckList::class

        ]);

        $checklist->reparaciones()->attach([

          rand(1,4),
          rand(5,8)

        ]);

      

      }

      */

    }

    

    //
}
