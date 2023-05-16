<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostForoComent extends Model
{
    use HasFactory;


    protected $fillable = ['bodyComent','fechaComent','user_id','user_id','post_foro_consultas_id'];
}
