<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class testController extends Controller
{
function show(){


  //return DB::table('categories')
  //->join('posts','categories.id','=','posts.category_id')
//->where('categories.name','neque')
  //->get();


//  $listatab = DB::table('')


return null;


}


public function index(){


//forma correcta de hacer join
$listar = DB::table('posts')
->join('categories','categories.id','=','posts.category_id')
->join('users','users.id','=','posts.user_id')
->select('posts.name as alias','categories.name as nombre','users.name as user')


->where('posts.user_id','!=',1)
->where('posts.category_id','!=',1)
->paginate(10);









return view('post.most', compact('listar'));

}

}
