<?php

namespace App\Livewire\Pages\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermission extends Component
{
    public $breadcrumb ="Permission Create";
    public $name;
    public $title ="Permission Create";

    protected $rules = [
        'name' => 'required|min:3|unique:roles,name',
    ];

    public function render()
    {
        return view('livewire.pages.permissions.create-permission');
    }

    public function save(){
        $this->validate();
        Permission::create(['name' => $this->name]);
        $this->reset(['name']);
        return $this->redirect('/admin/permissions', navigate: true);

    }
}
