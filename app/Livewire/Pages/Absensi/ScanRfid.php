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
                ->orWhere('nim',$this->cardId)
                ->first();
        if($data){
            $cek = ModelPesertaEvent::where('mhs_id',$data->id)
                ->first();
            $this->absensi = $data;
            if($cek){
                $status = ModelDataPeserta::where('absensi_id',$this->id)
                            ->where('peserta_id',$cek->id)
                            ->first();
                if($status->status == "3"){
                    $status->update([
                        'status' => '1'
                    ]);
                    $this->pesan_err = null;

                }else{
                    $this->pesan_err = "Anda Telah Melakukan Absensi";

                }

            }else{

                $this->pesan_err = "Data Tidak Ditemukan";

            }
        }
        else{

            $this->pesan_err = "Data Tidak Ditemukan";

        }
        $this->reset(['cardId']);
    }

    public function render()
    {
        return view('livewire.pages.absensi.scan-rfid');
    }
}
