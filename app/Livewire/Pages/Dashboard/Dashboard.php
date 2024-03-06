<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\ModelMhs;
use Livewire\Component;

class Dashboard extends Component
{
    public $breadcrumb = "Dashboard";
    public $countAnggota;
    public $countMahasiswa;
    public $countDosen;
    public $countTamu;

    public $title = "Dashboard";

    public function render()
    {
        return view('livewire.pages.dashboard.dashboard');
    }

    public function mount()
    {
        $this->countAnggota = ModelMhs::all()->count();
        $this->countMahasiswa = ModelMhs::where('jabatan', 'Mahasiswa')->count();
        $this->countDosen = ModelMhs::where('jabatan', 'Dosen')->count();
        $this->countTamu = ModelMhs::where('jabatan', 'Tamu')->count();
    }
}
