<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\Cache;  //para trabajar con cache

class PostController extends Controller
{


public function index(){


if (request()->page) {

$key = 'posts'. request()->page;

}else{

  $key = 'posts';
}

  if (Cache::has($key)) { //pregunta si a almacenado en cache la informacion de los posts

    $posts = Cache::get('posts');

  }else {

$posts = Post::where('status',2)->latest('id')->paginate(8); //si no hay nada almacenado en cache quiero q haga la consulta a la db

Cache::put($key,$posts);

  }




return view('post.index',compact('posts'));

}


public function show(Post $post){


  $this->authorize('published',$post);

  $similares= Post::where('category_id', $post->category_id)
  ->where('status',2)
  ->where('id','!=', $post->id)
  ->latest('id')
  ->take(4)
  ->get();

return view('post.show', compact('post','similares'));

}



public function category(Category $category){

$posts = Post::where('category_id',$category->id)
->where('status',2)


->latest('id')
->paginate(4);

return view('post.category',compact('posts','category'));

//$categories = Category::all();
  //return view('post.category',compact('categories','category'));

}


public function tag(Tag $tag){


 $posts= $tag->posts()->where('status',2)->latest('id')->paginate(4);

 return view('post.tag', compact('posts','tag'));

}

public function sobreNosotros(){

return view('post.sobreNosotros');

}


}
