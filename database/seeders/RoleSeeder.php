<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; //se trae esta use para poder crear un rol
use Spatie\Permission\Models\Permission; //se trae esta use para poder crear un rol


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//se crean dos roles el admin y el blogger
    $role1=  Role::create(['name'=>'Admin']);
    $role2=  Role::create(['name'=>'Blogger']);
    $role3= Role::create(['name'=>'Mecanico']);

//se dan los permisos a determinado usuario para poder ver el admin.home
    Permission::create(['name' => 'admin.home',
    'description'=>'Ver el Dashboard'])->syncRoles([$role1,$role2,$role3]);

    Permission::create(['name' => 'admin.users.index',
    'description'=>'Ver listado de Usuarios'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.users.edit',
    'description'=>'Asignar un rol'])->syncRoles([$role1]);


    Permission::create(['name' => 'admin.categorias.index',
    'description'=>'Ver listado de Categorias'])->syncRoles([$role1,$role2]); //codigo para crear rol y asignar permisos a ese rol, esta parte pertenece al crud de roles

    Permission::create(['name' => 'admin.categorias.create',
    'description'=>'Crear Categoria'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.categorias.edit',
    'description'=>'Editar categoria'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.categorias.destroy',
    'description'=>'Eliminar Categoria'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.tags.index',
    'description'=>'Ver listado de Etiquetas'])->syncRoles([$role1,$role2]);

    Permission::create(['name' => 'admin.tags.create',
    'description'=>'Crear Etiqueta'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.tags.edit',
    'description'=>'Editar Etiqueta'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.tags.destroy',
    'description'=>'Eliminar Etiqueta'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.posts.index',
    'description'=>'Ver listado de Posts'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.posts.create',
    'description'=>'Crear Post'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.posts.edit',
    'description'=>'Editar Post'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.posts.destroy',
    'description'=>'Eliminar Post'])->syncRoles([$role1]);


    Permission::create(['name'=>'admin.roles.index',
  'description'=>'Ver listado de Roles'])->syncRoles([$role1]);

  Permission::create(['name'=>'admin.roles.create',
'description'=>'Crear Rol'])->syncRoles([$role1]);


Permission::create(['name'=>'admin.roles.edit',
'description'=>'Editar Rol'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.roles.destroy',
'description'=>'Eliminar Rol'])->syncRoles([$role1]);


//    $role1->permission()->attach([1,2,3....]); una forma para llenar los campos de la tabla role_has_permissions para asignar determinados permisos a un rol



    }
}
