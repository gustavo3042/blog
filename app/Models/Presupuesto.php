<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;


    protected $fillable = ['total','iva','subtotal','check_lists_id'];


    public function checklist()
    {
        return $this->belongsTo(CheckList::class);
    }


    public function presupuestosDetails(){

        return $this->hasMany(PresupuestoDetails::class,'presupuestos_id');
  
      }

}
