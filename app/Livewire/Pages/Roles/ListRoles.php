<?php

namespace App\Livewire\Pages\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class ListRoles extends Component
{
    public $breadcrumb ="Roles List";

    public $title ="Roles List";
    public function render()
    {
        $roles = Role::all();
        return view('livewire.pages.roles.list-roles',compact('roles'));
    }

    public function deleteRole($id){
        $role = Role::find($id);

        $role->delete();

        $this->data =Role::all();

    }
}
