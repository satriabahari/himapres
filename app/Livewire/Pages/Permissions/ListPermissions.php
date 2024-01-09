<?php

namespace App\Livewire\Pages\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class ListPermissions extends Component
{
    public $permissions;
    public $breadcrumb ="Permissions List";

    public $title ="Permissions List";

    public function mount(){
        $this->permissions = Permission::all();
    }
    public function render()
    {
        return view('livewire.pages.permissions.list-permissions');
    }

    public function deletePermission($id){
        $permission = Permission::find($id);

        $permission->delete();

        $this->permissions =Permission::all();

    }
}
