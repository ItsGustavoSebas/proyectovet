<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRolesCreate extends Component
{
    public $filtro;

    public function render()
    {

        $roles = Role::where('name','LIKE','%' . $this->filtro . '%')->get();

        return view('livewire.roles.user-roles-create', compact('roles'));
    }
}
