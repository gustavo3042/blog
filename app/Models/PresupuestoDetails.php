<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresupuestoDetails extends Model
{
    use HasFactory;


    protected $fillable = ['trabajo','descripcion','cantidadRepuestos','precioRepuestos','totalRepuestoss','cantidad','precio','amount','presupuestos_id'];


    public function jobs(){


        return $this->belongsToMany(Job::class);
      }
   
}
