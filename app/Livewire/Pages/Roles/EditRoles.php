<?php

namespace App\Livewire\Pages\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditRoles extends Component
{
    public $roleId;
    public $roleName;
    public $role;
    public $permissions;
    public $selectedPermission;

    public $breadcrumb ="Roles Edit";
    public $title ="Roles Edit";

    protected $rules = [
        'roleName' => 'required|min:3|unique:roles,name',
    ];


    public function mount($id){
        $this->roleId = $id;
        $this->role = Role::find($id);

        if ($this->role) {
            $this->roleName = $this->role->name;
        }
        $this->permissions = Permission::all();
    }
    public function render()
    {
        return view('livewire.pages.roles.edit-roles');
    }

    public function updateRole()
    {
        $this->validate();

        $role = Role::find($this->roleId);

        if ($role) {
            $role->update(['name' => $this->roleName]);
            session()->flash('message', 'Role updated successfully!');
        }

        // Redirect or perform additional logic as needed
    }

    public function revokePermission(Permission $permission)
    {
        if ($this->role->hasPermissionTo($permission)) {
            $this->role->revokePermissionTo($permission);
            session()->flash('message', 'Permission deleted');
        } else {
            session()->flash('message', 'Permission does not exist');
        }
    }

    public function savePermission()
    {
        $this->role->givePermissionTo($this->selectedPermission);

        session()->flash('message', 'Permission added');

        // Clear the selectedPermission after saving
        $this->selectedPermission = null;


        $this->role = Role::find($this->roleId);

        // return $this->redirect('/admin/roles', navigate: true);
    }
}
