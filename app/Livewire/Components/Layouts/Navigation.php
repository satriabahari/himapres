<?php

namespace App\Livewire\Components\Layouts;

use App\Models\ModelMhs;
use Livewire\Component;

class Navigation extends Component
{
    public $profile;
    public function render()
    {

        return view('livewire.components.layouts.navigation');
    }
}
