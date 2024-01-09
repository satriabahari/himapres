<?php

namespace App\Livewire\Pages\Events;

use Livewire\Component;
use App\Models\ModelEvents;

class ListEvents extends Component
{
    public $breadcrumb ="Events List";

    public $title ="Events List";

    public $data;

    public function mount(){
        $this->data = ModelEvents::all();
    }

    public function render()
    {
        return view('livewire.pages.events.list-events');
    }
}
