<?php

namespace App\Livewire\Pages\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class EditUsers extends Component
{
    public  $user;
    public  $roles;
    public  $selectedRole;
    public  $text = 'hello';


    public $breadcrumb = "User Edit";
    public $title = "User Edit";

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->roles = Role::all();
    }
    public function render()
    {

        return view('livewire.pages.users.edit-users');
    }



    public function removeRole(User $user, Role $role)
    {

        if ($user->hasRole($role)) {
            $user->removeRole($role);
            $this->dispatch('error', ['message' => 'Remove Has Role Successfully!']);
        }
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            $this->dispatch('error', ['message' => 'Remove Has Role Successfully!']);

            return back()->with('message', 'Role exists');
        }

        $user->assignRole($request->role);
        $this->dispatch('error', ['message' => 'Remove Has Role Successfully!']);
        return back()->with('message', 'Role Assigmed');
    }
}
