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
                                <span class="breadcrumb-item active">Editar Despliegue</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2>Editar despliegue</h2>
                            <br>
                            
                            
                            <form action="{{url('despliegues/'.$despliegues->idDesp)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    
                                    <!-- Input A -->
                                    <div class="form-group col-md-6">

                                        <label><sup class="obligatorio">*</sup>Ambiente</label>
                                        <select id="inputState" class="form-control" name="a" required>
                                            @foreach ($Desp as $desp)
                                                <option value="{{$desp->idAmbiente}}" {{$despliegues->FK_AMB == $desp->idAmbiente ? 'selected': ''}}>{{$desp->nomb_amb}}</option>
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
                                                <option value="{{$desa->idDesarollador}}" {{$despliegues->FK_DESA == $desa->idDesarollador ? 'selected':''}}>{{$desa->nomb_desa}}</option>
                                                @endforeach
                                        </select>
                                        <strong class="text-danger"></strong>
                                    </div>



    
                                    <div class="form-group col-md-6">

                                        <label><sup class="obligatorio">*</sup>Devops</label>
                                        <select id="inputState" class="form-control" name="dv">
                                            <option selected>Elige</option>
                                            @foreach ($Devo as $devo)
                                                <option value="{{$devo->idDevops}}" {{$despliegues->FK_DEVO == $devo->idDevops ? 'selected':''}}>{{$devo->nomb_devo}}</option>
                                                @endforeach
                                        </select>
                                        <strong class="text-danger"></strong>

                                    </div>


    
                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Layer</label>
                                        <select id="inputState" class="form-control" name="l">
                                            <option selected>Elige</option>
                                            @foreach ($Lay as $lay)

                                                <option value="{{$lay->idLayer}}" {{$despliegues->FK_LAYE == $lay->idLayer ? 'selected':''}}>{{$lay->layer}}</option>
                                                @endforeach

                                        </select>
                                        <strong class="text-danger"></strong>

                                    </div>


                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Proyecto</label>
                                        <select id="inputState" class="form-control" name="p">
                                            <option selected>Elige</option>
                                            @foreach ($Pro as $pro)

                                                <option value="{{$pro->idProyecto}}" {{$despliegues->FK_PRO == $pro->idProyecto ? 'selected':''}}>{{$pro->nomb_proy}}</option>
                                                @endforeach

                                        </select>
                                        <strong class="text-danger"></strong>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Rama</label>
                                        <select id="inputState" class="form-control" name="r">
                                            <option selected>Elige</option>
                                            @foreach ($Rama as $rama)
                                            <option value="{{$rama->idRama}}" {{$despliegues->FK_RAMA == $rama->idRama ? 'selected':''}}>{{$rama->nomb_rama}}</option>
                                            @endforeach
                                        </select>
                                        
                                        <strong class="text-danger"></strong>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label><sup class="obligatorio">*</sup>Servidor</label>
                                        <select id="inputState" class="form-control" name="s">
                                            <option selected>Elige</option>
                                            @foreach ($Serv as $serv)

                                                <option value="{{$serv->idServidor}}" {{$despliegues->FK_SERV == $serv->idServidor ? 'selected':''}}>{{$serv->numb_serv}}</option>
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
            @endsection