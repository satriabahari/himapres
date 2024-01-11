<?php

namespace App\Livewire\Pages\Posisi;

use Livewire\Component;
use App\Models\ModelPosisi;

class Listposisi extends Component
{
    public $breadcrumb ="Posisi List";

    public $title ="Posisi List";
    public $data;

    public function mount(){
        $this->data = ModelPosisi::all();
    }

    public function render()
    {
        return view('livewire.pages.posisi.listposisi');
    }

    public function delete($id){
        $posisi = ModelPosisi::find($id);

        $posisi->delete();

        $this->data =ModelPosisi::all();

    }
}
