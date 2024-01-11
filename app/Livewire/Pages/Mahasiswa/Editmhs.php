<?php

namespace App\Livewire\Pages\Mahasiswa;

use Livewire\Component;

class Editmhs extends Component
{
    public $breadcrumb ="Events List";

    public $title ="Events List";
    public function render()
    {
        return view('livewire.pages.mahasiswa.editmhs');
    }
}
