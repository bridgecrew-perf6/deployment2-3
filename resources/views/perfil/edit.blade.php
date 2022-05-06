@extends('template.plantillab')
@section('p')

 <div class="main-content">
                    <div class="page-header no-gutters has-tab">
                        <h2 class="font-weight-normal">Configuración</h2>
                        <ul class="nav nav-tabs" >
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-account">Cuenta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-network">Contraseña</a>
                            </li>
                            
                    
                        </ul>
                    </div>
                    <div class="container">
                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" id="tab-account" >
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Información básica</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                                                <img src="{{asset('storage/'.auth()->user()->image)}}" alt="">
                                            </div>
                                            <div class="m-l-20 m-r-20">
                                                <h5 class="m-b-5 font-size-18">Cambiar avatar</h5>
                                                <p class="opacity-07 font-size-13 m-b-0">
                                                    Dimensiones recomendadas <br>
                                                    120x120 Maximo tamaño: 5MB
                                                </p>
                                            </div>
                                            <button type="button" class="btn btn-secondary btn-tone m-r-5" data-toggle="modal" data-target="#exampleModalCenter">
    Subir
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <form action="{{url('image/'.auth()->user()->id)}}" enctype="multipart/form-data" method="post">
      @csrf
        @method('PUT')
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Subir imagen</h5>
                
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" id="image" name="image">
        <label class="custom-file-label" for="customFile">Sube el archivo</label>
    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
    </form>

</div>
                                        </div>
                                        <hr class="m-v-25">
                                        <form method="post" action="{{url('perfil/'.auth()->user()->id)}}">
                                          @csrf
        @method('PUT')
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="font-weight-semibold" for="userName">Nombre y apellido</label>
                                                    <input type="text" name="name" class="form-control" id="userName" placeholder="User Name" value="{{auth()->user()->name}}">
                                                   <strong class="text-danger">{{$errors->first('name')}}</strong>                                                                                         

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="font-weight-semibold" for="email">Correo:</label>
                                                    <input type="text" name="email" class="form-control" id="email" placeholder="email" value="{{auth()->user()->email}}">
                                                    <strong class="text-danger">{{$errors->first('email')}}</strong>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="phoneNumber">Telefono</label>
                                                    <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" name="phone" value="{{auth()->user()->phone}}">
                                                    <strong class="text-danger">{{$errors->first('phone')}}</strong>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="dob">Ciudad</label>
                                                    <input type="text" name="city" class="form-control" id="dob" placeholder="Date of Birth" value="{{auth()->user()->city}}">
                                                    <strong class="text-danger">{{$errors->first('city')}}</strong>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="font-weight-semibold" for="language">Tipo</label>
                                                    <select id="language" class="form-control" name="type" >
                                                        <option value="Desarrollador">Desarrollador</option>
                                                        <option value="Devops">Devops</option>
                                                    </select>
                                                    <strong class="text-danger">{{$errors->first('type')}}</strong>
                                                </div>
                                                <button class="btn btn-primary m-t-30" type="submit">Cambiar</button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </form>
                                
                            <div class="tab-pane fade" id="tab-network">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Cambiar Contraseña</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('password/'.auth()->user()->id)}}">
                                        @csrf
                                         @method('PUT')
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="font-weight-semibold" for="oldPassword">Antigua Contraseña</label>
                                                    <input type="password" class="form-control"  id="oldPassword" name="old_password" placeholder="Antigua Contraseña" value="">
                                                    <strong class="text-danger">{{$errors->first('old_password')}}</strong>
                                                </div>
                                
                                                <div class="form-group col-md-3">
                                                    <label class="font-weight-semibold" for="newPassword">Nueva Contraseña</label>
                                                    <input type="password" class="form-control" id="newPassword" name="password" placeholder="Nueva Contraseña">
                                                    <strong class="text-danger">{{$errors->first('password')}}</strong>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="font-weight-semibold" for="confirmPassword">Confirmar Contraseña</label>
                                                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirmar Contraseña">
                                                    <strong class="text-danger">{{$errors->first('password_confirmation')}}</strong>
                                                </div>
                                                <div class="form-group col-md-3">
                                                </div>
                                                <button class="btn btn-primary m-t-30" type="submit">Cambiar</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            <div class="tab-pane fade" id="tab-notification">
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Notification Config</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item p-h-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-icon avatar-blue">
                                                                    <i class="anticon anticon-user"></i>
                                                                </div>
                                                                <div class="m-l-15">
                                                                    <h5 class="font-weight-semibold m-b-0">Everyone can look me up</h5>
                                                                    <p class="m-b-0 font-weight-normal">Allow people found on your public.</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="switch m-t-5 m-l-10">
                                                                    <input type="checkbox" id="switch-config-1" checked>
                                                                    <label for="switch-config-1"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item p-h-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-icon avatar-cyan">
                                                                    <i class="anticon anticon-mobile"></i>
                                                                </div>
                                                                <div class="m-l-15">
                                                                    <h5 class="font-weight-semibold m-b-0">Everyone can contact me</h5>
                                                                    <p class="m-b-0 font-weight-normal">Allow any peole to contact.</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="switch m-t-5 m-l-10">
                                                                    <input type="checkbox" id="switch-config-2" checked> 
                                                                    <label for="switch-config-2"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item p-h-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-icon avatar-gold">
                                                                    <i class="anticon anticon-environment"></i>
                                                                </div>
                                                                <div class="m-l-15">
                                                                    <h5 class="font-weight-semibold m-b-0">Show my location</h5>
                                                                    <p class="m-b-0 font-weight-normal">Turning on Location lets you explore what's around you.</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="switch m-t-5 m-l-10">
                                                                    <input type="checkbox" id="switch-config-3">
                                                                    <label for="switch-config-3"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item p-h-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-icon avatar-purple">
                                                                    <i class="anticon anticon-mail"></i>
                                                                </div>
                                                                <div class="m-l-15">
                                                                    <h5 class="font-weight-semibold m-b-0">Email Notifications</h5>
                                                                    <p class="m-b-0 font-weight-normal">Receive daily email notifications.</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="switch m-t-5 m-l-10">
                                                                    <input type="checkbox" id="switch-config-4" checked>
                                                                    <label for="switch-config-4"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item p-h-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-icon avatar-red">
                                                                    <i class="anticon anticon-question"></i>
                                                                </div>
                                                                <div class="m-l-15">
                                                                    <h5 class="font-weight-semibold m-b-0">Unknow Source</h5>
                                                                    <p class="m-b-0 font-weight-normal">Allow all downloads from unknow source.</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="switch m-t-5 m-l-10">
                                                                    <input type="checkbox" id="switch-config-5">
                                                                    <label for="switch-config-5"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item p-h-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-icon avatar-green">
                                                                    <i class="anticon anticon-swap"></i>
                                                                </div>
                                                                <div class="m-l-15">
                                                                    <h5 class="font-weight-semibold m-b-0">Data Synchronization</h5>
                                                                    <p class="m-b-0 font-weight-normal">Allow data synchronize with cloud server.</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="switch m-t-5 m-l-10">
                                                                    <input type="checkbox" id="switch-config-6" checked>
                                                                    <label for="switch-config-6"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item p-h-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-icon avatar-orange">
                                                                    <i class="anticon anticon-usergroup-add"></i>
                                                                </div>
                                                                <div class="m-l-15">
                                                                    <h5 class="font-weight-semibold m-b-0">Groups Invitation</h5>
                                                                    <p class="m-b-0 font-weight-normal">Allow any groups invitation</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="switch m-t-5 m-l-10">
                                                                    <input type="checkbox" id="switch-config-7" checked>
                                                                    <label for="switch-config-7"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

@endsection
