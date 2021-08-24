<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    use HasFactory;

        protected $guarded = ['id','created_at','updated_at'];

        public function user(){


          return $this->belongsTo(User::class);
        }


        public function clientes(){


          return $this->belongsTo(Cliente::class);
        }

/*
        public function reparaciones(){

          return $this->belongsToMany(Reparaciones::class);

        }

*/

        public function image(){

          return $this->morphOne(Image::class, 'imageable');
        }

}
