@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')
        <div class="main-content">
                    <div class="page-header no-gutters">
                        <div class="row align-items-md-center">
                            <div class="col-md-6">
                                <div class="media m-v-10">
                                    <div class="avatar avatar-cyan avatar-icon avatar-square">
                                        <i class="anticon anticon-star"></i>
                                    </div>

                                    <div class="media-body m-l-15">
                                        @foreach($al as $a)
                                        <h6 class="mb-0">Usuarios Activos ({{$a->count_row}})</h6>
                                        @endforeach
                                        <span class="text-gray font-size-13">Inventarios</span>
                                    </div>
                                    <a href="{{url('inventarios/create')}}"><button class="btn btn-info">Nuevo Usuario</button></a>

                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right m-v-10">
                                    <div class="btn-group">
                                        <button id="list-view-btn" type="button" class="btn btn-default btn-icon">
                                            <i class="anticon anticon-ordered-list"></i>
                                        </button>
                                        <button id="card-view-btn" type="button" class="btn btn-default btn-icon active">
                                            <i class="anticon anticon-appstore"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <!-- Card View -->
                            <div class="row" id="card-view">
                                @foreach($iv as $i)

                                <div class="col-md-3">

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="m-t-20 text-center">
                                                <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                                    <img src="assets/images/logo/nube.png" alt="">
                                                </div>
                                                <h4 class="m-t-30">{{$i->nomb_usua}}</h4>
                                                <p>{{$i->nomb_cargo}}</p>

                                            </div>


                                        <div class="text-center m-t-20 form-group" >
                                            <div class="text-center m-t-20 row" style="
                                                margin-left: 75px;">

                                               

                                                <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                    <a href="{{url('inventarios/'.$i->idUsuario.'/edit')}}"><i class="anticon anticon-edit"></i></a> 
                                                </button>
                                                

                                                    <form method="post" action="{{route('inventarios.delete', $i->idUsuario)}}">

                                                        @csrf
                                                        @method('DELETE')
                                                        <a><button class="m-r-5 btn btn-icon btn-hover btn-rounded show_confirm" id="deleteButton" onclick="
                                                            return confirm('Estas seguro de borrar este usuario?')" data-name="{{$i->nomb_usua}}" type="submit"><i class="anticon anticon-delete"></i></button></a>
                                                        </form>
                                                        
                                                </div>
                                            </div>
                                            <div class="text-center m-t-30">
                                                <a class="btn btn-primary btn-tone" href="{{url('inventarios/'.$i->idUsuario)}}">
                                                    <i class="anticon anticon-radar-chart"></i>
                                                    <span class="m-l-5">Ver mas</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                            <div class="row d-none" id="list-view">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">

                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Cargo</th>
                                                                <th>Editar</th>
                                                                <th>Eliminar</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                @foreach($iv as $i)

                                                                <td>
                                                                    <div class="media align-items-center">
                                                                        <div class="avatar avatar-image">
                                                                            <img src="assets/images/logo/mchelox.png" alt="">
                                                                        </div>
                                                                        <div class="media-body m-l-15">
                                                                            <h6 class="mb-0">{{$i->nomb_usua}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{$i->nomb_cargo}}</td>
                                                                <td>
                                                                    <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                                        <a href="{{url('inventarios/'.$i->idUsuario.'/edit')}}"><i class="anticon anticon-edit"></i> </a>                                               </button>
                                                                    </button>
                                                                </td>
                                                                <td>

                                                                    <form method="post" action="{{route('inventarios.delete', $i->idUsuario)}}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    <button class="m-r-5 btn btn-icon btn-hover btn-rounded" onclick="
                                                                    return confirm('Estas seguro de borrar este usuario?')" type="submit">
                                                                        <i class="anticon anticon-delete"></i>                                                </button>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                    
                                                            </td>
                                                                <td class="text-right">
                                                                    <a class="btn btn-primary btn-tone" href="{{url('inventarios/'.$i->idUsuario)}}">
                                                                        <i class="anticon anticon-radar-chart"></i>
                                                                        <span class="m-l-5">Ver mas</span>
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                            @endforeach

                                                        </tbody>

                                                    </table>

                                                </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    
                </div>


                
@endsection