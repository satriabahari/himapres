<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelMhs;
use App\Models\ModelEvents;
use App\Models\ModelPesertaEvent;
use App\Http\Controllers\Help\TemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class Rekap extends Controller
{
    //
    public function index()
    {
        $event = $this->getAcara('21010015');
        foreach ($event as $ev) {
            echo $ev . '<br>';
        }
    }

    public function getAcara($nim)
    {
        $mhs = $this->getMahasiswa($nim);

        $result = ModelPesertaEvent::where('mhs_id', $mhs->id)
            ->join('events', 'peserta_event.event_id', '=', 'events.id')
            ->join('data_posisi', 'peserta_event.posisi', '=', 'data_posisi.id')
            ->leftJoin('absensi', function ($join) {
                $join->on('absensi.event_id', '=', 'events.id');
            })
            ->leftJoin('data_kehadiran', function ($join) {
                $join->on('data_kehadiran.absensi_id', '=', 'absensi.id')->on('data_kehadiran.peserta_id', '=', 'peserta_event.id');
            })
            ->select(
                'absensi.title',
                'events.name_event',
                'data_posisi.name AS position_name',
                'events.detail',
                'events.date_start',
                'events.date_end',
                'absensi.created_at AS waktu',
                'data_kehadiran.status', // Assuming 'status' in data_kehadiran table
            )
            ->get();

        return $result;
    }

    public function getMahasiswa($nim)
    {
        $mhs = ModelMhs::where('nim', $nim)->first();
        return $mhs;
    }

    public function byNim($nim)
    {
        $event = $this->getAcara($nim);
        foreach ($event as $ev) {
            echo $ev . '<br>';
        }

        $this->download($nim);
    }

    public function download($nim)
    {
        $mhs = $this->getMahasiswa($nim);
        $sheet1 = $this->getAcara($nim)->map(function ($item, $i) {
            return [$i + 1, $item['title'], $item['name_event'],$item['position_name'], $item['detail'],$item['date_start'], $item['date_end'], $item['waktu'], $item['status']];
        })->toArray();

        array_unshift($sheet1, ['No', 'Absenis', 'Acara', 'Posisi', 'Detail', 'Tanggal Mulai', 'Tanggal Selesai', 'Waktu', 'Kehadiran']);

        $data = array_merge(
            [
                "Rekap Absen ".$mhs->name => $sheet1]
        );
        // Export to Excel

        // dd($data);
        return Excel::download(new TemplateExport($data), "Rekap Absen ".$mhs->name . '.xlsx');
    }
}
