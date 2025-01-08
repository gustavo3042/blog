<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];


    //relacion polimorfica

     public function imageable(){

      return $this->morphTo();
    }
 

 public function checkLists()
 {
     return $this->belongsToMany(CheckList::class, 'check_list_image', 'image_id', 'check_list_id')
                 ->withTimestamps();
 }
 



}
