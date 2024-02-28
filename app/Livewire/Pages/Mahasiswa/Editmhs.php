<?php

namespace App\Livewire\Pages\Mahasiswa;

use Livewire\Component;
use App\Models\ModelMhs;

class Editmhs extends Component
{
    public $breadcrumb = "Events List";
    public $data;
    public $nim;
    public $name;
    public $jabatan;
    public $card_id;
    public $title = "Events List";
    public $idMhs;

    protected $rules = [
        'nim' => 'required|max:255',
        'name' => 'required',
        'card_id' => 'required',
        'jabatan' => 'nullable',
    ];

    public function mount($id)
    {
        $this->idMhs = $id;
        $this->data = ModelMhs::find($id);
        $this->nim = $this->data->nim;
        $this->name = $this->data->name;
        $this->jabatan = $this->data->jabatan;
        $this->card_id = $this->data->card_id;
    }
    public function render()
    {
        return view('livewire.pages.mahasiswa.editmhs');
    }

    public function save()
    {

        $this->validate();

        // Logika penyuntingan data event
        $mhs = ModelMhs::find($this->idMhs);
        if ($mhs) {
            if ($this->jabatan == null) {
                $mhs->update([
                    'nim' => $this->nim,
                    'name' => $this->name,
                    'card_id' => $this->card_id,
                ]);
            } else {
                $mhs->update([
                    'nim' => $this->nim,
                    'name' => $this->name,
                    'card_id' => $this->card_id,
                    'jabatan' => $this->jabatan,
                ]);
            }

            // Tampilkan pesan sukses
            session()->flash('message', 'Event berhasil diperbarui.');
        }

        // Redirect atau lakukan hal lain setelah penyuntingan
        // Misalnya, redirect ke halaman index
        return redirect()->route('admin.mahasiswa.index');
    }
}
