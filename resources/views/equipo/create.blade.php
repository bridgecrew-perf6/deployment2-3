@extends('template.plantillab')
@section('p')    
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Inventarios</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                <a class="breadcrumb-item" href="{{url('inventarios')}}">Inventarios</a>
                <span class="breadcrumb-item active">Nuevo Inventario</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Registrar nuevo</h2>
            <br>
            
            <form method="post" action="{{route('creares.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Equipo</label>
                        <select id="equipo" name="equipo" class="form-control">
                            @foreach($c as $ca) 
                            <option value="{{$ca->idEquipo}}">{{$ca->nomb_equipo}}</option>
                             @endforeach 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="serial">Serial</label>
                    <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial">
                     </div>
                        <div class="form-group col-md-6">
                    <label for="placa">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" placeholder="Placa">
                     </div>
                     <div class="form-group col-md-6">
                         @foreach ($u as $un)
                         <label for="placa">ID</label>
                    <input type="" value ="{{$un->idUsuario}}" class="form-control" id="idfk" name="idfk" placeholder="">
                    @endforeach
                    </div>
                    
                </div>
                <label for="inputPassword4">Observaciones</label>

           
            <div id="editor">
                <textarea class="form-control" aria-label="With textarea" name="observer"></textarea>
            </div>
                <br>
                <br>
            <button type="submit" style="margin-left: 500px; width: 220px;" class="btn btn-danger btn-tone m-r-5">Registrar</button>
</form>
        </div>
    </div>
</div>

@endsection