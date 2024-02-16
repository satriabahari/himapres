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
    public $hadir = 0;
    public $izin = 0;
    public $alfa = 0;

    public function mount($id){
        $this->data = ModelDataPeserta::where('absensi_id', $id)
        ->join('peserta_event', 'peserta_event.id', 'data_kehadiran.peserta_id')
        ->join('mahasiswa', 'mahasiswa.id', 'peserta_event.mhs_id')
        ->select('mahasiswa.nim', 'mahasiswa.name', 'data_kehadiran.status')
        ->orderBy('mahasiswa.name')
        ->get();

        $this->hadir = ModelDataPeserta::where('absensi_id', $id)
            ->where('data_kehadiran.status', '1')
            ->count();

        $this->izin = ModelDataPeserta::where('absensi_id', $id)
            ->where('data_kehadiran.status', '2')
            ->count();

        $this->alfa = ModelDataPeserta::where('absensi_id', $id)
            ->where('data_kehadiran.status', '3')
            ->count();


    }

    public function render()
    {
        return view('livewire.pages.absensi.data-absensi');
    }
}
