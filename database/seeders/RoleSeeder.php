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
        Role::create(['name' => 'super-admin'])->givePermissionTo('data.master','manage.access','Absensi.all','Data.event','Data.posisi','Data.anggota','Data.users','Data.divisi','Data.keanggotaan','Data.rekap');
        Role::create(['name' => 'sekretaris'])->givePermissionTo('Absensi.all','Data.event','Data.posisi','Data.anggota','Data.divisi','Data.keanggotaan','Data.rekap');
    }
}
