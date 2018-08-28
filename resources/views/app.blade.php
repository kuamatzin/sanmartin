<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIMA 2.0</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="/css/app.css" rel="stylesheet">
        <meta name="google-site-verification" content="_K2lrUdI8pCClJtVvupYQtOBdwTnP2a6sh5WC6mUd2g">
        @yield('styles')
        <!-- Fonts -->
        <!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet'
        type='text/css'>-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media
        queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file://
        -->
        <!--[if lt IE 9]>
        <![endif]-->
    </head>
    
    <body>
        <div id="wrap">
            <nav class="navbar navbar-dark bg-dark navbar-siaa navbar-expand-md">
                <a class="navbar-brand" href="#">
                    <img src="/images/siaa.png" width="30" height="30" alt="">
                </a>
                <a class="navbar-brand" href="#">
                    <img src="/images/tlaxcala_nuevo.png" width="30" height="30" alt="">
                </a>
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">	<span class="sr-only">Toggle Navigation</span>
&#x2630;</button>
                <div class="collapse navbar-collapse"
                id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    	 @if (!Auth::guest() && Auth::user()->isAManager())
                        <li class="dropdown nav-item">	<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                            aria-expanded="false">Programa Anual <i class="fa fa-file"></i><span class="caret"></span></a>
                            <ul
                            class="dropdown-menu" role="menu">
                                <li class="dropdown-item"><a href="/programa_anual">Listado</a>
                                </li>
                                <li class="dropdown-item"><a href="/programa_anual/create">Crear programa anual</a>
                                </li>
                    </ul>
                    </li>
                    <li class="dropdown nav-item">	<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                        aria-expanded="false">Compras Menores <i class="fa fa-file"></i><span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/compras_menores">Listado</a>
                            </li>
                            <li class="dropdown-item"><a href="/compras_menores/create">Registrar compra menor</a>
                            </li>
                            </ul>
                    </li>
                    <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                        aria-expanded="false">Requisiciones <i class="fa fa-file"></i><span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/requisiciones">Listado</a>
                            </li>
                            @if(Auth::user()->isAMonitor() || Auth::user()->isAManager())
                            <li
                            class="dropdown-item"><a href="/requisiciones/create">Crear requisici&#xF3;n</a>
                    </li>
                    @endif
                </ul>
                    </li>
                    <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                        aria-expanded="false">Áreas <i class="fa fa-building-o"></i><span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/dependencias">Listado</a>
                            </li>
                            <li class="dropdown-item"><a href="/dependencias/create">Crear área</a>
                            </li>
                            </ul>
                    </li>
                    <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                        aria-expanded="false">Usuarios <i class="fa fa-user"></i><span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/usuarios">Listado</a>
                            </li>
                            <li class="dropdown-item"><a href="/usuarios/create">Crear usuario</a>
                            </li>
                            </ul>
                    </li>
                    <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                        aria-expanded="false">Procedimientos <i class="fa fa-book"></i><span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/usuarios_procedimientos">Usuarios Procedimientos</a>
                            </li>
                            <li class="dropdown-item"><a href="/procedimientos">Listado</a>
                            </li>
                            <li class="dropdown-item"><a href="/procedimientos/create">Crear procedimiento</a>
                            </li>
                            <li class="dropdown-item"><a href="/procedimientos/create">Dictamen T&#xE9;cnico</a>
                            </li>
                            </ul>
                    </li>
                    <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                        aria-expanded="false">Proveedores <i class="fa fa-truck"></i><span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/proveedores">Listado</a>
                            </li>
                            <li class="dropdown-item"><a href="/proveedores/create">Crear proveedor</a>
                            </li>
                            </ul>
                    </li>
                    <li class="nav-item"><a href="/reportes_procedimientos" class="nav-link">Reportes <i class="fa fa-flag" aria-hidden="true"></i></a>
                    </li>
					@endif
                    @if (!Auth::guest() && Auth::user()->isAMonitor())
                    <li
                    class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                        aria-expanded="false">Programa Anual <i class="fa fa-file"></i><span class="caret"></span></a>
                        <ul
                        class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/programa_anual">Listado</a>
                            </li>
                            <li class="dropdown-item"><a href="/programa_anual/create">Crear programa anual</a>
                            </li>
                            </ul>
                            </li>
                            <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                aria-expanded="false">Requisiciones <i class="fa fa-file"></i><span class="caret"></span></a>
                                <ul
                                class="dropdown-menu" role="menu">
                                    <li class="dropdown-item"><a href="/requisiciones">Listado</a>
                                    </li>
                                    <li class="dropdown-item"><a href="/requisiciones/create">Crear requisici&#xF3;n</a>
                                    </li>
                                    </ul>
                            </li>
                            <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                aria-expanded="false">Dependencias <i class="fa fa-building-o"></i><span class="caret"></span></a>
                                <ul
                                class="dropdown-menu" role="menu">
                                    <li class="dropdown-item"><a href="/dependencias">Listado</a>
                                    </li>
                                    <li class="dropdown-item"><a href="/dependencias/create">Crear dependencia</a>
                                    </li>
                                    </ul>
                            </li>
                            <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                aria-expanded="false">Procedimientos <i class="fa fa-book"></i><span class="caret"></span></a>
                                <ul
                                class="dropdown-menu" role="menu">
                                    <li class="dropdown-item"><a href="/usuarios_procedimientos">Usuarios Procedimientos</a>
                                    </li>
                                    <li class="dropdown-item"><a href="/procedimientos">Listado</a>
                                    </li>
                                    <li class="dropdown-item"><a href="/procedimientos/create">Crear procedimiento</a>
                                    </li>
                                    <li class="dropdown-item"><a href="/procedimientos/create">Dictamen T&#xE9;cnico</a>
                                    </li>
                                    </ul>
                            </li>
                            <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                aria-expanded="false">Proveedores <i class="fa fa-truck"></i><span class="caret"></span></a>
                                <ul
                                class="dropdown-menu" role="menu">
                                    <li class="dropdown-item"><a href="/proveedores">Listado</a>
                                    </li>
                                    <li class="dropdown-item"><a href="/proveedores/create">Crear proveedor</a>
                                    </li>
                                    </ul>
                            </li>
                            <li class="nav-item"><a href="/reportes_procedimientos" class="nav-link">Reportes <i class="fa fa-flag" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item"><a href="/reportes_procedimientos" class="nav-link">Reportes <i class="fa fa-flag" aria-hidden="true"></i></a>
                            </li>
							@endif
                            @if (!Auth::guest())
                            	@if(Auth::user()->isAnalista() || Auth::user()->isAnalistaUnidad())
                            <li
                            class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                aria-expanded="false">Programa Anual <i class="fa fa-file"></i><span class="caret"></span></a>
                                <ul
                                class="dropdown-menu" role="menu">
                                    <li class="dropdown-item"><a href="/programa_anual">Listado</a>
                                    </li>
                                    </ul>
                                    </li>
                                    <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                        aria-expanded="false">Requisiciones <i class="fa fa-file"></i><span class="caret"></span></a>
                                        <ul
                                        class="dropdown-menu" role="menu">
                                            <li class="dropdown-item"><a href="/requisiciones">Listado</a>
                                            </li>
                                            <li class="dropdown-item"><a href="/requisiciones/create">Crear requisici&#xF3;n</a>
                                            </li>
                                            </ul>
                                    </li>
                                    <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                        aria-expanded="false">Compras Menores <i class="fa fa-file"></i><span class="caret"></span></a>
                                        <ul
                                        class="dropdown-menu" role="menu">
                                            <li class="dropdown-item"><a href="/compras_menores">Listado</a>
                                            </li>
                                            <li class="dropdown-item"><a href="/compras_menores/create">Crear compra menor</a>
                                            </li>
                                            </ul>
                                    </li>
                                    @endif
                        		@endif
                                </ul>
                                    <ul class="nav navbar-nav ml-auto">
                                    	@if (Auth::guest())
                                        <li class="nav-item"><a href="/auth/login" class="nav-link">Login</a>
                                        </li>
                                        <!--<li><a href="/auth/register">Register</a></li>-->
                                        @else
                                        <li class="dropdown nav-item">	<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                                            aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                            <ul
                                            class="dropdown-menu" role="menu">
                                                <!--<li><a href="">Configuración <i class="fa fa-cog icon-nav float-xs-right"></i></a></li>-->
                                                <li class="dropdown-item"> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                            Logout

                                        </a>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                    method="POST" style="display: none;">{{ csrf_field() }}</form>
                                                </li>
                                    </ul>
                                    </li>
                                @endif
                           </ul>
                </div>
            </nav>
            <br>
            <div class="container mt-5">
                @include('flash::message')
                
        		@yield('content')
        	</div>
    @yield('content2')
</div>
<script src="/js/app.js"></script>
@yield('scripts')
</body>

</html>