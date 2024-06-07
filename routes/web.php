<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Roles\EditRoles;
use App\Livewire\Pages\Roles\ListRoles;
use App\Livewire\Pages\Users\EditUsers;
use App\Livewire\Pages\Users\ListUsers;
use App\Http\Controllers\UserController;
use App\Livewire\Pages\Absensi\ScanRfid;
use App\Livewire\Pages\Events\EditEvents;
use App\Livewire\Pages\Events\ListEvents;
use App\Livewire\Pages\Mahasiswa\Editmhs;
use App\Livewire\Pages\Mahasiswa\Listmhs;
use App\Livewire\Pages\Posisi\Editposisi;
use App\Livewire\Pages\Posisi\Listposisi;
use App\Livewire\Pages\Roles\CreateRoles;
use App\Livewire\Pages\Events\Datapeserta;
use App\Livewire\Pages\Absensi\DataAbsensi;
use App\Livewire\Pages\Absensi\ListAbsensi;
use App\Livewire\Pages\Dashboard\Dashboard;
use App\Livewire\Pages\Events\CreateEvents;
use App\Livewire\Pages\Mahasiswa\Createmhs;
use App\Livewire\Pages\Posisi\Createposisi;
use App\Livewire\Pages\Absensi\CreateAbsensi;
use App\Livewire\Pages\Absensi\EventsAbsensi;
use App\Livewire\Pages\Absensi\EditDetailAbsensi;
use App\Livewire\Pages\Absensi\ScanManual;
use App\Livewire\Pages\Absensi\ScanQr;
use App\Livewire\Pages\Events\DetailEvents;
use App\Livewire\Pages\Permissions\EditPermission;
use App\Livewire\Pages\Permissions\ListPermissions;
use App\Livewire\Pages\Permissions\CreatePermission;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/events', ListEvents::class)->name('events.index')->middleware('permission:Event.List');;
    Route::get('/events/create', CreateEvents::class)->name('events.create')->middleware('permission:Event.Create');
    Route::get('/events/detail/{id}', DetailEvents::class)->name('events.detail')->middleware('permission:Event.Show');
    Route::get('/events/edit/{id}', EditEvents::class)->name('events.edit')->middleware('permission:Event.Edit');
    Route::get('/events/create-peserta/{id}', Datapeserta::class)->name('events.peserta')->middleware('permission:Event.Add_Peserta');

    Route::get('/absensi', ListAbsensi::class)->name('absensi.index')->middleware('permission:Absensi.List');
    Route::get('/absensi/event/{id}', EventsAbsensi::class)->name('absensi.event')->middleware('permission:Absensi.Show');
    Route::get('/absensi/event/create/{id}', CreateAbsensi::class)->name('absensi.event.create')->middleware('permission:Absensi.Create');
    Route::get('/absensi/event/edit/{id}', EditDetailAbsensi::class)->name('absensi.event.edit')->middleware('permission:Absensi.Edit');
    Route::get('/absensi/event/data/{id}', DataAbsensi::class)->name('absensi.data')->middleware('permission:Absensi.Data');
    Route::get('/absensi/event/scan/rfid/{id}', ScanRfid::class)->name('absensi.scan-rfid')->middleware('permission:Absensi.Scan-RFID');
    Route::get('/absensi/event/scan/qr/{id}', ScanQr::class)->name('absensi.scan-qr')->middleware('permission:Absensi.Scan-QR');
    Route::get('/absensi/event/scan/manual/{id}', ScanManual::class)->name('absensi.scan-manual')->middleware('permission:Absensi.Scan-Manual');
    // Route::get('/absensi/event/scan/qr/{id}', ScanQr::class)->name('absensi.scan-qr')->middleware('permission:Absensi.Scan-RFID');

    Route::get('/posisi', Listposisi::class)->name('posisi.index')->middleware('permission:Posisi.List');
    Route::get('/posisi/create', Createposisi::class)->name('posisi.create')->middleware('permission:Posisi.Create');
    Route::get('/posisi/edit/{id}', Editposisi::class)->name('posisi.edit')->middleware('permission:Posisi.Edit');

    Route::get('/mahasiswa', Listmhs::class)->name('mahasiswa.index')->middleware('permission:Mahasiswa.List');
    Route::get('/mahasiswa/create', Createmhs::class)->name('mahasiswa.create')->middleware('permission:Mahasiswa.Create');
    Route::get('/mahasiswa/edit/{id}', Editmhs::class)->name('mahasiswa.edit')->middleware('permission:Mahasiswa.Edit');

    Route::get('/posisi', Listposisi::class)->name('posisi.index');
    Route::get('/posisi/create', Createposisi::class)->name('posisi.create');
    Route::get('/posisi/edit/{id}', Editposisi::class)->name('posisi.edit');
});

// ==================================================================================================
// khusus Super Admin
Route::middleware(['auth', 'role:super-admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/roles', ListRoles::class)->name('roles.index');
    Route::get('/roles/create', CreateRoles::class)->name('roles.create');
    Route::get('/roles/edit/{id}', EditRoles::class)->name('roles.edit');

    Route::get('/permissions', ListPermissions::class)->name('permissions.index');
    Route::get('/permissions/create', CreatePermission::class)->name('permissions.create');
    Route::get('/permissions/edit/{id}', EditPermission::class)->name('permissions.edit');

    Route::get('/users', ListUsers::class)->name('users.index');
    Route::get('/users/{id}', EditUsers::class)->name('users.show');
    Route::post('/users/{user}/roles', [EditUsers::class, 'assignRole'])->name('users.roles');
});
