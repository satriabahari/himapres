<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Roles\EditRoles;
use App\Livewire\Pages\Roles\ListRoles;
use App\Livewire\Pages\Users\EditUsers;
use App\Livewire\Pages\Users\ListUsers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Livewire\Pages\Absensi\ScanRfid;
use App\Http\Controllers\RolesController;
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
use App\Http\Controllers\PermissionsController;
use App\Livewire\Pages\Absensi\EditDetailAbsensi;
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

// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::middleware(['auth', 'role:super-admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/roles', ListRoles::class)->name('roles.index');
    Route::get('/roles/create', CreateRoles::class)->name('roles.create');
    Route::get('/roles/edit/{id}', EditRoles::class)->name('roles.edit');

    Route::get('/permissions', ListPermissions::class)->name('permissions.index');
    Route::get('/permissions/create', CreatePermission::class)->name('permissions.create');
    Route::get('/permissions/edit/{id}', EditPermission::class)->name('permissions.edit');

    Route::get('/users', ListUsers::class)->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}', EditUsers::class)->name('users.show');
    Route::post('/users/{user}/roles', [EditUsers::class, 'assignRole'])->name('users.roles');

    // Route::delete('/users/{user}/roles/{role}',[UserController::class,'removeRole'])->name('users.roles.remove');

    Route::get('/events', ListEvents::class)->name('events.index');
    Route::get('/events/create', CreateEvents::class)->name('events.create');
    Route::get('/events/detail/{id}', DetailEvents::class)->name('events.detail');
    Route::get('/events/edit/{id}', EditEvents::class)->name('events.edit');
    Route::get('/events/create-peserta/{id}', Datapeserta::class)->name('events.peserta');

    Route::get('/absensi', ListAbsensi::class)->name('absensi.index');
    Route::get('/absensi/event/{id}', EventsAbsensi::class)->name('absensi.event');
    Route::get('/absensi/event/create/{id}', CreateAbsensi::class)->name('absensi.event.create');
    Route::get('/absensi/event/edit/{id}', EditDetailAbsensi::class)->name('absensi.event.edit');
    Route::get('/absensi/event/data/{id}', DataAbsensi::class)->name('absensi.data');
    Route::get('/absensi/event/scan/{id}', ScanRfid::class)->name('absensi.scan-rfid');


    Route::get('/posisi', Listposisi::class)->name('posisi.index');
    Route::get('/posisi/create', Createposisi::class)->name('posisi.create');
    Route::get('/posisi/edit/{id}', Editposisi::class)->name('posisi.edit');

    Route::get('/mahasiswa', Listmhs::class)->name('mahasiswa.index');
    Route::get('/mahasiswa/create', Createmhs::class)->name('mahasiswa.create');
    Route::get('/mahasiswa/edit/{id}', Editmhs::class)->name('mahasiswa.edit');
});
