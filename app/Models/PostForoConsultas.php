<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostForoConsultas extends Model
{
    use HasFactory;


    protected $fillable = ['nombre','fecha','body','status','user_id','category_foros_id'];


    public function user(){

        return  $this->belongsTo(User::class);
    }


    public function categoryForo(){

        return  $this->belongsTo(CategoryForo::class);
        }


        public function image(){

            return $this->morphOne(Image::class, 'imageable');
          }
        

}
