<?php

namespace App\Livewire\Pages\Users;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    public $breadcrumb ="Users List";

    public $title ="Users List";

    protected $data;

    public function mount(){
        $this->data =User::all();
    }

    public function render()
    {
        $users =$this->data;
        return view('livewire.pages.users.list-users',compact('users'));
    }

    public function destroy($userId){
        $user = User::find($userId);

        $user->delete();

        $this->data =User::all();

    }
}
