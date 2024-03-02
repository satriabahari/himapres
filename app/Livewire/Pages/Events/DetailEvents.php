<?php

namespace App\Livewire\Pages\Events;

use App\Models\ModelEvents;
use App\Models\ModelPesertaEvent;
use App\Models\ModelPosisi;

use Livewire\Component;

class DetailEvents extends Component
{
    public $breadcrumb = "Detail Event";
    public $title = "Detail Event";
    public $dataAnggota;
    public $dataDivisi;
    public $dataEvent;
    public $idEvent;
    public function getAnggota($divisi)
    {
        if ($divisi == 'all') {
            $this->dataAnggota = ModelPesertaEvent::join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
                ->join('data_posisi', 'data_posisi.id', '=', 'peserta_event.posisi')
                ->where('peserta_event.event_id', $this->idEvent)
                ->orderBy('data_posisi.name') // Menambahkan ORDER BY clause
                ->get(['mahasiswa.*', 'data_posisi.name as divisi']);
        } else {
            $this->dataAnggota = ModelPesertaEvent::join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
                ->join('data_posisi', 'data_posisi.id', '=', 'peserta_event.posisi')
                ->where('peserta_event.event_id', $this->idEvent)
                ->where('peserta_event.posisi', $divisi)
                ->orderBy('data_posisi.name') // Menambahkan ORDER BY clause
                ->get(['mahasiswa.*', 'data_posisi.name as divisi']);
        }
    }
    public function mount($id)
    {
        $this->idEvent = $id;
        $this->dataAnggota = ModelPesertaEvent::join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
            ->join('data_posisi', 'data_posisi.id', '=', 'peserta_event.posisi')
            ->where('peserta_event.event_id', $this->idEvent)
            ->orderBy('data_posisi.name') // Menambahkan ORDER BY clause
            ->get(['mahasiswa.*', 'data_posisi.name as divisi']);
        $this->dataDivisi = ModelPosisi::join('peserta_event', 'data_posisi.id', '=', 'peserta_event.posisi')
            ->join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
            ->where('peserta_event.event_id', $this->idEvent)
            ->distinct()
            ->get(['data_posisi.*']);
        $this->dataEvent = ModelEvents::find($id);
    }
    public function render()
    {
        return view('livewire.pages.events.detail-events');
    }
}
