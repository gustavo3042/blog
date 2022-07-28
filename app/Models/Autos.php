<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    use HasFactory;

    protected $fillable = ['marca','modelo','ano','color','check_lists_id','tipoDireccion','tipoTraccion','tipoCombustion','cilindrada'];


    public function orden_servicio(){


return $this->hasMany(OrdenServicio::class);


    }


    
    public function check_lists(){


        return $this->hasMany(CheckList::class);
        
        
            }


            
}
