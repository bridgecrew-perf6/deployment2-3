@extends('template.plantillab')
@section('p')
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Equipos</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                                <a class="breadcrumb-item" href="{{url('pc')}}">Equipos</a>
                                <span class="breadcrumb-item active">Editar Equipo</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2>Editar Equipo</h2>
                            <br>
                            
                            
                            <form action="{{url('pc/'.$pc->idEquipo)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    
                                    <!-- Input A -->
                                    

                                    <div class="form-group col-md-6">
                                        <label for="pc"><sup class="obligatorio">*</sup>Equipo</label>
                                        <input type="text" class="form-control" name="pc" id="pc"
                                               placeholder="Equipo" value="{{$pc->nomb_equipo}}">
                                        <strong class="text-danger">{{$errors->first('pc')}}</strong>
                                    </div>


                                    <!-- Input D -->
                                   


                                </div>
                                
                                <br>
                                <br>
                                <br>

                                
                                <input type="submit" style="margin-left: 500px; width: 220px;" class="btn btn-enviar" value="Modificar">
                                <br>
                                <br>
                                <br>                               
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Search End-->

            <!-- Quick View START -->
            @endsection