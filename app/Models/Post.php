<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];


    //relacion uno a muchos inversa

    public function user(){

    return  $this->belongsTo(User::class);
    }


    //relacion uno a muchos inversa

    public function category(){

    return  $this->belongsTo(Category::class);
    }

//relacion muchos a muchos


public function tags(){

return  $this->belongsToMany(Tag::class);
}



//relacion uno a unp polimorfica

public function image(){

  return $this->morphOne(Image::class, 'imageable');
  
}


}
