<?php

namespace App\Livewire\Pages\Mahasiswa;

use Livewire\Component;
use App\Models\ModelMhs;

class Createmhs extends Component
{
    public $breadcrumb = "Tambah Anggota";

    public $title = "Tambah Anggota";

    public $nim;
    public $cardId;
    public $name;
    public $jabatan;

    protected $rules = [
        'nim' => 'required|max:255',
        'name' => 'required',
        'cardId' => 'required',
        'jabatan' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.pages.mahasiswa.createmhs');
    }

    public function save()
    {
        $this->validate();

        if ($this->jabatan == null) {
            ModelMhs::create([
                'nim' => $this->nim,
                'card_id' => $this->cardId,
                'name' => $this->name,
            ]);
        } else {
            ModelMhs::create([
                'nim' => $this->nim,
                'card_id' => $this->cardId,
                'name' => $this->name,
                'jabatan' => $this->jabatan,
            ]);
        }

        $this->reset(['nim', 'name', 'jabatan', 'cardId']);
        session()->flash('message', 'Data berhasil disimpan.');
    }
}
