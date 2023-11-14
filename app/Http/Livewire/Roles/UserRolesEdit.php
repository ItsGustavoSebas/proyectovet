<?php

namespace App\Http\Livewire\Roles;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRolesEdit extends Component
{
    public $name, $filtro, $user;

    public function mount($id){
        $this->user = User::find($id);
    }

    public function render()
    {
        $roles = Role::where('name', 'LIKE', '%' . $this->filtro . '%')->get();

        return view('livewire.roles.user-roles-edit', compact('roles'));
    }
}
