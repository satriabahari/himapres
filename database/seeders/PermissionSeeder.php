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
        Permission::create(['name' => 'data.master']);
        Permission::create(['name' => 'manage.access']);
        Permission::create(['name' => 'Absensi.all']);
        Permission::create(['name' => 'Data.event']);
        Permission::create(['name' => 'Data.posisi']);
        Permission::create(['name' => 'Data.anggota']);
        Permission::create(['name' => 'Data.users']);
        Permission::create(['name' => 'Data.divisi']);
        Permission::create(['name' => 'Data.keanggotaan']);
        Permission::create(['name' => 'Data.rekap']);
    }
}
