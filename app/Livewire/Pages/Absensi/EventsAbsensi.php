<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelEvents;
use App\Models\ModelAbsensi;
use App\Models\ModelDataKehadiran;

class EventsAbsensi extends Component
{
    public $breadcrumb = "Absensi Event";

    public $title = "Absensi Event";
    public $data;
    public $event_id;
    public $event;
    public function hapusAbsent($id)
    {
        try {
            // Menghapus absensi berdasarkan ID
            ModelAbsensi::find($id)->delete();

            // Menghapus data kehadiran berdasarkan absensi_id
            ModelDataKehadiran::where('absensi_id', $id)->delete();

            // Memberikan pesan sukses
            session()->flash('message', 'Absen berhasil dihapus.');
        } catch (\Exception $e) {
            // Memberikan pesan error jika terjadi kesalahan
            session()->flash('error', 'Gagal menghapus absen.');
        }
    }

    public function mount($id)
    {
        $this->event_id = $id;
        $this->event = ModelEvents::find($id);
        $this->data = ModelAbsensi::where('event_id', $this->event_id)
            ->get();
    }
    public function render()
    {

        return view('livewire.pages.absensi.events-absensi');
    }
}
