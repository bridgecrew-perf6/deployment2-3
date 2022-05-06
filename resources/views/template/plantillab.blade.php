<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Development</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/development.svg')}}">

    <!-- page css -->
    <link href="{{asset('assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>



    <!-- Core css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/a.css')}}" rel="stylesheet">


</head>

<body>
    <div class='app is-{{auth()->user()->modo}}'>
        <div class="layout {{auth()->user()->dark}} ">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="{{url('home')}}">
                        <img src="{{asset('assets/images/logo/mchelo.png')}}" class="lo" >
                        <img class="logo-fold" src="{{asset('assets/images/logo/d1.png')}}" alt="Icono M">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="{{url('home')}}">
                        <img src="{{asset('assets/images/logo/mchelox.png')}}"  class="lo" alt="Logo ProjectUp">
                        <img class="logo-fold a" src="{{asset('assets/images/logo/d3.png')}}" alt="Icono ProjectUp">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge">
                               @if(count(auth()->user()->unreadnotifications))
                                <span style="font-size:12px">{{count(auth()->user()->unreadnotifications)}}</span>
                              @endif  
                                </i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notificaciones</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="{{route('markAsRead')}}">
                                        <small>Marcar Como leidas</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                     <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom" style="margin-left:85px">
                                            Notificaciones no leidas
                                            </a>
                                            @foreach (auth()->user()->unreadnotifications as $notification)
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                           
                                            
                                                <div class="avatar avatar-blue avatar-icon">
                                                  
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                   
                                                    <p class="m-b-0 text-dark">Despliegue {{$notification->data['id']}} Realizado</p>
                                                    <p class="m-b-0"><small>{{$notification->created_at->diffForHumans()}}</small></p>
                                                
                                                </div>
                                                 
                                            </div>
                                            
                                        </a>
                                        @endforeach
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom" style="margin-left:85px">
                                        Notificaciones leidas
                                        </a>
                                       
                                       @forelse (auth()->user()->readnotifications as $notification)
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                         
                                            <div class="d-flex">
                                               
                                               <div class="avatar avatar-blue avatar-icon">
                                                  
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">Despliegue {{$notification->data['id']}} Realizado</p>
                                                    <p class="m-b-0"><small>{{$notification->created_at->diffForHumans()}}</small></p>
                                                   
                                                </div>
                                                
                                            </div>
                                            @empty
                                                   <span>Sin notificaciones leidas</span>  
                                             @endforelse
                                            
                                        </a>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{asset('storage/'.auth()->user()->image)}}"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="{{asset('storage/'.auth()->user()->image)}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">{{auth()->user()->name}}
                                            </p>
                                            <p class="m-b-0 opacity-07">{{auth()->user()->type}}</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('perfi/'.auth()->user()->id)}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Ver perfil</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="{{url('perfil/'.auth()->user()->id.'/edit')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Configuracion de Cuenta</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Despliegues</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="{{url('logout')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Cerrar Sesion</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                <i class="anticon anticon-appstore"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>    
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-home"></i> </span>
                                <span class="title">Inicio</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('home.index')}}">Home</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-branches"></i>                                </span>
                                <span class="title">Despliegues</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('despliegues.index')}}">Despliegues</a>
                                </li>
                                <li>
                                    <a href="{{route('ambientes.index')}}">Ambientes</a>
                                </li>
                                <li>
                                    <a href="{{route('capas.index')}}">Capas</a>
                                </li>
                                <li>
                                    <a href="{{route('desarrolladores.index')}}">Desarrollador</a>
                                </li>
                                <li>
                                    <a href={{route('devops.index')}}>Devops</a>
                                </li>
                                <li>
                                    <a href={{route('ramas.index')}}>Ramas</a>
                                </li>
                                <li>
                                    <a href={{route('servidores.index')}}>Servidores</a>
                                </li>
                                <li>
                                    <a href={{route('proyectos.index')}}>Proyectos</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                            
                                        <span class="title">Reportes</span>
                                        <span class="arrow">
                                            <i class="arrow-icon"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{route('pdf.crear')}}">Generar PDF</a>
                                        </li>
                                        <li>
                                            <a href="{{route('excel.crear')}}">Generar Excel</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="side-nav-menu scrollable">
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                            <i class="anticon anticon-robot"></i></span>
                                        <span class="title">Inventario</span>
                                        <span class="arrow">
                                            <i class="arrow-icon"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{route('inventarios.index')}}">Inventarios</a>
                                        </li>
                                        <li>
                                            <a href="{{route('pc.index')}}">Equipos</a>
                                        </li>
                                        <li>
                                            <a href="{{route('cargos.index')}}">Cargos</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">

                @yield('p')


                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2022 Montechelo. All rights reserved.</p>
                        <span>
                            <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>   
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5> 
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Configuración de tema</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Color de cabecera</h5>
                                <p>Configuración de color de cabecera</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                                    </div>
                                    <form method="post" action="{{url('theme/'.auth()->user()->id)}}">
                                      @csrf
                                 @method('PUT')
                                    <div class="form-row">

                                    <div class="radio">
                                        <input id="header-default" name="header-theme"  type="radio" value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme"  type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme"  type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme"  type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                                                        </div>
                                    <br>
                                    <br>
                                  <button class="btn btn-info btn-tone m-r-5  btn-xs"  type="submit">Escoger tema</button>

                                </div>
                                 </form>

                            </div>
                            <hr>
                            <div>
                            <form method="post" action="{{url('dark/'.auth()->user()->id)}}">
                                      @csrf
                                 @method('PUT')
                                <h5 class="m-b-0">Modo oscuro</h5>
                                <p>Cambiar a modo oscuro</p>
                                <div class="switch d-inline">
                                    <input type="radio" name="side-nav-theme-toogle" id="side-nav-theme-toogle" value="is-side-nav-dark"><i class="fas fa-moon"></i> 
                                    <br>
                                    
                                    <input type="radio" name="side-nav-theme-toogle" id="side-nav-theme-toogle" value="is"> <i class="fas fa-sun"></i>
                                    <br>

                                </div>
                                <br>
                                <button class="btn btn-info btn-tone m-r-5  btn-xs"  type="submit">Escoger modo</button>

                                
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Menu Guardado</h5>
                                <p>Cambiar a menu  guardado</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <!-- Quick View END -->
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="{{asset('assets/js/vendors.min.js')}}"></script>
    

    <!-- page js -->
    <script src="{{asset('assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/profile.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://enlink.themenate.net/main.a68630004af6d4d2424e.js"></script>



    <!-- Core JS -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
<script>

    </script>
</body>



</html>