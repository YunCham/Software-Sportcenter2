<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Notifications;
//Para el personal
use App\Http\Livewire\Personal\EditarPersonalComponent;
use App\Http\Livewire\Personal\PersonalComponent;
use App\Http\Livewire\Personal\RegistrarPersonalComponent;
//aparte
use App\Http\Livewire\Profile;
use App\Http\Livewire\RTL;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Usuario\UsuarioComponent;
use App\Http\Livewire\VirtualReality;
//para los tipos de servicios de la membresia
use App\Http\Livewire\TpServicio\TiposComponent;

use App\Http\Livewire\TpServicio\RegistrarComponent;
use App\Http\Livewire\TpServicio\EditarComponent;
//aparte
use GuzzleHttp\Middleware;

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
    return redirect('sign-in');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');



Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('billing', Billing::class)->name('billing');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('tables', Tables::class)->name('tables');
    Route::get('notifications', Notifications::class)->name("notifications");
    Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
    Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
    Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('rtl', RTL::class)->name('rtl');

    //mis rutas
    Route::get('/personal', PersonalComponent::class)->name('perosnal.index');
    Route::get('/personal/registro', RegistrarPersonalComponent::class)->name('personal-registro');
    Route::get('/personal/editar/{personal_id}', EditarPersonalComponent::class)->name('personal-editar');

    //Tipos de servicios para la membresia
    Route::get('/tservicio', TiposComponent::class)->name('tservicio.index');
    Route::get('/tservicio/registrar', RegistrarComponent::class)->name('tservicio.registrar');
    Route::get('/tservicio/editar/{tservicio_id}', EditarComponent::class)->name('tservicio.editar');

    //! routers usuario
    Route::get('/usuario', UsuarioComponent::class)->name('usuario');
});
