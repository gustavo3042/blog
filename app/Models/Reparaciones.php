<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparaciones extends Model
{
    use HasFactory;


    protected $fillable= ['name','Precio'];


    public function check_lists(){

      return $this->belongsToMany(CheckList::class);
    }

  
}
