<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">FITNET Sports Center </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Laravel examples
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-profile' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-management' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('user-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('tables') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>

            {{-- Menu despegable de tablas --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }}"
                    href="#" id="navbarDropdown" role="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Usuarios</span>
                </a>
                <div class="collapse" id="collapseMenu">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('perosnal.index') }}">Personal</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('usuario') }}">Usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Something else here</a></li>
                    </ul>
                </div>
            </li>

            {{-- Modulo de membresias y transacciones --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white {{ Route::currentRouteName() == 'otroDesplegable' ? ' active bg-gradient-primary' : '' }}"
                    href="#" id="otroDesplegableDropdown" role="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseMenuOtroDesplegable" aria-expanded="false"
                    aria-controls="collapseMenuOtroDesplegable">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Membresias</span>
                </a>
                <div class="collapse" id="collapseMenuOtroDesplegable">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('membresia') }}">Membresia</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Transaccion</a></li>
                    </ul>
                </div>
            </li>

            {{-- Modulo de  servicios --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white {{ Route::currentRouteName() == 'otros' ? ' active bg-gradient-primary' : '' }}"
                    href="#" id="otrosDropdown" role="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseMenuOtros" aria-expanded="false" aria-controls="collapseMenuOtros">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Servicios</span>
                </a>
                <div class="collapse" id="collapseMenuOtros">
                    <ul class="nav">

                        <li class="nav-item"><a class="nav-link" href="{{ route('servicio.index') }}">Servicios</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tservicio.index') }}">Tipos de
                                servicios</a></li>
                    </ul>
                </div>
            </li>
            {{-- Administracion de compras --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }}"
                    href="#" id="navbarDropdown2" role="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseMenu2" aria-expanded="false" aria-controls="collapseMenu2">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">shopping_cart</i>
                    </div>
                    <span class="nav-link-text ms-1">Compras</span>
                </a>
                <div class="collapse" id="collapseMenu2">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="{{route('nota_compra.index')}}">Nota de compra</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('proveedor.index') }}">Proveedor</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Administracion de productos --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white {{ Route::currentRouteName() == 'productos' ? ' active bg-gradient-primary' : '' }}"
                    href="#" id="navbarDropdown3" role="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseMenu3" aria-expanded="false" aria-controls="collapseMenu3">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">shopping_bag</i>
                    </div>
                    <span class="nav-link-text ms-1">Productos</span>
                </a>
                <div class="collapse" id="collapseMenu3">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('producto.index')}}">Producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('marca.index')}}">Marca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('categoria.index')}}">Categoría</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nota de salida</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- Administracion de inventarios --}}
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white {{ Route::currentRouteName() == 'inventarios' ? ' active bg-gradient-primary' : '' }}"
                    href="#" id="navbarDropdown4" role="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseMenu4" aria-expanded="false" aria-controls="collapseMenu4">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">inventory_2</i>
                    </div>
                    <span class="nav-link-text ms-1">Inventario</span>
                </a>
                <div class="collapse" id="collapseMenu4">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nota de salida</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            {{-- Para las areas deportivas --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                    href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">sports_soccer</i>
                    </div>
                    <span class="nav-link-text ms-1">Areas Deportivas</span>
                </a>
            </li>
            {{-- Para las areas comunes --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                    href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">meeting_room</i>
                    </div>
                    <span class="nav-link-text ms-1">Areas Comunes</span>
                </a>
            </li>

            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            
                <div class="collapse {{ Route::currentRouteName() == 'tables' ? ' show' : '' }}" id="collapseMenu">
                    <ul class="nav">
                        <li class="nav-item {{ Route::currentRouteName() == 'tables.action' ? ' active' : '' }}"><a class="nav-link" href="{{ route('tables.action') }}"><i class="material-icons">check</i> Action</a></li>
                        <li class="nav-item {{ Route::currentRouteName() == 'tables.another_action' ? ' active' : '' }}"><a class="nav-link" href="{{ route('tables.another_action') }}"><i class="material-icons">edit</i> Another action</a></li>
                        <li class="nav-item {{ Route::currentRouteName() == 'tables.something_else' ? ' active' : '' }}"><a class="nav-link" href="{{ route('tables.something_else') }}"><i class="material-icons">info</i> Something else here</a></li>
                    </ul>
                </div>
            </li> --}}
            {{-- FIN Menu despegable de tablas --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'billing' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('billing') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'virtual-reality' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('virtual-reality') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'rtl' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('rtl') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'notifications' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('notifications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'profile' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-up') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100"
                href="https://www.creative-tim.com/product/material-dashboard-laravel-livewire" target="_blank">Free
                Download</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="../../documentation/getting-started/installation.html"
                target="_blank">View documentation</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100"
                href="https://www.creative-tim.com/product/material-dashboard-pro-laravel-livewire" target="_blank"
                type="button">Upgrade
                to pro</a>
        </div>
    </div>
</aside>
