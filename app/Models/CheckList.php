<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class CheckList extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];




    public function user(){


      return $this->belongsTo(User::class);
    }


    public function clientes(){


      return $this->belongsTo(Cliente::class);
    }


    public function reparaciones(){

      return $this->belongsToMany(Reparaciones::class);

    }


    public function image(){

      return $this->morphOne(Image::class, 'imageable');
    }

    public function presupuestos(){

      return $this->hasMany(Presupuesto::class,'check_lists_id');

    }

    public function insumos(){


      return $this->belongsToMany(Insumo::class);
    }


   /*  public function insumosVenta(){

      return $this->belongsToMany(Insumo::class)->withPivot('venta', 'precioVenta','stockInicial','stockPostVenta');

    } */


}
