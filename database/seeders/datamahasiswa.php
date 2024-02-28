<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelMhs;

class datamahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelMhs::create([
            'nim' => "f1e121094",
            'card_id' => "3543319904",
            'name' => "Muktashim Billah"
        ]);
        ModelMhs::create([
            'nim' => "f1e121091",
            'card_id' => "12345",
            'name' => "Muktashim"
        ]);
    }
}
