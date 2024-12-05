<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class CheckList extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];




    public function user(){


      return $this->belongsTo(User::class);
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

    public function insumos():BelongsToMany{


      return $this->belongsToMany(Insumo::class,'insumos_check_list','check_list_id','insumo_id');
    }

    public function autos(): BelongsToMany
    {
        return $this->belongsToMany(Autos::class, 'autos_check_list', 'check_lists_id', 'autos_id');
    }

    public function clientes(): BelongsToMany
    {

      return $this->belongsToMany(Cliente::class,'clientes_check_list','check_lists_id','clientes_id');
    }

  /*    public function autos(): BelongsToMany
    {
        return $this->belongsToMany(Autos::class,'check_lists_id');
    } 
  */
 /*     public function autos()
    {
        return $this->belongsTo(Autos::class);
    }  */

  /*   public function autos()
    {
        return $this->belongsTo(Autos::class);
    } */


   /*  public function insumosVenta(){

      return $this->belongsToMany(Insumo::class)->withPivot('venta', 'precioVenta','stockInicial','stockPostVenta');

    } */


}
