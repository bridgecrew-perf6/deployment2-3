
@extends('template.plantillab')
@section('p')    
                
                <div class="main-content">
                    <div class="page-header">
                        @foreach ($in->unique('nomb_usua') as $i)
                        <h2 class="header-title">{{$i->nomb_usua}}</h2>
                        @endforeach
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <a class="breadcrumb-item" href="{{url('inventarios')}}">Inventario</a>
                                @foreach ($in->unique('nomb_usua') as $i)
                                <span class="breadcrumb-item active">{{$i->nomb_usua}}</span>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div id="invoice" class="p-h-30">
                                    <div class="m-t-15 lh-2">
                                        <div class="inline-block">
                                            <a href="{{url('crearin/'.$i->idUsuario.'/create')}}" class=""><button class="btn btn-warning btn-tone m-r-5">Agregar Nuevo</button></a>

                                        </div>
                                        <div class="float-right">
                                            @foreach ($in->unique('nomb_usua') as $i)
                                            <h2>{{$i->nomb_usua}}</h2>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="row m-t-20 lh-2">
                                        <div class="col-sm-9">
                                            <h3 class="p-l-10 m-t-10"></h3>
                                            <address class="p-l-10 m-t-10">
                                                <span class="font-weight-semibold text-dark"></span><br>
                                                <span></span><br>
                                                <span></span>
                                            </address>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="m-t-80">
                                                <div class="text-dark text-uppercase d-inline-block">
                                                    <span class="font-weight-semibold text-dark">Cedula</span></div>
                                                    @foreach ($in->unique('cedula') as $i)
                                                <div class="float-right">{{$i->cedula}}</div>
                                                @endforeach
                                            </div>
                                            <div class="text-dark text-uppercase d-inline-block">
                                                <span class="font-weight-semibold text-dark">Cargo</span>
                                            </div>
                                            @foreach ($in->unique('cargo') as $i)
                                            <div class="float-right">{{$i->nomb_cargo}}</div>
                                            @endforeach

                                        </div>
                                        <br>
                                    </div>
                                    <div class="m-t-20">
                                        <div class="table-responsive">
                                            <table class="table" id="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Equipo</th>
                                                        <th>Serial</th>
                                                        <th>Placa</th>
                                                        <th>Mas..</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                        <th>Acta</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($in as $i)
                                                    @if($i->acta == 1 || $i->acta == 2)
                                                    <tr>
                                                        <td>{{$i->nomb_equipo}}</td>
                                                        <td>{{$i->serial}}</td>
                                                        <td>{{$i->placa}}</td>
                                                        <td><a href="{{url('observer/'.$i->idUsuaActivo)}}"><i class="anticon anticon-eye"></i></a></td>
                                                        <td><a href="{{url('observer/'.$i->idUsuaActivo.'/edit')}}"><i class="anticon anticon-edit"></i></a></td>
                                                        <td> <form action="{{route('eq.delete', $i->idUsuaActivo)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        <button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-xs btn-info" style="color:white;display:inline-block"
                                                            title="Eliminar" onclick="
                                                            return confirm('Estas seguro de borrar este equipo?')"><i class="anticon anticon-delete"></i></a></button></td>
                                                        </form></td>
                                                        <td>
                                                            @switch ($i->acta)
                                                            @case(1)
                                                            <a href="{{url('observer/'.$i->idUsuaActivo.'/enable')}}"><i class="anticon anticon-check"></i></a>
                                                        @break
                                                        @case(2)
                                                        <a href="{{url('observer/'.$i->idUsuaActivo.'/enable')}}"> <i class="anticon anticon-close"></i></a>
                                                        @break
                                                        @endswitch
                                                        </td>


                                                    </tr>
                                                    @endif
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                        <div class="row m-v-20">
                                            <div class="col-sm-6">
                                                <img class="img-fluid text-opacity m-t-5" width="100" src="assets/images/logo/logo.png" alt="">
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <small><span class="font-weight-semibold text-dark">Telefono: </span>{{auth()->user()->phone}}</small>
                                                <br>
                                                <small>{{auth()->user()->email}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            
            

            
       
@endsection