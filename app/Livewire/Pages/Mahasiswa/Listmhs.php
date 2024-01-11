<?php

namespace App\Livewire\Pages\Mahasiswa;

use Livewire\Component;

class Listmhs extends Component
{
    public $breadcrumb ="Mahasiswa List";

    public $title ="Mahasiswa List";
    public function render()
    {
        return view('livewire.pages.mahasiswa.listmhs');
    }
}
