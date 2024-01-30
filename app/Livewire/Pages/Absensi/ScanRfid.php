<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;

class ScanRfid extends Component
{
    public $breadcrumb ="Scan Absensi";
    public $title ="Scan Absensi";

    public $rfidResult;

    public function startRFIDScan()
    {
        // Logika pemindaian RFID (misalnya, set nilai dengan contoh RFID)
        $this->rfidResult = '123456789';
    }

    public function render()
    {
        return view('livewire.pages.absensi.scan-rfid');
    }
}
