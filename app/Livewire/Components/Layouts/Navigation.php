<?php

namespace App\Livewire\Components\Layouts;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Navigation extends Component
{
    public $user;
    public $roles;
    public function render()
    {
        $datauser = Auth::user();
        $this->roles = Role::all();
        $this->user = $this->user = User::find($datauser->id);

        return view('livewire.components.layouts.navigation');
    }
}
