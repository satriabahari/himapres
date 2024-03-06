<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelEvents;
use Carbon\Carbon;

class ListAbsensi extends Component
{
    public $breadcrumb = "Absensi List";

    public $title = "Absensi List";
    public $currentDateTime;

    public $data;
    public function mount()
    {
        $this->currentDateTime = Carbon::now();

        // $this->data = ModelEvents::whereDate('date_start', '>=', $this->currentDateTime)
        //     ->whereDate('date_end', '>=', $this->currentDateTime)
        //     ->get();
        $this->data = ModelEvents::all();
    }

    public function render()
    {
        return view('livewire.pages.absensi.list-absensi');
    }
}
