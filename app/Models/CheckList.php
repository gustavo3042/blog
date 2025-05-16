<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class CheckList extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];



    public function productions()
    {
        return $this->belongsTo(Production::class);
    }

    public function user(){


      return $this->belongsTo(User::class);
    }



    public function reparaciones(){

      return $this->belongsToMany(Reparaciones::class);

    }


    public function image(){

      return $this->morphOne(Image::class, 'imageable');
    }
 

 public function images()
 {
     return $this->belongsToMany(Image::class, 'check_list_image', 'check_list_id', 'image_id')
                 ->withTimestamps();
 }
 


    public function presupuestos(){

      return $this->hasMany(Presupuesto::class,'check_lists_id');

    }

    public function insumos():BelongsToMany{


      return $this->belongsToMany(Insumo::class,'insumos_check_list','check_list_id','insumo_id');
    }

    public function autos(): BelongsToMany
    {
        return $this->belongsToMany(Autos::class, 'autos_check_list', 'check_lists_id', 'autos_id');
    }

    public function clientes(): BelongsToMany
    {

      return $this->belongsToMany(Cliente::class,'clientes_check_list','check_lists_id','clientes_id');
    }

    public function image_files()
    {
        return $this->morphMany(ImageFiles::class, 'imageable');
    }


    public function repuestos()
{
    return $this->hasMany(Repuesto::class);
}


}
