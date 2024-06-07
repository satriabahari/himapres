<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'super-admin'])->givePermissionTo(
            'Data.Master',
            'Manage.Access',
            'Absensi.List',
            'Absensi.Create',
            'Absensi.Edit',
            'Absensi.Show',
            'Absensi.Data',
            'Absensi.Scan-RFID',
            'Absensi.Scan-QR',
            'Absensi.Scan-Manual',
            'Event.List',
            'Event.Create',
            'Event.Show',
            'Event.Edit',
            'Event.Add_Peserta',
            'Posisi.List',
            'Posisi.Create',
            'Posisi.Edit',
            'Mahasiswa.List',
            'Mahasiswa.Create',
            'Mahasiswa.Edit',
            'Data.users',
            'Data.divisi',
            'Data.keanggotaan',
            'Data.rekap'
        );
        Role::create(['name' => 'sekretaris'])->givePermissionTo(
            'Absensi.List',
            'Absensi.Create',
            'Absensi.Edit',
            'Absensi.Show',
            'Absensi.Data',
            'Absensi.Scan-RFID',
            'Absensi.Scan-QR',
            'Absensi.Scan-Manual',
            'Event.List',
            'Event.Create',
            'Event.Show',
            'Event.Edit',
            'Event.Add_Peserta',
            'Posisi.List',
            'Posisi.Create',
            'Posisi.Edit',
            'Mahasiswa.List',
            'Mahasiswa.Create',
            'Mahasiswa.Edit',
            'Data.divisi',
            'Data.keanggotaan',
            'Data.rekap'
        );
    }
}
