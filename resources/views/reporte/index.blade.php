@extends('template.plantillab')
@section('p')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Reportes</h2></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <span class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</span>
                <span class="breadcrumb-item active">Reportes</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Nuevo Reporte PDF</h2>
            <br>
            
            
            <form action="{{route('pdf.informe')}}" method="POST">
                @csrf



                <div class="form-row">
                    
                    <!-- Input A -->
                    

                    <div class="form-group col-md-6">
                        <label for="di"><sup class="obligatorio"></sup>Fecha inicio</label>
                        <input type="date" class="form-control" name="di" id="di"
                               placeholder="" value="{{old('di')}}">
                        <strong class="text-danger">{{$errors->first('di')}}</strong>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="df"><sup class="obligatorio"></sup>Fecha Fin</label>
                        <input type="date" class="form-control" name="df" id="df"
                               placeholder="" value="{{old('df')}}">
                        <strong class="text-danger">{{$errors->first('df')}}</strong>
                    </div>
                    <div class="m-t-25">
                             


                      
                                
                               
                               
                                
                            
                               

                            
                            

                    </div>

                    <!-- Input D -->



                </div>
                
                <input type="submit" style="margin-left: 500px; width: 220px;" class="btn btn-enviar" value="Generar PDF" onlick="searchDate">
                             
            </form>

        </div>
    </div>
</div>



<!-- Search End-->

<!-- Quick View START -->


@endsection