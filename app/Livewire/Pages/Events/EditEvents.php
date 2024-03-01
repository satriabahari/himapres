<?php

namespace App\Livewire\Pages\Events;

use Livewire\Component;
use App\Models\ModelEvents;

class EditEvents extends Component
{
    public $breadcrumb = "Edit Event";
    public $title = "Edit Event";
    public $eventId; // Tambahan properti untuk menyimpan ID event yang akan diedit
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

    public function mount($id)
    {
        $this->eventId = $id;

        // Mengisi nilai awal formulir dengan data event yang akan diedit
        $event = ModelEvents::find($id);
        if ($event) {
            $this->title_event = $event->name_event;
            $this->description = $event->detail;
            $this->date_start = $event->date_start;
            $this->date_end = $event->date_end;
        }
    }

    public function edit()
    {
        $this->validate();

        // Logika penyuntingan data event
        $event = ModelEvents::find($this->eventId);
        if ($event) {
            $event->update([
                'name_event' => $this->title_event,
                'detail' => $this->description,
                'date_start' => $this->date_start,
                'date_end' => $this->date_end,
            ]);

            // Tampilkan pesan sukses
            session()->flash('message', 'Event berhasil diperbarui.');
        }

        // Redirect atau lakukan hal lain setelah penyuntingan
        // Misalnya, redirect ke halaman index
        return redirect()->route('admin.events.index');
    }
}
