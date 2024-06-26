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
    $role2=  Role::create(['name'=>'Cliente']);
    $role3= Role::create(['name'=>'Mecanico']);
    //$role4= Role::create(['name'=> 'Cliente']);

//se dan los permisos a determinado usuario para poder ver el admin.home
    Permission::create(['name' => 'admin.home',
    'description'=>'Ver el Dashboard'])->syncRoles([$role1,$role2,$role3]);

 
    

    Permission::create(['name' => 'admin.users.index',
    'description'=>'Ver listado de Usuarios'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.users.edit',
    'description'=>'Asignar un rol'])->syncRoles([$role1]);


    Permission::create(['name' => 'admin.categorias.index',
    'description'=>'Ver listado de Categorias'])->syncRoles([$role1]); //codigo para crear rol y asignar permisos a ese rol, esta parte pertenece al crud de roles

    Permission::create(['name' => 'admin.categorias.create',
    'description'=>'Crear Categoria'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.categorias.edit',
    'description'=>'Editar categoria'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.categorias.destroy',
    'description'=>'Eliminar Categoria'])->syncRoles([$role1]);

    Permission::create(['name' => 'admin.tags.index',
    'description'=>'Ver listado de Etiquetas'])->syncRoles([$role1]);

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

Permission::create(['name'=>'admin.insumos.index',
'description'=>'Index de insumos'])->syncRoles([$role1,$role2]);
Permission::create(['name'=>'admin.insumos.create',
'description'=>'Crear de insumos'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.insumos.edit',
'description'=>'Editar insumos'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.check.index',
'description'=>'Vista index de ficha tecnica'])->syncRoles([$role1,$role3]);

Permission::create(['name'=>'admin.check.create',
'description'=>'Vista create de ficha tecnica'])->syncRoles([$role1,$role3]);

Permission::create(['name'=>'admin.check.edit',
'description'=>'Vista para editar ficha tecnica'])->syncRoles([$role1,$role3]);


Permission::create(['name'=>'admin.check.destroy',
'description'=>'Borrar ficha tecnica'])->syncRoles([$role1,$role3]);

Permission::create(['name'=>'admin.check.documentoPdf',
'description'=>'Boton para generar documento pdf'])->syncRoles([$role1,$role3]);


Permission::create(['name'=>'admin.check.show',
'description'=>'Vista para ir a show'])->syncRoles([$role1,$role3]);

Permission::create(['name'=>'admin.check.addWorkers',
'description'=>'Boton para agregar trabajadores a la faena'])->syncRoles([$role1,$role3]);

Permission::create(['name'=>'admin.reparar.index',
'description'=>'Vista index de reparaciones'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.reparaciones.create',
'description'=>'Vista create de reparaciones'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.reparaciones.edit',
'description'=>'Vista edit de reparaciones'])->syncRoles([$role1]);


Permission::create(['name'=>'admin.reparaciones.destroy',
'description'=>'Borrar categoria reparaciones'])->syncRoles([$role1]);


Permission::create(['name'=>'admin.autos.index',
'description'=>'Vista index para autos'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.autos.create',
'description'=>'Vista create para autos'])->syncRoles([$role1]);


Permission::create(['name'=>'admin.clientes.index',
'description'=>'Vista index para clientes'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.clientes.create',
'description'=>'Vista create para clientes'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.workers.index',
'description'=>'Vista index para trabajadores'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.workers.create',
'description'=>'Vista create para trabajadores'])->syncRoles([$role1]);


Permission::create(['name'=>'admin.workers.edit',
'description'=>'Vista edit para trabajadores'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.workers.destroy',
'description'=>'Borrar trabajadores'])->syncRoles([$role1]);


Permission::create(['name'=>'admin.workers.enable',
'description'=>'Boton para habilitar un trabajador'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.workers.disabled',
'description'=>'Boton para deshabilitar un trabajador'])->syncRoles([$role1]);

Permission::create(['name'=>'admin.compras.index',
'description'=>'Vista index de compras para administrador'])->syncRoles([$role1]);


Permission::create(['name' => 'admin.foro.buscar','description'=>'Ver el modulo para clientes'])
->syncRoles([$role1,$role2,$role3]);   

Permission::create(['name' => 'admin.foroCategory.index','description'=>'Ver vista index de categoria de consulta'])
->syncRoles([$role1]);   

Permission::create(['name' => 'admin.foroCategory.create','description'=>'Vista para crear un tipo de categoria de consulta'])
->syncRoles([$role1]);   

Permission::create(['name' => 'admin.foroCategory.edit','description'=>'Vista para editar un tipo de categoria de consulta'])
->syncRoles([$role1]);   

Permission::create(['name' => 'admin.foroCategory.destroy','description'=>'Borrar categoria consulta'])
->syncRoles([$role1]);   


//    $role1->permission()->attach([1,2,3....]); una forma para llenar los campos de la tabla role_has_permissions para asignar determinados permisos a un rol



    }
}
