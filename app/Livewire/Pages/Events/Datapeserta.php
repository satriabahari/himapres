<?php

namespace App\Livewire\Pages\Events;

use App\Http\Controllers\Help\getDataExcel;
use App\Http\Controllers\Help\TemplateExport;
use Livewire\Component;
use App\Models\ModelMhs;
use App\Models\ModelPosisi;
use App\Models\ModelPesertaEvent;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\AssignOp\Mod;

class Datapeserta extends Component
{
    use WithFileUploads;
    public $breadcrumb = "Adding Peserta";
    public $title = "Adding Peserta";

    public $datasampel;

    public $nim;
    public $suggestions = [];
    public $file;
    public $posisi;
    public $idEvent;
    public $allpos;

    public function mount($id)
    {
        $this->idEvent = $id;
        $this->allpos = ModelPosisi::all();
        $this->suggestions = ModelMhs::all();
    }


    public function render()
    {
        return view('livewire.pages.events.datapeserta');
    }

    public function createPanitia($nim, $posisi, $idevent)
    {
        // cek keanggotaan
        $keanggotaan = ModelMhs::where('mahasiswa.nim', $nim)->first();
        if ($keanggotaan) {
            // cek kepanitiaan
            $kepanitiaan = ModelPesertaEvent::where('mhs_id', $keanggotaan->id)
                ->where('event_id', $idevent)
                ->join('data_posisi', 'data_posisi.id', '=', 'peserta_event.posisi')
                ->first();
            if ($kepanitiaan) {
                return [
                    false,
                    '[' . $kepanitiaan->name . '] ' . $keanggotaan->name . ' sudah terdaftar'
                ];
            } else {
                ModelPesertaEvent::create([
                    'event_id' => $idevent,
                    'mhs_id' => $keanggotaan->id,
                    'posisi' => $posisi
                ]);
                $nameposisi = ModelPosisi::where('id', $posisi)->first('name');
                return [
                    true,
                    '[' . $nameposisi->name . '] ' . $keanggotaan->name . ' berhasil didaftarkan'
                ];
            }
        } {
            return [
                false,
                '[ Keanggotaan ] ' . $nim . ' Belum terdaftar'
            ];
        }
    }

    public function save()
    {
        try {
            $up = $this->createPanitia($this->nim, $this->posisi, $this->idEvent);
            if ($up[0]) {
                $this->reset(['nim', 'posisi']);
                session()->flash('sucses', $up[1]);
            } else {
                session()->flash('error', $up[1]);
            }
        } catch (\Exception $e) {
            // Tangani pesan error
            session()->flash('error', $e->getMessage());
        }
    }
    public function getTemplateExcel()
    {
        $sheet1 = [["nim", "id_posisi"]];
        $sheet2 = ModelMhs::where('jabatan', 'Mahasiswa')->get(['nim', 'name'])->toArray();
        $sheet3 = ModelMhs::where('jabatan', 'dosen')->get(['nim', 'name'])->toArray();
        $sheet4 = ModelMhs::where('jabatan', 'tamu')->get(['nim', 'name'])->toArray();
        $sheet5 = ModelPosisi::all(['id', 'name'])->toArray();

        // Buat array untuk data Excel
        $data = [
            'inputan' => $sheet1,
            'data mahasiswa' => $sheet2,
            'data dosen' => $sheet3,
            'data tamu' => $sheet4,
            'data divisi' => $sheet5
        ];

        // Export data ke dalam file Excel
        return Excel::download(new TemplateExport($data, 'template'), 'template_excel.xlsx');
    }
    public function saveExcel()
    {
        // Validasi file yang diunggah
        $this->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:10240', // Maksimum 10MB
        ]);

        // Baca file Excel menggunakan Maatwebsite\Excel
        $data = Excel::toArray(new getDataExcel(), $this->file);
        // dapatkan sheet pertama
        $sheet1 = $data[0];
        $notifs = [];
        foreach ($sheet1 as $row) {
            $notif = $this->createPanitia($row[0], $row[1], $this->idEvent);
            $notifs[] = $notif;
        }

        session()->flash('excel', $notifs);
    }
}
