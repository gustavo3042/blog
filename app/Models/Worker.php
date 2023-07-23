<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['name','name2','surname','surname2','rut','birthDate','address','phone','Afp','email','tipoContrato','fechaContrato','suspensionContrato','finiquito','causalFinContrato'];


    public function image(){

        return $this->morphOne(Image::class, 'imageable');
      }
}
