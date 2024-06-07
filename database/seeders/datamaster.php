<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelMhs;
use App\Models\ModelPosisi;

class datamaster extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // // data jabtan
        // // bph
        // Ketua Himpunan
        // Wakil Ketua Himpunan
        // Sekretaris Himpunan
        // Bendahara Himpunan
        // // divisi
        // Koordinator Hubungan Masyarakat
        // Koordinator Mediasi
        // Koordinator Riset dan Teknologi
        // Koordinator Dana dan Usaha
        // Koordinator Minat dan Bakat
        // Koordinator Sosial dan Agama
        // Koordinator Pengembangan Sumber Daya Anggota
        // Anggota Hubungan Masyarakat
        // Anggota Mediasi
        // Anggota Riset dan Teknologi
        // Anggota Dana dan Usaha
        // Anggota Minat dan Bakat
        // Anggota Sosial dan Agama
        // Anggota Pengembangan Sumber Daya Anggota
        // // luar
        // Ketua Prodi Sistem Informasi
        // Dosen Sistem Informasi
        // Dosen Pembina
        // Tamu 

        // data posisi
        ModelPosisi::create(['name' => 'Divisi Acara']);
        ModelPosisi::create(['name' => 'Divisi Publikasi Dekorasi Dokumentasi']);
        ModelPosisi::create(['name' => 'Divisi Hubungan Masyarakat']);
        ModelPosisi::create(['name' => 'Divisi Kesehatan']);
        ModelPosisi::create(['name' => 'Divisi Kamanan']);
        ModelPosisi::create(['name' => 'Divisi Kestari']);
        ModelPosisi::create(['name' => 'Divisi Kosumsi']);
        ModelPosisi::create(['name' => 'Divisi Logistik']);
        ModelPosisi::create(['name' => 'Divisi Sponsor']);
        ModelPosisi::create(['name' => 'Divisi Pemateri']);
        ModelPosisi::create(['name' => 'Divisi Tamu Undangan']);
        ModelPosisi::create(['name' => 'Divisi Dosen']);
    }
}
