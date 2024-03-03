<?php

namespace App\Livewire\Pages\Absensi;

use App\Models\ModelAbsensi;
use Livewire\Component;

class EditDetailAbsensi extends Component
{
    public $breadcrumb = "Absensi Event Edit";
    public $title = "Absensi Event Edit";
    public $title_absent;
    public $date;
    public $time_start;
    public $time_end;
    public $id;
    protected $rules = [
        'title' => 'required|max:255',
    ];

    public function mount($id)
    {
        $this->id = $id;
        $data = ModelAbsensi::where('id', $id)->first();
        $this->date = $data->date;
        $this->time_start = $data->time_start;
        $this->time_end = $data->time_end;
        $this->title_absent = $data->title;
    }
    public function render()
    {
        return view('livewire.pages.absensi.edit-detail-absensi');
    }
    public function save()
    {
        $this->validate();
        ModelAbsensi::where('id', $this->id)->update([
            'date' => $this->date,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'title' => $this->title_absent,
        ]);
        redirect()->route('admin.absensi.data', $this->id);
    }
}
