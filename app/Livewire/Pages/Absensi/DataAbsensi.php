<?php

namespace App\Livewire\Pages\Absensi;

use App\Models\ModelAbsensi;
use Livewire\Component;
use App\Models\ModelDataKehadiran;
use App\Models\ModelPesertaEvent;

class DataAbsensi extends Component
{
    public $breadcrumb = "Data Absensi";

    public $title = "Data Absensi";
    public $id;
    public $dataAbsent;
    public $data;
    public $hadir = 0;
    public $izin = 0;
    public $alfa = 0;

    public function mount($id)
    {
        $this->id = $id;
        $datas = ModelAbsensi::join('events', 'events.id', '=', 'absensi.event_id')
            ->where('absensi.id', $id)
            ->first();
        $this->dataAbsent = $datas;
        $this->data = ModelDataKehadiran::where('absensi_id', $id)
            ->join('peserta_event', 'peserta_event.id', 'data_kehadiran.peserta_id')
            ->join('mahasiswa', 'mahasiswa.id', 'peserta_event.mhs_id')
            ->select('mahasiswa.nim', 'mahasiswa.name', 'data_kehadiran.status')
            ->orderBy('mahasiswa.name')
            ->get();

        $this->hadir = ModelDataKehadiran::where('absensi_id', $id)
            ->where('data_kehadiran.status', '1')
            ->count();

        $this->izin = ModelDataKehadiran::where('absensi_id', $id)
            ->where('data_kehadiran.status', '2')
            ->count();

        $this->alfa = ModelDataKehadiran::where('absensi_id', $id)
            ->where('data_kehadiran.status', '3')
            ->count();
    }

    public function render()
    {
        return view('livewire.pages.absensi.data-absensi');
    }
    public function refreshAbsent($id)
    {
        // get absent
        $absent = ModelAbsensi::find($id);
        // get peserta event
        $peserta = ModelPesertaEvent::where('event_id', $absent->event_id)->get();
        // Loop melalui setiap peserta


        foreach ($peserta as $participant) {
            // Periksa apakah peserta sudah terdaftar di dalam ModelDataKehadiran untuk absensi tertentu
            $attendance = ModelDataKehadiran::where('absensi_id', $id)
                ->where('peserta_id', $participant->id)
                ->first();

            // Jika peserta belum terdaftar di dalam ModelDataKehadiran untuk absensi tertentu, tambahkan mereka
            if (!$attendance) {
                ModelDataKehadiran::create([
                    'absensi_id' => $id,
                    'peserta_id' => $participant->id,
                    'status'     => '3',
                    'keterangan'     => '',
                    // Tambahkan atribut lain yang diperlukan di sini, misalnya 'status' => '0'
                ]);
            }
        }
    }
}
