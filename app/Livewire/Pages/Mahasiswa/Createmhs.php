<?php

namespace App\Livewire\Pages\Mahasiswa;

use Livewire\Component;
use App\Models\ModelMhs;

class Createmhs extends Component
{
    public $breadcrumb ="Tambah Mahasiswa";

    public $title ="Tambah Mahasiswa";

    public $nim;
    public $name;

    protected $rules = [
        'nim' => 'required|max:255',
        'name' => 'required',
    ];

    public function render()
    {
        return view('livewire.pages.mahasiswa.createmhs');
    }

    public function save(){
        $this->validate();

        ModelMhs::create([
            'nim' => $this->nim,
            'name' => $this->name,
        ]);

        $this->reset(['nim', 'name']);

    }


}
