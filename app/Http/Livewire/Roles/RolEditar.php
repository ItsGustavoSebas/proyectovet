<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolEditar extends Component
{
    
    public $name, $filtro, $rol;

    public function mount($id){
        $this->rol = Role::find($id);
    }

    public function render()
    {
        $permissions = Permission::where('name', 'LIKE', '%' . $this->filtro . '%')->get();
        return view('livewire.roles.rol-editar', compact('permissions'));
    }
}
