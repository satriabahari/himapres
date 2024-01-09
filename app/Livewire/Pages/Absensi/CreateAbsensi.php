<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelAbsensi;

class CreateAbsensi extends Component
{
    public $breadcrumb ="Absensi Event Create";

    public $title ="Absensi Event Create";

    public $title_event;
    public $time_start;
    public $time_end;

    public $url_id ;

    protected $rules = [
        'title' => 'required|max:255',
        'time_start' => 'required|date_format:H:i',
        'time_end' => 'required|date_format:H:i|after:time_start',
    ];

    public function mount($id){
        $this->url_id = $id;
    }

    public function render()
    {
        return view('livewire.pages.absensi.create-absensi');
    }

    public function save()
    {
        $this->validate();

        // Logika penyimpanan data event
        ModelAbsensi::create([
            'event_id'  => $this->url_id,
            'title' => $this->title_event,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
        ]);

        // Setelah menyimpan, reset nilai input
        $this->reset(['title_event', 'time_start', 'time_end']);

        // Tampilkan pesan sukses
        session()->flash('message', 'Event berhasil disimpan.');

        redirect()->route('admin.absensi.event',$this->url_id);

    }
}
