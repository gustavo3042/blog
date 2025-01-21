<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $fillable = ['check_lists_id','workers_id','cantidad','rendimiento','motivo','cantidad2','tiempo','horaExtra'];


   

    public function check()
    {
        return $this->hasMany(CheckList::class); // Relación 1:N
    }

  
}
