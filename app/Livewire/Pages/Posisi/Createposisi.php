<?php

namespace App\Livewire\Pages\Posisi;

use Livewire\Component;

class Createposisi extends Component
{
    public $breadcrumb ="Posisi List";

    public $title ="Posisi List";
    public function render()
    {
        return view('livewire.pages.posisi.createposisi');
    }
}
