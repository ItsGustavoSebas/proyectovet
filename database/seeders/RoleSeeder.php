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
        $role3 = Role::create(['name' => 'Recepcionista']);
        $role4 = Role::create(['name' => 'Veterinario']);
        $role5 = Role::create(['name' => 'Cliente']);
        

        //PERMISOS

        Permission::create(['name' => 'Listar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Rol'])->syncRoles([$role1]);

        //MENU PAQUETES

        Permission::create(['name' => 'Vizualizar Menu'])->syncRoles([$role1, $role2, $role3, $role4]);

        //MENU NORMAL

        Permission::create(['name' => 'Menu Cliente'])->syncRoles([$role5]);

        //EMPLEADOS

        Permission::create(['name' => 'Listar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Empleado'])->syncRoles([$role1]);
        

        //CLIENTES

        Permission::create(['name' => 'Listar Clientes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'Crear Cliente'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Guardar Cliente'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Cliente'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Actualizar Cliente'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Cliente'])->syncRoles([$role1]);

        //MASCOTA

        Permission::create(['name' => 'Listar Mascotas'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'Listar Mascotas del Cliente'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'Crear Mascota'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Guardar Mascota'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Mascota'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Actualizar Mascota'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Mascota'])->syncRoles([$role1]);

        //HISTORIAL

        Permission::create(['name' => 'Visualizar Historial'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Editar Historial'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Actualizar Historial'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Eliminar Historial'])->syncRoles([$role1]);

        //TRATAMIENTO

        Permission::create(['name' => 'Listar Tratamientos'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Crear Tratamiento'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Guardar Tratamiento'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Editar Tratamiento'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Actualizar Tratamiento'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Eliminar Tratamiento'])->syncRoles([$role1]);

        //CONSULTA

        Permission::create(['name' => 'Listar Consultas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Listar Consultas del Cliente'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Acciones de Consulta'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Guardar Consulta'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Editar Consulta'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Actualizar Consulta'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Eliminar Consulta'])->syncRoles([$role1]);

        //TRATAMIENTO_CONSULTA

        Permission::create(['name' => 'Añadir Tratamientos_Cslt'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Eliminar Tratamientos_Cslt'])->syncRoles([$role1]);

        //TRATAMIENTO_MASCOTA

        Permission::create(['name' => 'Crear Tratamientos_Masc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Guardar Tratamientos_Masc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Editar Tratamientos_Masc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Actualizar Tratamientos_Masc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Eliminar Tratamientos_Masc'])->syncRoles([$role1]);

        //PROVEEDOR

        Permission::create(['name' => 'Listar Proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Proveedor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Proveedor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Proveedor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Actualizar Proveedor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Proveedor'])->syncRoles([$role1]);

        //LOTE

        Permission::create(['name' => 'Listar Lotes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Lote'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Lote'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Lote'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Actualizar Lote'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Lote'])->syncRoles([$role1]);
        Permission::create(['name' => 'Rembolsar Lote'])->syncRoles([$role1]);

        //DETALLES_SERVICIOS

        Permission::create(['name' => 'Listar Detalles_Srvc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Listar Detalles_Srvc del Cliente'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Guardar Detalle_Srvc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Editar Detalle_Srvc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Actualizar Detalle_Srvc'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'Eliminar Detalle_Srvc'])->syncRoles([$role1, $role2, $role4]);

        //CATEGORIA

        Permission::create(['name' => 'Listar Categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Categoria'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Categoria'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Categoria'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Actualizar Categoria'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Categoria'])->syncRoles([$role1]);

        //MARCA

        Permission::create(['name' => 'Listar Marcas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Marca'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Marca'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Marca'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Actualizar Marca'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Marca'])->syncRoles([$role1]);

        //Productos

        Permission::create(['name' => 'Listar Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Actualizar Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Productos'])->syncRoles([$role1]);

        //RESERVAS

        Permission::create(['name' => 'Listar Reservas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Reserva'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Citas'])->syncRoles([$role1]);

        //SERVICIO

        Permission::create(['name' => 'Visualizar Servicios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Servicio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Servicio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Servicio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Actualizar Servicio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Servicio'])->syncRoles([$role1]);

        //BITACORAS

        Permission::create(['name' => 'Listar Bitacoras'])->syncRoles([$role1]);

        //NOTA DE VENTA

        Permission::create(['name' => 'Visualizar Nota de Venta'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Nota de Venta'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Nota de venta'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Detalles de Nota de Venta'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Reporte de Venta'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Nota de Venta'])->syncRoles([$role1, $role2]);

        //RECETA MEDICA

        Permission::create(['name' => 'Eliminar Receta Medica'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar  Receta Medica'])->syncRoles([$role1, $role2]);

        //NOTA DE COMPRA

        Permission::create(['name' => 'Visualizar Nota de Compra'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Nota de Compra'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Guardar Nota de Compra'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Detalles de Nota de Compra'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Reporte de Compra'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Nota de Compra'])->syncRoles([$role1, $role2]);

    }
}
