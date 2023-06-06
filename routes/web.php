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
use App\Http\Livewire\Proveedor\EditarProveedorComponent;
use App\Http\Livewire\Proveedor\ProveedorComponent;
use App\Http\Livewire\Proveedor\RegistroProveedorComponent;
use App\Http\Livewire\RTL;

use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Usuario\EditarUsuarioComponent;
use App\Http\Livewire\Usuario\RegistrarUsuarioComponent;
use App\Http\Livewire\Usuario\UsuarioComponent;
use App\Http\Livewire\VirtualReality;
//para los tipos de servicios de la membresia
use App\Http\Livewire\TpServicio\TiposComponent;
use App\Http\Livewire\TpServicio\RegistrarComponent;
use App\Http\Livewire\TpServicio\EditarComponent;

//Para los servicios
use App\Http\Livewire\Servicio\ServicioComponent;
use App\Http\Livewire\Servicio\EditarServicioComponent;
use App\Http\Livewire\Servicio\RegistrarServicioComponent;

//Para las membresias
use App\Http\Livewire\Membresia\MembresiaComponent;
use App\Http\Livewire\Membresia\RegistrarMembresiaComponent;
use App\Http\Livewire\Membresia\EditarMembresiaComponent;

//Para las marcas
use App\Http\Livewire\Marca\MarcaComponent;
use App\Http\Livewire\Marca\RegistrarMarcaComponent;
use App\Http\Livewire\Marca\EditarMarcaComponent;

//Para las categorias
use App\Http\Livewire\Categoria\CategoriaComponent;
use App\Http\Livewire\Categoria\RegistrarCategoriaComponent;
use App\Http\Livewire\Categoria\EditarCategoriaComponent;

//Para los productos
use App\Http\Livewire\Producto\ProductoComponent;
use App\Http\Livewire\Producto\RegistrarProductoComponent;
use App\Http\Livewire\Producto\EditarProductoComponent;

//Para las nota de compras
use App\Http\Livewire\NotaCompra\NotaCompraComponent;
use App\Http\Livewire\NotaCompra\RegistrarNotaCompraComponent;
use App\Http\Livewire\NotaCompra\EditarNotaCompraComponent;

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

    //Servicios para la membresia
    Route::get('/servicio', ServicioComponent::class)->name('servicio.index');
    Route::get('/servicio/registrar', RegistrarServicioComponent::class)->name('servicio.registrar');
    Route::get('/servicio/editar/{servicio_id}', EditarServicioComponent::class)->name('servicio.editar');

    //Membresias
    Route::get('/membresias', MembresiaComponent::class)->name('membresia');
    Route::get('/membresia/registrar', RegistrarMembresiaComponent::class)->name('membresia-registrar');
    Route::get('/membresia/editar/{membresia_id}', EditarMembresiaComponent::class)->name('membresia-editar');

    //! routers usuario con errores CORREGIR!!!!
    Route::get('/usuario', UsuarioComponent::class)->name('usuario');
    Route::get('/usuario/registrar', RegistrarUsuarioComponent::class)->name('usuario-registro');
    Route::get('/usuario/editar/{user_id}', EditarUsuarioComponent::class)->name('usuario-editar');

    // proovedor
    Route::get('/proveedor', ProveedorComponent::class)->name('proveedor.index');
    Route::get('/proveedor/registro', RegistroProveedorComponent::class)->name('proveedor-registro');
    Route::get('/proveedor/editar/{proveedor_id}', EditarProveedorComponent::class)->name('proveedor-editar');

    //Para las marcas
    Route::get('/marca', MarcaComponent::class)->name('marca.index');
    Route::get('/marca/registrar', RegistrarMarcaComponent::class)->name('marca.registrar');
    Route::get('/marca/editar/{marca_id}', EditarMarcaComponent::class)->name('marca.editar');

    //Para las categorias
    Route::get('/categoria', CategoriaComponent::class)->name('categoria.index');
    Route::get('/categoria/registrar', RegistrarCategoriaComponent::class)->name('categoria.registrar');
    Route::get('/categoria/editar/{categoria_id}', EditarCategoriaComponent::class)->name('categoria.editar');

     //Para los productos
     Route::get('/producto', ProductoComponent::class)->name('producto.index');
     Route::get('/producto/registrar', RegistrarProductoComponent::class)->name('producto.registrar');
     Route::get('/producto/editar/{producto_id}', EditarProductoComponent::class)->name('producto.editar');
     
     //Para las nota de compras
     Route::get('/nota_compra', NotaCompraComponent::class)->name('nota_compra.index');
     Route::get('/nota_compra/registrar', RegistrarNotaCompraComponent::class)->name('nota_compra.registrar');
     Route::get('/nota_compra/editar/{nota_compra_id}', EditarNotaCompraComponent::class)->name('nota_compra.editar');
});
