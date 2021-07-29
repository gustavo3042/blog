<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\withPagination;
use Illuminate\Http\Request;

class PostsIndex extends Component
{


  use withPagination;

 protected $paginationTheme= "bootstrap";

 //public $search;


 public function updatingSearch(){
   $this->resetPage();
 }

    public function render(Request $request)
    {

//consulta que consiste en que me mustre todos los post que pertenescan al id del usuario logeado
$buscar = $request->get('buscar');
    $posts = Post::where('user_id', auth()->user()->id)
    ->where('name','LIKE','%'.$buscar.'%')
    ->latest('id')
    ->paginate();

        return view('livewire.admin.posts-index',compact('posts'));
    }
}
