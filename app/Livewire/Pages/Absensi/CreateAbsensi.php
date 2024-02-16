<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelAbsensi;
use App\Models\ModelDataPeserta;
use App\Models\ModelPesertaEvent;

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
        // Fetch participants for the given event_id
        $data = ModelPesertaEvent::where('event_id', $this->url_id)->get();

        // Logika penyimpanan data event
        $absensi = ModelAbsensi::create([
            'event_id'   => $this->url_id,
            'title'      => $this->title_event,
            'time_start' => $this->time_start,
            'time_end'   => $this->time_end,
        ]);
        if ($absensi) {
            foreach ($data as $dt) {
                ModelDataPeserta::create([
                    'absensi_id' => $absensi->id,
                    'peserta_id' => $dt->id,
                    'status'     => '3',
                ]);
            }
        } else {
        }
        session()->flash('message', 'Event berhasil disimpan.');
        redirect()->route('admin.absensi.event',$this->url_id);

    }
}
