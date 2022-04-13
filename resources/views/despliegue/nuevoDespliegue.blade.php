@extends('template.plantillab')
@section('p')        

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Despliegues</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                                <a class="breadcrumb-item" href="{{url('despliegues')}}">Despliegues</a>
                                <span class="breadcrumb-item active">Nuevo Despliegue</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2>Registrar nuevo despliegue</h2>
                            <br>
                            
                            
                            <form action="{{route('despliegues.store')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    
                                    <!-- Input A -->
                                    <div class="form-group col-md-6">

                                        <label><sup class="obligatorio">*</sup>Ambiente</label>
                                        <select id="inputState" class="form-control" name="a">
                                            <option selected>Elige</option>
                                            @foreach ($Desp as $desp)
                                                <option value="{{$desp->idAmbiente}}">{{$desp->nomb_amb}}</option>
                                                @endforeach
                                                
                                        </select>
                                        <strong class="text-danger"></strong>

                                    </div>


                                    <!-- Input D -->
                                    <div class="form-group col-md-6">

                                        <label><sup class="obligatorio">*</sup>Desarrollador</label>
                                        <select id="inputState" class="form-control" name="d">
                                            <option selected>Elige</option>
                                            @foreach ($Desa as $desa)
                                                <option value="{{$desa->idDesarollador}}">{{$desa->nomb_desa}}</option>
                                                @endforeach
                                        </select>
                                        <strong class="text-danger"></strong>
                                    </div>



    
                                    <div class="form-group col-md-6">

                                        <label><sup class="obligatorio">*</sup>Devops</label>
                                        <select id="inputState" class="form-control" name="dv">
                                            <option selected>Elige</option>
                                            @foreach ($Devo as $devo)
                                                <option value="{{$devo->idDevops}}">{{$devo->nomb_devo}}</option>
                                                @endforeach
                                        </select>
                                        <strong class="text-danger"></strong>

                                    </div>


    
                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Layer</label>
                                        <select id="inputState" class="form-control" name="l">
                                            <option selected>Elige</option>
                                            @foreach ($Lay as $lay)

                                                <option value="{{$lay->idLayer}}">{{$lay->layer}}</option>
                                                @endforeach

                                        </select>
                                        <strong class="text-danger"></strong>

                                    </div>


                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Proyecto</label>
                                        <select id="inputState" class="form-control" name="p">
                                            <option selected>Elige</option>
                                            @foreach ($Pro as $pro)

                                                <option value="{{$pro->idProyecto}}">{{$pro->nomb_proy}}</option>
                                                @endforeach

                                        </select>
                                        <strong class="text-danger"></strong>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Rama</label>
                                        <select id="inputState" class="form-control" name="r">
                                            <option selected>Elige</option>
                                            @foreach ($Rama as $rama)
                                            <option value="{{$rama->idRama}}">{{$rama->nomb_rama}}</option>
                                            @endforeach
                                        </select>
                                        
                                        <strong class="text-danger"></strong>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Servidor</label>
                                        <select id="inputState" class="form-control" name="s">
                                            <option selected>Elige</option>
                                            @foreach ($Serv as $serv)

                                                <option value="{{$serv->idServidor}}">{{$serv->numb_serv}}</option>
                                                @endforeach

                                        </select>
                                        <strong class="text-danger"></strong>
                                    </div>

                                </div>
                                
                                <br>
                                <br>
                                <br>

                                
                                <input type="submit" style="margin-left: 500px; width: 220px;" class="btn btn-enviar" value="Registrar">
                               
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="primary">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                    <label for="side-nav-theme-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            @endsection