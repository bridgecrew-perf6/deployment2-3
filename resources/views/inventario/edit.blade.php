@extends('template.plantillab')
@section('p')

<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Usuario</h2></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                <a class="breadcrumb-item" href="{{url('inventarios')}}">Inventarios</a>
                <span class="breadcrumb-item active">Editar Usuarios</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Editar nuevo Usuario</h2>
            <br>
            
            
           <form id="form" action="{{url('inventarios/'.$iv->idUsuario)}}" method="post">
            @csrf
            @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nombre Completo*</label>
            <input type="name" class="form-control col-form-label control-label" id="name" name="name" placeholder="Nombre" value="{{$iv->nomb_usua}}">
            <strong class="text-danger">{{$errors->first('name')}}</strong>
        </div>
        <div class="form-group col-md-6">
            <label for="cedula">Cedula</label>
            <input type=cedula" class="form-control col-form-label control-label" id="cedula" name="cedula" placeholder="Cedula" value="{{$iv->cedula}}">
            <strong class="text-danger">{{$errors->first('cedula')}}</strong>

        </div>
        <div class="form-group col-md-4">
            <label for="cargo">Cargo</label>
            <select id="cargo" name="cargo" class="form-control">
                @foreach ($c as $ca)
                <option value="{{$ca->idCargo}}" {{$iv->FK_CARGO == $ca->idCargo ? 'selected':''}}>{{$ca->nomb_cargo}}</option>
                @endforeach
            </select>
            <strong class="text-danger">{{$errors->first('cargo')}}</strong>
        </div>
    </div>
    
    <button type="submit" style="margin-left: 500px; width: 220px;" class="btn btn-danger btn-tone m-r-5">Registrar</button>
</form>
        </div>
    </div>
</div>









@endsection