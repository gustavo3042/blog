<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{


public function index(){

$posts = Post::where('status',2)->latest('id')->paginate(6);


return view('post.index',compact('posts'));

}


public function show(Post $post){

  $similares= Post::where('category_id', $post->category_id)
  ->where('status',2)
  ->where('id','!=', $post->id)
  ->latest('id')
  ->take(4)
  ->get();

return view('post.show', compact('post','similares'));

}

public function category(Category $category){


return $category;
}


}
