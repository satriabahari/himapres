<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelDataPeserta;
use App\Models\ModelPesertaEvent;

class DataAbsensi extends Component
{
    public $breadcrumb ="Data Absensi";

    public $title ="Data Absensi";

    public $data ;

    public function mount($id){
        $this->data = ModelDataPeserta::where('absensi_id', $id)
        ->join('peserta_event', 'peserta_event.id', 'data_kehadiran.peserta_id')
        ->join('mahasiswa', 'mahasiswa.id', 'peserta_event.mhs_id')
        ->select('mahasiswa.nim', 'mahasiswa.name', 'data_kehadiran.status')
        ->orderBy('mahasiswa.name')
        ->get();
    }

    public function render()
    {
        return view('livewire.pages.absensi.data-absensi');
    }
}
