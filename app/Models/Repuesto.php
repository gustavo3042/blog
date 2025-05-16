<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'cantidad', 'check_list_id'];

    public function checkList()
    {
        return $this->belongsTo(CheckList::class);
    }
}
