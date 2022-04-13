@extends('template.plantillab')
@section('p')

<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Usuario</h2></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                <a class="breadcrumb-item" href="{{url('inventarios')}}">Usuarios</a>
                <span class="breadcrumb-item active">Nuevo Usuario</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            
            <h2>Registrar nuevo Usuario</h2>
            <br>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Equipo</a>
                </li>
                
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            
           <form id="form" action="{{route('inventarios.store')}}" method="post" name="form">
            @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nombre Completo*</label>
            <input type="name" class="form-control col-form-label control-label" id="name" name="name" placeholder="Nombre">
            <strong class="text-danger">{{$errors->first('name')}}</strong>
        </div>
        <div class="form-group col-md-6">
            <label for="cedula">Cedula</label>
            <input type=cedula" class="form-control col-form-label control-label" id="cedula" name="cedula" placeholder="Cedula">
            <strong class="text-danger">{{$errors->first('cedula')}}</strong>

        </div>
        <div class="form-group col-md-4">
            <label for="cargo">Cargo</label>
            <select id="cargo" name="cargo" class="form-control">
                <option selected>Elije</option>
                @foreach ($c as $ca)
                <option value="{{$ca->idCargo}}">{{$ca->nomb_cargo}}</option>
                @endforeach
            </select>
            <strong class="text-danger">{{$errors->first('cargo')}}</strong>
        </div>
    </div>
    
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Equipo</label>
                        <select id="equipo" name="equipo" class="form-control">
                            @foreach($e as $eq)
                            <option value="{{$eq->idEquipo}}">{{$eq->nomb_equipo}}</option>
                            @endforeach
                        </select>
                        <strong class="text-danger">{{$errors->first('equipo')}}</strong>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="serial">Serial</label>
                    <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial">
                    <strong class="text-danger">{{$errors->first('serial')}}</strong>
                 </div>
                <div class="form-group col-md-6">
                    <label for="placa">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" placeholder="Placa">
                    <strong class="text-danger">{{$errors->first('placa')}}</strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="hidden" class="form-control" id="idfk" name="idfk" placeholder=""Disabled Input"">
                </div>
                
            </div>
            <label for="inputPassword4">Observaciones</label>

           
            <div id="editor">
                <textarea class="form-control" aria-label="With textarea" name="observer"></textarea>
                <strong class="text-danger">{{$errors->first('observer')}}</strong>
            </div>
            <br>
            <button type="submit" style="margin-left: 500px; width: 220px;" class="btn btn-danger btn-tone m-r-5">Registrar</button>

            <br>
            <br>
            </div>
        </form>
        
            </div>
        
    </div>
</div>
    </div></div>
    





@endsection

