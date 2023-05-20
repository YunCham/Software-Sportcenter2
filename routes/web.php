<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Compra\Brand\BrandComponent;
use App\Http\Livewire\Compra\Brand\EditBrandComponent;
use App\Http\Livewire\Compra\Brand\RegistroBrandComponent;
use App\Http\Livewire\Compra\Brand\ShowBrandComponent;
use App\Http\Livewire\Compra\Category\CategoryComponent;
use App\Http\Livewire\Compra\Proveedor\EditarProveedorComponent;
use App\Http\Livewire\Compra\Proveedor\ProveedorComponent;
use App\Http\Livewire\Compra\Proveedor\RegistroProveedorComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Personal\EditarPersonalComponent;
use App\Http\Livewire\Personal\PersonalComponent;
use App\Http\Livewire\Personal\RegistrarPersonalComponent;
use App\Http\Livewire\Profile;
use App\Http\Livewire\RTL;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Usuario\EditarUsuarioComponent;
use App\Http\Livewire\Usuario\RegistrarUsuarioComponent;
use App\Http\Livewire\Usuario\UsuarioComponent;
use App\Http\Livewire\VirtualReality;
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
    //! routers usuario
    Route::get('/usuario', UsuarioComponent::class)->name('usuario');
    Route::get('/usuario/registro', RegistrarUsuarioComponent::class)->name('usuario-registro');
    Route::get('/usuario/editar/{user_id}', EditarUsuarioComponent::class)->name('usuario-editar');
    // proovedor
    Route::get('/compra/proveedor', ProveedorComponent::class)->name('proveedor.index');
    Route::get('/compra/proveedor/registro', RegistroProveedorComponent::class)->name('proveedor-registro');
    Route::get('/compra/proveedor/editar/{proveedor_id}', EditarProveedorComponent::class)->name('proveedor-editar');
    // Marca
    Route::get('/compra/brand', BrandComponent::class)->name('marca.index');
    Route::get('/compra/brand/registro', RegistroBrandComponent::class)->name('marca-registro');
    Route::get('/compra/brand/editar/{marca_id}', EditBrandComponent::class)->name('marca-editar');
    Route::get('compra/brand/{brand}', ShowBrandComponent::class)->name('brand.show');

    Route::get('/compra/category', CategoryComponent::class)->name('categoria.index');

});
