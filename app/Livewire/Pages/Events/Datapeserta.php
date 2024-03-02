<?php

namespace App\Livewire\Pages\Events;

use Livewire\Component;
use App\Models\ModelMhs;
use App\Models\ModelPosisi;
use App\Models\ModelPesertaEvent;

class Datapeserta extends Component
{
    public $breadcrumb = "Adding Peserta";
    public $title = "Adding Peserta";

    public $nim;
    public $file;
    public $posisi;
    public $idEvent;
    public $allpos;

    public function mount($id)
    {
        $this->idEvent = $id;
        $this->allpos = ModelPosisi::all();
    }


    public function render()
    {
        return view('livewire.pages.events.datapeserta');
    }

    public function save()
    {
        try {
            $data = ModelMhs::where('mahasiswa.nim', $this->nim)->first();
            // cek jika sudah terdaftar
            $datapeserta = ModelPesertaEvent::where('mhs_id', $data->id)
                ->where('event_id', $this->idEvent)
                ->first();

            if ($datapeserta) {
                // Jika sudah terdaftar, beri pesan bahwa sudah terdaftar
                session()->flash('message', 'Peserta sudah terdaftar');
            } else {
                // Jika belum terdaftar, tambahkan data peserta baru
                ModelPesertaEvent::create([
                    'event_id' => $this->idEvent,
                    'mhs_id' => $data->id,
                    'posisi' => $this->posisi
                ]);
                $this->reset(['nim', 'posisi']);
                session()->flash('sucses', 'Peserta berhasil didaftarkan');
            }
        } catch (\Exception $e) {
            // Tangani pesan error
            session()->flash('error', $e->getMessage());
        }
    }
    public function saveExcel()
    {
        // ambil data di dalam file excel tanpa harus menyimpan excel
        // kolom yang dibaca di dalam excel dalah nim dan id_divisi
    }
}
