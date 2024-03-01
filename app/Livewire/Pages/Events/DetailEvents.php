<?php

namespace App\Livewire\Pages\Events;

use App\Models\ModelPesertaEvent;
use Livewire\Component;

class DetailEvents extends Component
{
    public $breadcrumb = "Detail Event";
    public $title = "Detail Event";
    public $dataAnggota;
    public $dataDivisi;
    public $idEvent;
    public function mount($id)
    {
        $this->idEvent = $id;
        $this->dataAnggota = ModelPesertaEvent::join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
            ->where('peserta_event.event_id', $this->idEvent)
            ->get(['mahasiswa.*']);
        // $this->dataDivisi = 
    }
    public function render()
    {
        return view('livewire.pages.events.detail-events');
    }
}
