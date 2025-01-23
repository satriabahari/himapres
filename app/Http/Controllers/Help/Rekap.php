<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelMhs;
use App\Models\ModelEvents;
use App\Models\ModelPesertaEvent;

class Rekap extends Controller
{
    //
    public function index() {
        $event = $this->getAcara('21010015');
        echo $event;
    }

    public function getAcara($nim) {
        $mhs = $this->getMahasiswa($nim);
        $result = ModelPesertaEvent::where('mhs_id', $mhs->id)
            ->join('events', 'peserta_event.event_id', '=', 'events.id')
            ->select('events.name_event', 'events.date_start', 'events.date_end', 'events.detail')
            ->get();
        return $result; 
    }

    public function getMahasiswa($nim) {
        $mhs = ModelMhs::where('nim', $nim)->first();
        return $mhs;
    }

    public function byNim($nim) {
        $event = $this->getAcara($nim);
        echo $event;
    }
}
