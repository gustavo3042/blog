<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Autos extends Model
{
    use HasFactory;

    protected $fillable = ['patente','marca','modelo','ano','color','check_lists_id','tipoDireccion','tipoTraccion','tipoCombustion','cilindrada'];


    public function check_lists(): BelongsToMany
    {
        return $this->belongsToMany(CheckList::class, 'autos_check_list', 'autos_id', 'check_lists_id');
    }

 /*    public function check_lists(): BelongsToMany
    {
        return $this->belongsToMany(CheckList::class,'autos_id');
    }  */


   /*   public function check_lists()
    {
        return $this->belongsToMany(CheckList::class);
    }  */

  /*     public function check_lists()
    {
        return $this->hasMany(CheckList::class);
    }  */
 

/*  public function fichasTecnicas()
 {
     return $this->belongsToMany(CheckList::class, 'check_lists_id');
 } */
            
}
