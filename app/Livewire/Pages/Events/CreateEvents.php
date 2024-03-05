<?php

namespace App\Livewire\Pages\Events;

use Livewire\Component;
use App\Models\ModelEvents;

class CreateEvents extends Component
{
    public $breadcrumb = "Craete Event";
    public $title = "Craete Event";

    public $title_event;
    public $description;
    public $date_start;
    public $date_end;

    protected $rules = [
        'title_event' => 'required|max:255',
        'description' => 'required',
        'date_start' => 'required|date',
        'date_end' => 'required|date|after_or_equal:date_start',
    ];

    public function render()
    {
        return view('livewire.pages.events.create-events');
    }

    public function save()
    {
        $this->validate();

        // Logika penyimpanan data event
        ModelEvents::create([
            'name_event' => $this->title_event,
            'detail' => $this->description,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ]);

        // Setelah menyimpan, reset nilai input
        $this->reset(['title_event', 'description', 'date_start', 'date_end']);

        // Tampilkan pesan sukses
        session()->flash('message', 'Event berhasil disimpan.');

        redirect()->route('admin.events.index');
    }
}
