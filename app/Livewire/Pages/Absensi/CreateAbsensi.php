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


        // Check if Absensi record is created successfully
        if ($absensi) {
            // Loop through participants and create DataPeserta records
            foreach ($data as $dt) {
                ModelDataPeserta::create([
                    'absensi_id' => $absensi->id,
                    'peserta_id' => $dt->id,
                    'status'     => '0',
                ]);
            }

            // Further logic after successful creation of Absensi and DataPeserta records
            // You can add additional code here if needed
        } else {
            // Handle the case when Absensi creation fails
            // You may want to log an error or take appropriate action
            // Example: Log::error('Failed to create Absensi record.');
        }

        // Tampilkan pesan sukses
        session()->flash('message', 'Event berhasil disimpan.');

        redirect()->route('admin.absensi.event',$this->url_id);

    }
}
