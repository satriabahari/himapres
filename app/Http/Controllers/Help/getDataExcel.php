<?php

namespace App\Http\Controllers\Help;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class getDataExcel implements ToCollection
{
    public function collection(Collection $rows)
    {
        $data = [];
        $headers = $rows->shift(); // Ambil baris pertama sebagai header

        foreach ($rows as $row) {
            // Inisialisasi array asosiatif untuk menyimpan data
            $rowData = [];

            // Memasangkan nilai pada baris dengan judul kolom dari baris pertama
            foreach ($headers as $key => $header) {
                $rowData[$header] = $row[$key];
            }

            // Tambahkan data ke dalam array $data
            $data[] = $rowData;
        }

        return $data;
    }
}
