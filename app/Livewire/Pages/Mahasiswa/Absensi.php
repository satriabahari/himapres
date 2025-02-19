<?php

namespace App\Livewire\Pages\Mahasiswa;

use App\Models\ModelMhs;
use App\Models\ModelPesertaEvent;
use Livewire\Component;

class Absensi extends Component
{

    public $nim;
    public $events = [];
    public $breadcrumb = "Absensi Anggota";
    public $title = "Absensi Anggota";
    public $hadir = 0;
    public $izin = 0;
    public $alfa = 0;
    public function mount($nim)
    {
        $this->nim = $nim;
        $this->loadEvents();

        $eventsCollection = collect($this->events);

        // Menghitung jumlah kehadiran berdasarkan status
        $this->hadir = $eventsCollection->where('status', '1')->count();
        $this->izin = $eventsCollection->where('status', '2')->count();
        $this->alfa = $eventsCollection->where('status', '3')->count();
    }
    public function loadEvents()
    {
        $mhs = ModelMhs::where('nim', $this->nim)->first();
        if (!$mhs) {
            return;
        }

        $this->events = ModelPesertaEvent::where('mhs_id', $mhs->id)
            ->join('events', 'peserta_event.event_id', '=', 'events.id')
            ->join('data_posisi', 'peserta_event.posisi', '=', 'data_posisi.id')
            ->leftJoin('absensi', 'absensi.event_id', '=', 'events.id')
            ->leftJoin('data_kehadiran', function ($join) {
                $join->on('data_kehadiran.absensi_id', '=', 'absensi.id')
                    ->on('data_kehadiran.peserta_id', '=', 'peserta_event.id');
            })
            ->select(
                'absensi.title',
                'events.name_event',
                'data_posisi.name AS position_name',
                'events.detail',
                'events.date_start',
                'events.date_end',
                'absensi.created_at AS waktu',
                'data_kehadiran.status',
                'data_kehadiran.keterangan'
            )
            ->get();
    }

    public function getMahasiswa($nim)
    {
        $mhs = ModelMhs::where('nim', $nim)->first();
        return $mhs;
    }

    public function getAcara($nim)
    {
        $mhs = $this->getMahasiswa($nim);

        $result = ModelPesertaEvent::where('mhs_id', $mhs->id)
            ->join('events', 'peserta_event.event_id', '=', 'events.id')
            ->join('data_posisi', 'peserta_event.posisi', '=', 'data_posisi.id')
            ->leftJoin('absensi', function ($join) {
                $join->on('absensi.event_id', '=', 'events.id');
            })
            ->leftJoin('data_kehadiran', function ($join) {
                $join->on('data_kehadiran.absensi_id', '=', 'absensi.id')->on('data_kehadiran.peserta_id', '=', 'peserta_event.id');
            })
            ->select(
                'absensi.title',
                'events.name_event',
                'data_posisi.name AS position_name',
                'events.detail',
                'events.date_start',
                'events.date_end',
                'absensi.created_at AS waktu',
                'data_kehadiran.status', // Assuming 'status' in data_kehadiran table
            )
            ->get();

        return $result;
    }

    public function render()
    {
        return view('livewire.pages.mahasiswa.absensi');
    }
}
