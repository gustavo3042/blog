<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CheckList;
use Illuminate\Http\Request;
use Livewire\withPagination;



class Checkindex extends Component
{


  use withPagination;

 protected $paginationTheme= "bootstrap";




    public function render(Request $request)
    {

$buscar = $request->get('buscar');


$checkl = CheckList::where('user_id', auth()->user()->id)
->where('patente','LIKE', '%'.$buscar.'%')
->latest('id')
->paginate();




        return view('livewire.admin.checkindex',compact('checkl'));
    }
}
