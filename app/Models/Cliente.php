<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','direccion','telefono','correo','check_lists_id'];



    public function check_lists(){


return $this->hasMany(CheckList::class);


    }




    public function ordenservicio(){


      return $this->hasMany(OrdenServicio::class);


    }
}
