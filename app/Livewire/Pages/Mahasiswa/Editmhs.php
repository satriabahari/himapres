<?php

namespace App\Livewire\Pages\Mahasiswa;

use Livewire\Component;
use App\Models\ModelMhs;

class Editmhs extends Component
{
    public $breadcrumb ="Events List";
    public $data;
    public $nim;
    public $name;
    public $title ="Events List";
    public $idMhs;

    protected $rules = [
        'nim' => 'required|max:255',
        'name' => 'required',
    ];

    public function mount($id){
        $this->idMhs = $id;
        $this->data = ModelMhs::find($id);
        $this->nim = $this->data->nim;
        $this->name = $this->data->name;

    }
    public function render()
    {
        return view('livewire.pages.mahasiswa.editmhs');
    }

    public function save(){

        $this->validate();

        // Logika penyuntingan data event
        $mhs = ModelMhs::find($this->idMhs);
        if ($mhs) {
            $mhs->update([
                'nim' => $this->nim,
                'name' => $this->name,
            ]);

            // Tampilkan pesan sukses
            session()->flash('message', 'Event berhasil diperbarui.');
        }

        // Redirect atau lakukan hal lain setelah penyuntingan
        // Misalnya, redirect ke halaman index
        return redirect()->route('admin.mahasiswa.index');

    }
}
