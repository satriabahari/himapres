<?php

namespace App\Livewire\Components\Widget;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $breadcrumb;
    public function render()
    {
        return view('livewire.components.widget.breadcrumb');
    }
}
