@extends('template.plantillab')
@section('p')
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                                            <i class="anticon anticon-idcard"></i>
                                        </div>
                                        <div class="m-l-15">
                                            @foreach ($Desp as $desp)
                                            <h2 class="m-b-0">{{$desp->count_row}}</h2>
                                            <p class="m-b-0 text-muted">Cantidad de despliegues</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                            <i class="anticon anticon-coffee"></i>                                        </div>
                                        <div class="m-l-15">
                                            @foreach ($Desa as $desa)
                                            <h2 class="m-b-0">{{$desa->count_row}}</h2>
                                            <p class="m-b-0 text-muted"> Numero de Desarrolladores</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-read"></i>                                        </div>
                                        <div class="m-l-15">
                                            @foreach ($Pro as $pro)
                                            <h2 class="m-b-0">{{$pro->count_row}}</h2>
                                            <p class="m-b-0 text-muted">Numero de proyectos</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                                            <i class="anticon anticon-usb"></i>                                        </div>
                                        <div class="m-l-15">
                                            @foreach ($Serv as $serv)
                                            <h2 class="m-b-0">{{$serv->count_row}}</h2>
                                            <p class="m-b-0 text-muted">Cantidad de servidores</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                            <i class="anticon anticon-thunderbolt"></i>                                     </div>
                                        <div class="m-l-15">
                                            @foreach ($Devo as $devo)
                                            <h2 class="m-b-0">{{$devo->count_row}}</h2>
                                            <p class="m-b-0 text-muted"> Numero Devops</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                            <i class="anticon anticon-line-chart"></i>
                                        </div>
                                        <div class="m-l-15">
                                            @foreach ($Rama as $rama)
                                            <h2 class="m-b-0">{{$rama->count_row}}</h2>
                                            <p class="m-b-0 text-muted"> Numero de Ramas</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" >
                     <div class="carousel-item active">
            <img src="{{asset('assets/images/logo/mit.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/images/logo/f4.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/images/logo/f3.png')}}" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

                                </div>
                            </div></div></div></div>


       
                        
                                    
                   
                                        
                <!-- Content Wrapper END -->

                <!-- Footer START -->
               @endsection