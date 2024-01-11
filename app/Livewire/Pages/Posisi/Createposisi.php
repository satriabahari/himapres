<?php

namespace App\Livewire\Pages\Posisi;

use Livewire\Component;
use App\Models\ModelPosisi;

class Createposisi extends Component
{
    public $breadcrumb ="Posisi List";

    public $title ="Posisi List";

    public $name;

    public function render()
    {
        return view('livewire.pages.posisi.createposisi');
    }

    public function save()
    {
        // Validate input
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        // Save data_posisi
        ModelPosisi::create([
            'name' => $this->name,
        ]);

        redirect()->route('admin.posisi.index');
    }


}
