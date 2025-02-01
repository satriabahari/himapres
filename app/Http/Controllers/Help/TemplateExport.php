<?php

namespace App\Http\Controllers\Help;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class TemplateExport implements WithMultipleSheets
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->data as $sheetName => $sheetData) {
            $sheets[] = new MySheet($sheetName, $sheetData);
        }

        return $sheets;
    }
}

class MySheet implements FromArray, WithTitle
{
    protected $sheetName;
    protected $data;

    public function __construct(string $sheetName, array $data)
    {
        $this->sheetName = $sheetName;
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
