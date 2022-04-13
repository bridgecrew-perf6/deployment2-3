@extends('template.plantillab')
@section('p')
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Proyectos</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                                <a class="breadcrumb-item" href="{{url('proyectos')}}">Proyectos</a>
                                <span class="breadcrumb-item active">Editar Proyecto</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2>Editar Proyecto</h2>
                            <br>
                            
                            
                            <form action="{{url('proyectos/'.$proyecto->idProyecto)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    
                                    <!-- Input A -->
                                    

                                    <div class="form-group col-md-6">
                                        <label for="p"><sup class="obligatorio">*</sup>Proyecto</label>
                                        <input type="text" class="form-control" name="p" id="p"
                                               placeholder="Proyecto" value="{{$proyecto->nomb_proy}}">
                                        <strong class="text-danger">{{$errors->first('p')}}</strong>
                                    </div>


                                    <!-- Input D -->
                                    <div class="form-group col-md-6">
                                    <label><sup class="obligatorio">*</sup>Capa</label>
                                    <select id="inputState" class="form-control" name="s">
                                        <option selected>Elige</option>
                                        @foreach ($pr as $p)
                                            <option value="{{$p->idLayer}}">{{$p->layer}}</option>
                                            @endforeach
                                    </select>
                                    
                                    <strong class="text-danger"></strong>
                                </div>


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