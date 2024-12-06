<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','direccion','telefono','correo','check_lists_id'];



    public function check_lists():BelongsToMany{


    return $this->belongsToMany(CheckList::class,'clientes_check_list','clientes_id','check_lists_id');


    }




    public function ordenservicio(){


      return $this->hasMany(OrdenServicio::class);


    }
}
