<?php

namespace App\Livewire\Pages\Mahasiswa;

use Livewire\Component;
use App\Models\ModelMhs;

class Listmhs extends Component
{
    public $breadcrumb = "Anggota List";
    public $data;
    public $title = "Anggota List";

    public function mount()
    {
        $this->data = ModelMhs::all();
    }
    public function render()
    {
        return view('livewire.pages.mahasiswa.listmhs');
    }
}
