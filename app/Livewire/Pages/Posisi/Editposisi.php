<?php

namespace App\Livewire\Pages\Posisi;

use Livewire\Component;
use App\Models\ModelEvents;
use App\Models\ModelPosisi;

class Editposisi extends Component
{
    public $breadcrumb ="Posisi List";

    public $title ="Posisi List";
    public $name;
    public $posisiId;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($id){
        $this->posisiId = $id;
        $posisi = ModelPosisi::find($id);
        if($posisi){
            $this->name = $posisi->name;
        }

    }
    public function render()
    {
        return view('livewire.pages.posisi.editposisi');
    }

    public function save(){

        $this->validate();

        $posisi = ModelPosisi::find($this->posisiId);
        if ($posisi) {
            $posisi->update([
                'name' => $this->name,
            ]);
        }
        return redirect()->route('admin.posisi.index');

    }
}
