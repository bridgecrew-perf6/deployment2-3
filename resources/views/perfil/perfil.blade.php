@extends('template.plantillab')
@section('p')

<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Perfil</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a  href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                <span class="breadcrumb-item active">Perfil</span>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="d-md-flex align-items-center">
                            <div class="text-center text-sm-left ">
                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                    <img src="storage/{{auth()->user()->image}}" alt="">
                                </div>
                            </div>
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h2 class="m-b-5">{{auth()->user()->name}}</h2>
                                <p class="text-dark m-b-20">{{auth()->user()->type}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <ul class="list-unstyled m-t-10">
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                            <span>Email: </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{auth()->user()->email}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                            <span>Telefono</span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{auth()->user()->phone}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Ciudad</span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{auth()->user()->city}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5>Despliegues</h5>
                        <div class="m-t-20">
                            <div class="m-b-20 p-b-20 border-bottom">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/coffee-app-thumb.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Coffee Finder App</a>
                                        </h5>
                                    </div>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                <div class="d-inline-block">
                                    <a class="m-r-5" data-toggle="tooltip" title="Eugene Jordan" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Pamela" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="float-right">
                                    <span class="badge badge-pill badge-blue font-size-12 p-h-10">In Progress</span>
                                </div>
                            </div>
                            <div class="m-b-20 p-b-20 border-bottom">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/weather-app-thumb.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Weather App</a>
                                        </h5>
                                    </div>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                <div class="d-inline-block">
                                    <a class="m-r-5" data-toggle="tooltip" title="Lillian Stone" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Victor Terry" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Wilma Young" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="float-right">
                                    <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>
                                </div>
                            </div>
                            <div class="m-b-20 p-b-20 border-bottom">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/music-app-thumb.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Music App</a>
                                        </h5>
                                    </div>
                                </div>
                                <p>Protein, iron, and calcium are some of the nutritional benefits associated with cheeseburgers.</p>
                                <div class="d-inline-block">
                                    <a class="m-r-5" data-toggle="tooltip" title="Darryl Day" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Virgil Gonzales" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="float-right">
                                    <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Conectados</h5>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Erin Gonzales</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">UI/UX Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Darryl Day</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">Software Engineer</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Marshall Nichols</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">Product Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Riley Newman</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">Data Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->





@endsection