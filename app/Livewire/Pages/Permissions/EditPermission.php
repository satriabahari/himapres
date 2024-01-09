<?php

namespace App\Livewire\Pages\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditPermission extends Component
{
    public $permission;
    public $name;
    public $selectedRole;
    public $roles;
    public $breadcrumb ="Permission Edit";
    public $title ="Permission Edit";

    protected $rules = [
        'name' => 'required',
    ];

    public function mount($id)
    {
        $this->permission = Permission::find($id);
        $this->name = $this->permission->name;
        $this->roles = Role::all();
    }

    public function updatePermission()
    {
        $this->validate();

        $this->permission->update(['name' => $this->name]);

        session()->flash('message', 'Permission updated successfully!');
    }

    public function removeRole(Role $role)
    {
        $this->permission->roles()->detach($role->id);

        session()->flash('message', 'Role removed from permission!');
    }

    public function assignRole()
    {
        $this->validate([
            'selectedRole' => 'required',
        ]);

        $role = Role::where('name', $this->selectedRole)->first();

        if ($role) {
            $this->permission->roles()->attach($role->id);

            session()->flash('message', 'Role assigned to permission!');
        }
    }

    public function render()
    {
        return view('livewire.pages.permissions.edit-permission');
    }
}
