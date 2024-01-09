<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Roles\EditRoles;
use App\Livewire\Pages\Roles\ListRoles;
use App\Livewire\Pages\Users\EditUsers;
use App\Livewire\Pages\Users\ListUsers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Livewire\Pages\Events\EditEvents;
use App\Livewire\Pages\Events\ListEvents;
use App\Livewire\Pages\Roles\CreateRoles;
use App\Livewire\Pages\Absensi\ListAbsensi;
use App\Livewire\Pages\Dashboard\Dashboard;
use App\Livewire\Pages\Events\CreateEvents;
use App\Livewire\Pages\Absensi\CreateAbsensi;
use App\Livewire\Pages\Absensi\EventsAbsensi;
use App\Http\Controllers\PermissionsController;
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

Route::middleware(['auth','role:super-admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/roles',ListRoles::class)->name('roles.index');
    Route::get('/roles/create',CreateRoles::class)->name('roles.create');
    Route::get('/roles/edit/{id}',EditRoles::class)->name('roles.edit');

    Route::get('/permissions',ListPermissions::class)->name('permissions.index');
    Route::get('/permissions/create',CreatePermission::class)->name('permissions.create');
    Route::get('/permissions/edit/{id}',EditPermission::class)->name('permissions.edit');

    Route::get('/users',ListUsers::class)->name('users.index');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::get('/users/{id}',EditUsers::class)->name('users.show');
    Route::post('/users/{user}/roles',[EditUsers::class,'assignRole'])->name('users.roles');

    // Route::delete('/users/{user}/roles/{role}',[UserController::class,'removeRole'])->name('users.roles.remove');

    Route::get('/events',ListEvents::class)->name('events.index');
    Route::get('/events/create',CreateEvents::class)->name('events.create');
    Route::get('/events/edit/{id}',EditEvents::class)->name('events.edit');

    Route::get('/absensi',ListAbsensi::class)->name('absensi.index');
    Route::get('/absensi/event/{id}',EventsAbsensi::class)->name('absensi.event');
    Route::get('/absensi/event/create/{id}',CreateAbsensi::class)->name('absensi.event.create');

});
