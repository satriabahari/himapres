<?php

namespace App\Livewire\Pages\Absensi;

use Livewire\Component;
use App\Models\ModelMhs;
use App\Models\ModelAbsensi;
use App\Models\ModelDataPeserta;
use App\Models\ModelPesertaEvent;

class ScanRfid extends Component
{
    public $breadcrumb ="Scan Absensi";
    public $title ="Scan Absensi";

    public $cardId;
    public $absensi = null;
    public $id;
    public $pesan_err = null;

    public function mount($id){
        $this->id = $id;
    }

    public function submitForm()
    {
        $data = ModelMhs::where('card_id', $this->cardId)
            ->first();
        if($data){
            $cek = ModelPesertaEvent::where('mhs_id',$data->id)
            ->first();
            $this->absensi = $data;
            if($cek){
                $status = ModelDataPeserta::where('absensi_id',$this->id)
                            ->where('peserta_id',$cek->mhs_id)
                            ->first();
                if($status == null){
                    $result = ModelDataPeserta::create([
                        'absensi_id'    => $this->id,
                        'peserta_id'    => $cek->mhs_id,
                        'status'        => '0'
                    ]);
                    $this->pesan_err = null;
                }else{
                    $this->pesan_err = "Anda Telah Melakukan Absensi";
                }

            }
        }
        $this->reset(['cardId']);
    }

    public function render()
    {
        return view('livewire.pages.absensi.scan-rfid');
    }
}
