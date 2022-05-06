@extends('template.plantillab')
@section('p')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Usuario</h2></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                <a class="breadcrumb-item" href="{{url('inventarios')}}">Inventarios</a>
                <span class="breadcrumb-item active">Nueva Maquina</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
 <h2>Registrar nueva maquina</h2>
            <br>
            <form  method="post" action="{{route('crearma.store')}}">
           @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Nombre de la Maquina</label>
            <input type="text" class="form-control" id="maquina" name="maquina" placeholder="Maquina">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Ram</label>
            <input type="text" class="form-control" id="ram" name="ram" placeholder="Ram">
        </div>
    </div>
    <div class="form-row">
     <div class="form-group col-md-6">
        <label for="inputAddress">Fecha de creación</label>
        <input type="date" class="form-control" id="fech" name="fech" placeholder="1234 Main St">
        </div>
        <div class="form-group col-md-6">
        @foreach ($u as $un)
            <label for="inputPassword4">ID</label>
            <input type="text" class="form-control" id="idfk" name="idfk" placeholder="idkf" value ="{{$un->idUsuario}}">
            @endforeach
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Usuario red</label>
            <input type="text" class="form-control" id="red" name="red">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Sistema Operativo</label>
            <select id="so" name="so" class="form-control">
                <option value="windows" selected>Windows</option>
                <option value="ubuntu">Ubuntu</option>
                <option value="fedora">Fedora</option>
                <option value="centos">Centos</option>
                <option value="Linux Mint">Linux Mint</option>
                <option value="Mac OS">Mac OS</option>
            </select>
        </div>
    </div>
    <br>
    <br>
      <button type="submit" style="margin-left: 595px; width: 220px;" class="btn btn-danger btn-tone m-r-5">Registrar</button>
</form>
        </div>
@endsection
