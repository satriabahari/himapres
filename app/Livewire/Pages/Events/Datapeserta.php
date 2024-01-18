<?php

namespace App\Livewire\Pages\Events;

use Livewire\Component;
use App\Models\ModelMhs;
use App\Models\ModelPosisi;
use App\Models\ModelPesertaEvent;

class Datapeserta extends Component
{
    public $breadcrumb ="Adding Peserta";
    public $title ="Adding Peserta";

    public $nim;
    public $posisi;
    public $idEvent;
    public $allpos;

    public function mount($id){
        $this->idEvent = $id;
        $this->allpos = ModelPosisi::all();
    }


    public function render()
    {
        return view('livewire.pages.events.datapeserta');
    }

    public function save(){
        $data = ModelMhs::where('mahasiswa.nim',$this->nim)->first();
        ModelPesertaEvent::create([
            'event_id' => $this->idEvent,
            'mhs_id' => $data->id,
            'jabatan'   =>$this->posisi
        ]);
        $this->reset(['nim', 'posisi']);

    }
}
