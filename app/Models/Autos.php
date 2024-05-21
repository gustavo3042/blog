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


  

    public function check_lists(): BelongsTo
    {
        return $this->BelongsTo(CheckList::class, 'check_lists_id');
    }


            
}
