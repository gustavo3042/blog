<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

     protected $table = 'venta_insumos'; 
     public $timestamps = false;

    protected $fillable = ['venta','precioVenta','stockInicial','stockPostVenta','totalVenta','fechaVenta','check_list_id','insumo_id'];

    public function insumos()
    {
        return $this->belongsTo(Insumo::class);
    }

}

    
 
