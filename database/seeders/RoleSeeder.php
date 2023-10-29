<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ROLES

        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Empleado']);

        //PERMISOS

        //ROLES

        Permission::create(['name' => 'Listar Roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Actualizar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Roles'])->syncRoles([$role1]);

        //USUARIOS

        Permission::create(['name' => 'Listar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Usuarios'])->syncRoles([$role1]);

        //CLIENTES

        Permission::create(['name' => 'Listar Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Clientes'])->syncRoles([$role1]);

        //EMPLEADOS

        Permission::create(['name' => 'Listar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Empleados'])->syncRoles([$role1]);

        //MASCOTA

        Permission::create(['name' => 'Listar Mascota'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Mascota'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Mascota'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Mascota'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Mascota'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Mascota'])->syncRoles([$role1]);

        //CITAS

        Permission::create(['name' => 'Listar Citas'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Citas'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Citas'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Citas'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Citas'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Citas'])->syncRoles([$role1]);

    }
}
