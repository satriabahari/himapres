<?php

namespace App\Livewire\Pages\Mahasiswa;

use App\Http\Controllers\Help\getDataExcel;
use App\Http\Controllers\Help\TemplateExport;
use Livewire\Component;
use App\Models\ModelMhs;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Createmhs extends Component
{
    use WithFileUploads;
    public $breadcrumb = "Tambah Anggota";

    public $title = "Tambah Anggota";

    public $nim;
    public $file;
    public $cardId;
    public $name;
    public $jabatan;

    protected $rules = [
        'nim' => 'required|max:255',
        'name' => 'required',
        'cardId' => 'required',
        'jabatan' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.pages.mahasiswa.createmhs');
    }

    public function save()
    {
        $this->validate();

        if ($this->jabatan == null) {
            $this->createMhs($this->nim, $this->cardId, $this->name, null);
        } else {
            $this->createMhs($this->nim, $this->cardId, $this->name, $this->jabatan);
        }

        $this->reset(['nim', 'name', 'jabatan', 'cardId']);
        session()->flash('message', 'Data berhasil disimpan.');
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
            if (!isset($row[3])) {
                $notif = $this->createMhs($row[0], $row[1], $row[2], null);
            } else {
                $allowed_roles = ['Mahasiswa', 'Dosen', 'Tamu'];
                if (in_array($row[3], $allowed_roles)) {
                    $notif = $this->createMhs($row[0], $row[1], $row[2], $row[3]);
                } else {
                    $notif = $this->createMhs($row[0], $row[1], $row[2], null);
                }
            }
            $notifs[] = $notif;
        }

        session()->flash('excel', $notifs);
    }
    public function createMhs($nim, $cardId, $name, $jabatan)
    {
        try {
            if ($jabatan == null) {
                $mhs = ModelMhs::create([
                    'nim' => $nim,
                    'card_id' => $cardId,
                    'name' => $name,
                ]);
            } else {
                $mhs = ModelMhs::create([
                    'nim' => $nim,
                    'card_id' => $cardId,
                    'name' => $name,
                    'jabatan' => $jabatan,
                ]);
            }
            return [
                true,
                '[' . $mhs->nim . '] ' . $mhs->name . ' berhasil didaftarkan'
            ];
        } catch (\Exception $e) {
            // Tangani pesan error
            return [
                false,
                '[ Error ] ' . $e->getMessage()
            ];
        }
    }
    public function getTemplateExcel()
    {
        $sheet1 = ['nim', 'card_id', 'name', 'jabatan'];
        $sheet2 = [
            ['Ketentuan'],
            ['1. jabatan beupa [Mahasiswa, Dosen, Tamu]'],
            ['2. card_id diisi dengan id kartu NFT']
        ];
        $data = [$sheet1, $sheet2];
        // Export data ke dalam file Excel
        return Excel::download(new TemplateExport($data, 'template'), 'template_excel.xlsx');
    }
}
