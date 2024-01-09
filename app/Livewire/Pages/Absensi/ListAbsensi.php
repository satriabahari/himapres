<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelEvents;

class ListAbsensi extends Component
{
    public $breadcrumb ="Absensi List";

    public $title ="Absensi List";

    public $data ;

    public function render()
    {
        $this->data = ModelEvents::all();
        return view('livewire.pages.absensi.list-absensi');
    }
}
