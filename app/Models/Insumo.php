<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Insumo extends Model
{
    use HasFactory;


    protected $fillable = ['name','descripcion','stock','precio','precioCompra','tipoProducto','status','fecha'];



    public Function imageInsumo(){

        return $this->morphOne(ImageInsumo::class, 'imageable');
    }


    public function checkList(){


        return $this->belongsToMany(CheckList::class);
      }


       public function ventas(){


        return $this->hasMany(Venta::class);


      } 

      public function totalVentas(){

        $inicioDeMes = Carbon::now()->startOfMonth();
        $finDeMes = Carbon::now()->endOfMonth();

        return Insumo::join('venta_insumos','venta_insumos.insumo_id','=','insumos.id')
        ->whereBetween('venta_insumos.fechaVenta',[$inicioDeMes, $finDeMes])
        ->where('insumo_id', $this->id)->sum('totalVenta');
      }

}
