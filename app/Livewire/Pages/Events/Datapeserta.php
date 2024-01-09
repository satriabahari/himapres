<?php

namespace App\Livewire\Pages\Events;

use Livewire\Component;

class Datapeserta extends Component
{
    public $breadcrumb ="Adding Peserta";
    public $title ="Adding Peserta";

    public function render()
    {
        return view('livewire.pages.events.datapeserta');
    }
}
