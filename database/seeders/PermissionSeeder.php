<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Data.Master']);
        Permission::create(['name' => 'Manage.Access']);
        Permission::create(['name' => 'Data.users']);

        Permission::create(['name' => 'Event.List']);
        Permission::create(['name' => 'Event.Create']);
        Permission::create(['name' => 'Event.Show']);
        Permission::create(['name' => 'Event.Edit']);
        Permission::create(['name' => 'Event.Add_Peserta']);

        Permission::create(['name' => 'Absensi.List']);
        Permission::create(['name' => 'Absensi.Create']);
        Permission::create(['name' => 'Absensi.Show']);
        Permission::create(['name' => 'Absensi.Edit']);
        Permission::create(['name' => 'Absensi.Data']);
        Permission::create(['name' => 'Absensi.Scan-RFID']);
        Permission::create(['name' => 'Absensi.Scan-QR']);
        Permission::create(['name' => 'Absensi.Scan-Manual']);

        Permission::create(['name' => 'Posisi.List']);
        Permission::create(['name' => 'Posisi.Create']);
        Permission::create(['name' => 'Posisi.Edit']);

        Permission::create(['name' => 'Mahasiswa.List']);
        Permission::create(['name' => 'Mahasiswa.Create']);
        Permission::create(['name' => 'Mahasiswa.Edit']);

        Permission::create(['name' => 'Data.divisi']);
        Permission::create(['name' => 'Data.keanggotaan']);
        Permission::create(['name' => 'Data.rekap']);
    }
}
