<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelEvents;
use App\Models\ModelAbsensi;

class EventsAbsensi extends Component
{
    public $breadcrumb ="Absensi Event";

    public $title ="Absensi Event";
    public $data;
    public $event_id;
    public $title_event;

    public function mount($id){
        $this->event_id = $id;
        $this->title_event = ModelEvents::find($id);
    }
    public function render()
    {
        $this->data = ModelAbsensi::where('event_id',$this->event_id)
                        ->get();
        return view('livewire.pages.absensi.events-absensi');
    }
}
