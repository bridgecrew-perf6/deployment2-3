@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')

<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Perfil</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a  href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                <span class="breadcrumb-item active">Perfil</span>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="d-md-flex align-items-center">
                            <div class="text-center text-sm-left ">
                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                    <img src="{{asset('storage')}}/{{auth()->user()->image}}" alt="">
                                </div>
                            </div>
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h2 class="m-b-5">{{auth()->user()->name}}</h2>
                                <p class="text-dark m-b-20">{{auth()->user()->type}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <ul class="list-unstyled m-t-10">
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                            <span>Email: </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{auth()->user()->email}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                            <span>Telefono</span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{auth()->user()->phone}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Ciudad</span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{auth()->user()->city}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                </div>
                <div class="card">
                    <div class="card-body">
                       
                        <h5>Resumen de Despliegues</h5>
                         @foreach ($desp as $d )

                        <div class="m-t-20">
                            <div class="m-b-20 p-b-20 border-bottom">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="{{asset('storage')}}/{{auth()->user()->image}}" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">{{$d->nomb_proy}}</a>
                                        </h5>
                                    </div>
                                </div>
                                <p>Despliegue realizado el dia {{$d->fecha}}</p>
                                <div class="d-inline-block">
                                    
                                
                                </div>
                                <div class="float-right">
                                    <span class="badge badge-pill badge-blue font-size-12 p-h-10">Completado</span>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach 
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Conectados</h5>
                        @foreach($users as $user)
                        @if(Cache::has('user-is-online-' . $user->id))
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="{{asset('storage')}}/{{$user->image}}" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">{{$user->name}}</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">{{$user->type}}</span>
                                </div>                                                     
                            </div>
                           @else
                           <h1></h1> 
                            @endif
                        @endforeach
                        </div>
                        
                    </div>
                    
                </div>
                <div class="card">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->





@endsection