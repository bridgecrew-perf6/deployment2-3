@extends('template.plantillab')
@section('p')

<div class="main-content">

    <div class="card" style="max-width: 800px">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img class="img-fluid" src="{{asset('assets/images/logo/nube.png')}}" alt="">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 ml-auto mr-auto">
                            <div class="m-t-30">
                                <h4>Observación</h4>
                                @foreach ($ob as $o)
                                {{$o->observacion}}
                                @endforeach
                                <div class="m-t-25">
                                    <a href="{{url()->previous()}}" class="btn btn-default">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection