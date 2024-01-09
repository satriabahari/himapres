<?php

namespace App\Livewire\Pages\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRoles extends Component
{
    public $breadcrumb ="Role Create";
    public $name;
    public $title ="Role Create";

    protected $rules = [
        'name' => 'required|min:3|unique:roles,name',
    ];

    public function render()
    {
        return view('livewire.pages.roles.create-roles');
    }

    public function save(){
        $this->validate();
        Role::create(['name' => $this->name]);
        $this->reset(['name']);
        return $this->redirect('/admin/roles', navigate: true);

    }
}
