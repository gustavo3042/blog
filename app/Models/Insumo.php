<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Insumo extends Model
{
    use HasFactory;


    protected $fillable = ['name','descripcion','stock','precio','status'];



    public Function imageInsumo(){

        return $this->morphOne(ImageInsumo::class, 'imageable');
    }

}
