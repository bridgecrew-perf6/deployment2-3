@extends('template.plantillab')
@section('p')
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Rama</h2></h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                                <a class="breadcrumb-item" href="{{url('ramas')}}">Ramas</a>
                                <span class="breadcrumb-item active">Nueva Rama</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2>Registrar nueva Rama</h2>
                            <br>
                            
                            
                            <form action="{{route('ramas.store')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    
                                    <!-- Input A -->
                                    

                                    <div class="form-group col-md-6">
                                        <label for="r"><sup class="obligatorio">*</sup>Nombre de la rama</label>
                                        <input type="text" class="form-control" name="r" id="r"
                                               placeholder="Rama" value="{{old('r')}}">
                                        <strong class="text-danger">{{$errors->first('r')}}</strong>
                                    </div>


                                    <!-- Input D -->



                                </div>
                                
                                <br>
                                <br>
                                <br>

                                
                                <input type="submit" style="margin-left: 500px; width: 220px;" class="btn btn-enviar" value="Registrar">
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