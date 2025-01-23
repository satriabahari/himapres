<?php

namespace App\Livewire\Pages\Events;

use App\Models\ModelAbsensi;
use App\Models\ModelDataKehadiran;
use App\Models\ModelEvents;
use App\Models\ModelPesertaEvent;
use App\Models\ModelPosisi;

use App\Http\Controllers\Help\getDataExcel;
use App\Http\Controllers\Help\TemplateExport;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\Component;

use function Laravel\Prompts\form;

class DetailEvents extends Component
{
    public $breadcrumb = "Detail Event";
    public $title = "Detail Event";
    protected $divisiGetAnggota;
    public $dataAnggota;
    public $dataAbsent;
    public $dataDivisi;
    public $dataEvent;
    public $idEvent;
    public function getAnggota($divisi)
    {
        $this->divisiGetAnggota = $divisi;
        if ($divisi == 'all') {
            $this->dataAnggota = ModelPesertaEvent::join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
                ->join('data_posisi', 'data_posisi.id', '=', 'peserta_event.posisi')
                ->where('peserta_event.event_id', $this->idEvent)
                ->orderBy('data_posisi.name') // Menambahkan ORDER BY clause
                ->get(['mahasiswa.*', 'data_posisi.name as divisi', 'peserta_event.id as id']);
        } else {
            $this->dataAnggota = ModelPesertaEvent::join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
                ->join('data_posisi', 'data_posisi.id', '=', 'peserta_event.posisi')
                ->where('peserta_event.event_id', $this->idEvent)
                ->where('peserta_event.posisi', $divisi)
                ->orderBy('data_posisi.name') // Menambahkan ORDER BY clause
                ->get(['mahasiswa.*', 'data_posisi.name as divisi', 'peserta_event.id as id']);
        }
    }
    public function delAnggota($id) // id kepanitiaan
    {
        // get absensi even
        $listAbsentEvent = ModelAbsensi::where('event_id', $this->idEvent)->get();
        // delete data kehadiran
        foreach ($listAbsentEvent as $absent) {
            ModelDataKehadiran::where('absensi_id', $absent->id)->where('peserta_id', $id)->delete();
        }
        // delete data kepanitiaan
        ModelPesertaEvent::where('event_id', $this->idEvent)->where('id', $id)->delete();
        $this->getAnggota($this->divisiGetAnggota);
    }
    public function mount($id)
    {
        $this->idEvent = $id;
        $this->getAnggota('all');
        $this->dataDivisi = ModelPosisi::join('peserta_event', 'data_posisi.id', '=', 'peserta_event.posisi')
            ->join('mahasiswa', 'peserta_event.mhs_id', '=', 'mahasiswa.id')
            ->where('peserta_event.event_id', $this->idEvent)
            ->distinct()
            ->get(['data_posisi.*']);
        $this->dataAbsent = ModelAbsensi::where('event_id', $this->idEvent)->get();
        $this->dataEvent = ModelEvents::find($id);
    }

    public function downloadDetailEvent()
    {
        $this->getAnggota('all');
        $sheet1 = $this->dataAnggota->map(function ($item, $i) {
            return [
                $i + 1,
                $item['name'], $item['nim'], $item['divisi']
            ];
        })->toArray();
        array_unshift($sheet1, ['No', 'Nama', 'NIM', 'Divisi']);


        $sheet2 = $this->dataAbsent->map(function ($item, $i) {
            return [
                $i + 1,
                $item['title'], $item['date'], $item['time_start']
            ];
        })->toArray();
        array_unshift($sheet2, ['No', 'Nama Absent', 'Tanggal', 'Waktu']);

        $sheetAbsent = [];
        foreach ($this->dataAbsent as $absent) {
            // get nama absent
            $titleAbsent = $absent->title;
            // get data absent
            $dataKehadiran = ModelDataKehadiran::where('absensi_id', $absent->id)
                ->join('peserta_event', 'peserta_event.id', 'data_kehadiran.peserta_id')
                ->join('mahasiswa', 'mahasiswa.id', 'peserta_event.mhs_id')
                ->select('mahasiswa.name', 'mahasiswa.nim', 'data_kehadiran.status', 'data_kehadiran.keterangan')
                ->orderBy('mahasiswa.name')
                ->get();
            // Tambahkan data ke dalam array dengan menggunakan nama absent sebagai kunci
            // $sheetAbsent[$titleAbsent] = $dataKehadiran->toArray();
            $sheetAbsent[$titleAbsent] = $dataKehadiran->map(function ($item, $i) {
                return [
                    $i + 1,
                    $item['name'],
                    $item['nim'],
                    $item['status'],  // 1.hadir, 2.terlambat, 3.tanpa keterangan
                    $item['keterangan']
                ];
            })->toArray();

            array_unshift($sheetAbsent[$titleAbsent], ['No', 'Nama', 'NIM', 'Status', 'Keterangan']);
        }


        // Buat array untuk data Excel
        $data = array_merge(
            [
                'Data Kepanitiaan' => $sheet1, // Sheet named "Data Kepanitiaan"
                'Data Absent' => $sheet2,     // Sheet named "Data Absent"
            ],
            $sheetAbsent // Sheets named after absent titles (e.g., "Event 1", "Event 2")
        );

        // Export to Excel
        return Excel::download(new TemplateExport($data), "Data Panitia " . $this->dataEvent->name_event . ".xlsx");

    }

    public function navigateTo($link)
    {
        return redirect($link);
    }
    public function render()
    {
        return view('livewire.pages.events.detail-events');
    }
}
