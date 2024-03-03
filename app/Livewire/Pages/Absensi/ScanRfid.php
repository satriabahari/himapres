<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelMhs;
use App\Models\ModelAbsensi;
use App\Models\ModelDataKehadiran;
use App\Models\ModelPesertaEvent;

class ScanRfid extends Component
{
    public $breadcrumb = "Scan Absensi";
    public $title = "Scan Absensi";

    public $cardId;
    public $absensi = null;
    public $id;
    public $pesan_err = null;

    public function mount($id)
    {
        $this->id = $id;
    }


    public function scanIdCard()
    {
        $dataAnggota = ModelMhs::where('card_id', $this->cardId)
            ->first(); // id anggota
        $this->absensi = $dataAnggota;
        $this->saveabsent($dataAnggota);
        $this->reset(['cardId']);
    }
    public function scanqr($qrcode)
    {
        $dataAnggota = ModelMhs::where('qrcode', $qrcode)
            ->first();
        $this->pesan_err = 'absen jalan ditemukan';
        $this->absensi = $dataAnggota;
        $this->saveabsent($dataAnggota);
    }

    public function saveabsent($dataAnggota)
    {
        if ($dataAnggota) {
            $dataAbsensi = ModelAbsensi::find($this->id); // id absensi
            if ($dataAbsensi) {
                if ($dataAbsensi->date < now()) {
                    $this->pesan_err = 'Absen terlambat, tidak dapat melakukan absensi.';
                    return;
                } elseif ($dataAbsensi->date > now()) {
                    $this->pesan_err = 'Absen belum dapat dilakukan karena belum saatnya.';
                    return;
                } else {
                    $dataKepanitiaan = ModelPesertaEvent::where('mhs_id', $dataAnggota->id)
                        ->where('event_id', $dataAbsensi->event_id)
                        ->first(); // id kepanitiaan
                    if ($dataKepanitiaan) {
                        $status = ModelDataKehadiran::where('absensi_id', $this->id)
                            ->where('peserta_id', $dataKepanitiaan->id)
                            ->first();
                        if ($status->status == "3") {
                            if ($dataAbsensi->time_start <= now()) {
                                if ($dataAbsensi->time_end >= now()) {
                                    $status->update([
                                        'status' => '1'
                                    ]);
                                }
                            } else {
                                $this->pesan_err = 'Absen belum dapat dilakukan karena belum saatnya.';
                            }


                            $this->pesan_err = null;
                        } else {
                            $this->pesan_err = 'Anda sudah absent';
                        }
                    } else {
                        $this->pesan_err = 'Kepanitiaan anda tidak ditemukan';
                    }
                }
            } else {
                $this->pesan_err = 'Sesi absent tidak ditemukan';
            }
        } else {
            $this->pesan_err = 'Keanggotaan anda tidak ditemukan';
        }
    }

    public function render()
    {
        return view('livewire.pages.absensi.scan-rfid');
    }
}
