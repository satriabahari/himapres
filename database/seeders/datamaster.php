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
        // data keanggotaan
        // ModelMhs::create([
        //     'nim' => "f1e121094",
        //     'card_id' => "3543319904",
        //     'name' => "Muktashim Billah"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122023",
        //     'card_id' => "1",
        //     'name' => "Megawati Ananda Putri"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E123016",
        //     'card_id' => "2",
        //     'name' => "Adam Zuhri Ramadhan"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122157",
        //     'card_id' => "3",
        //     'name' => "Agung Prayugo"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122103",
        //     'card_id' => "4",
        //     'name' => "Aldiansyah"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122062",
        //     'card_id' => "5",
        //     'name' => "Amira Aurelia Salsabila"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122011",
        //     'card_id' => "6",
        //     'name' => "Ammar As'ad"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E123039",
        //     'card_id' => "7",
        //     'name' => "Devi Listiani Safitri"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122187",
        //     'card_id' => "8",
        //     'name' => "Dobel Pernandes"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E22195",
        //     'card_id' => "9",
        //     'name' => "Febri Heryansah"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122002",
        //     'card_id' => "10",
        //     'name' => "Imelda Agustin"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122215",
        //     'card_id' => "11",
        //     'name' => "Insyra Inayah Putri"
        // ]);
        // ModelMhs::create([
        //     'nim' => "f1e121168",
        //     'card_id' => "12",
        //     'name' => "ketri genes yolanda"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E123107",
        //     'card_id' => "13",
        //     'name' => "M. Fauzi Gafar"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122077",
        //     'card_id' => "14",
        //     'name' => "M. Rizky Ardiansyah Putra"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122035",
        //     'card_id' => "15",
        //     'name' => "M.Zaki Al Fikri"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E123012",
        //     'card_id' => "16",
        //     'name' => "Marsha Safa Nabilla"
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122123",
        //     'card_id' => "17",
        //     'name' => "Puja Feby Anggina Lestari "
        // ]);
        // ModelMhs::create([
        //     'nim' => "F1E122108",
        //     'card_id' => "18",
        //     'name' => "Tia Marcelin "
        // ]);

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
