<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelMhs;
use App\Models\ModelAbsensi;
use App\Models\ModelDataKehadiran;
use App\Models\ModelPesertaEvent;
use Carbon\Carbon;

class ScanManual extends Component
{
    public $breadcrumb = "Absensi Manual";
    public $title = "Absensi";
    public $currentDate;
    public $currentTime;
    public $dataAnggota = null;
    public $dataAbsent;
    public $id;
    public $pesan_err = null;
    public $nim;
    public $keterangan;
    public $status_kehadiran;

    public function mount($id)
    {
        $this->id = $id;
        $this->currentDate = Carbon::now()->toDateString();
        $this->currentTime = Carbon::now()->toTimeString();
    }

    public function Manual()
    {
        $dataAnggota = ModelMhs::where('nim', $this->nim)->first();

        if (!$dataAnggota) {
            $this->pesan_err = 'Keanggotaan anda tidak ditemukan';
            return;
        }

        // $this->pesan_err = 'Absen jalan ditemukan';
        $this->dataAnggota = $dataAnggota;
        $this->saveabsent($dataAnggota);
        return redirect()->back();
    }

    public function saveabsent($dataAnggota)
    {
        $dataAbsensi = ModelAbsensi::find($this->id); // id absensi

        if (!$dataAbsensi) {
            $this->pesan_err = 'Sesi absent tidak ditemukan';
            return;
        }

        if ($dataAbsensi->date < $this->currentDate) {
            $this->pesan_err = 'Absen terlambat 1 hari, tidak dapat melakukan absensi.';
            return;
        } elseif ($dataAbsensi->date > $this->currentDate) {
            $this->pesan_err = 'Absen belum dapat dilakukan karena belum saatnya.';
            return;
        }

        $dataKepanitiaan = ModelPesertaEvent::where('mhs_id', $dataAnggota->id)
            ->where('event_id', $dataAbsensi->event_id)
            ->first(); // id kepanitiaan

        if (!$dataKepanitiaan) {
            $this->pesan_err = 'Kepanitiaan anda tidak ditemukan';
            return;
        }

        $status = ModelDataKehadiran::where('absensi_id', $this->id)
            ->where('peserta_id', $dataKepanitiaan->id)
            ->first();

        if (!$status) {
            $this->pesan_err = 'Status kehadiran tidak ditemukan';
            return;
        }

        if ($status->status == "1") {
            $this->pesan_err = 'Anda sudah absent';
            return;
        }

        if ($this->status_kehadiran == "1") {
            $this->dataAbsent = $dataAbsensi;

            if ($dataAbsensi->time_start <= $this->currentTime && $dataAbsensi->time_end >= $this->currentTime) {
                $status->update([
                    'status' => '1',
                    'keterangan' => 'Hadir'
                ]);
            } elseif ($dataAbsensi->time_end < $this->currentTime) {
                $this->pesan_err = 'Waktu absen telah berakhir, anda tidak bisa melakukan absen.';
            } else {
                $this->pesan_err = 'Absen belum dapat dilakukan karena belum saatnya.';
            }
        } else {
            $status->update([
                'status' => $this->status_kehadiran,
                'keterangan' => $this->keterangan ?? ''
            ]);
            $this->pesan_err = null;
        }
    }

    public function render()
    {
        return view('livewire.pages.absensi.scan-manual');
    }
}
