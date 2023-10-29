<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolCreate extends Component
{

    public $permisosSeleccionados = [];
    public $name,$filtro;

    public function guardar(){
        $this->validate([
            'name' => 'required|min:4|max:100|unique:roles',
            'permisosSeleccionados' => 'required'
        ]);

        $rol = Role::create([
            'name' => $this->name,
            'guard_name' => 'web',
        ]);

        $rol->permissions()->sync($this->permisosSeleccionados);

        return redirect()->route('roles.inicio')->with('creado', "Rol Creado Correctamente");

    }   

    public function render()
    {
        $permisos = Permission::where('name', 'LIKE', '%' . $this->filtro . '%')->get();
        return view('livewire.roles.rol-create', compact('permisos'));
    }
}
