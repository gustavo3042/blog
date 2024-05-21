<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kilometraje extends Model
{
    use HasFactory;

    protected $fillable = ['tipoAceite','kilometraje','newKilometraje','mostKilometraje','check_lists_id','autos_id'];
}
