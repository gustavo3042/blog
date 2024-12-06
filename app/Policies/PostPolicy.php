<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

//debe resivir por lo menos un parametro, en este caso resivira el parametro del usuario autentificado y una instancia del modelo post
public function author(User $user, Post $post){

if ($user->id == $post->user_id) {// si el id del usuario concuerda con el del post se puede editar sino no


return true;

}else {


  return false;
}


}

//si se cierra la sesion e ingresas a un post sin estar autenticado inmediatamente el sistema te retorna al false por lo tanto
//el post no se podra ver, para eso se pone el parametro User como opcional esto se logra poniendo un signo de interrogacion delante ?User


public function published(?User $user, Post $post){


if ($post->status == 2) { // si el status es igual a 2 significa que esta publicado

return true;

}else {


return false;

}


}

}
