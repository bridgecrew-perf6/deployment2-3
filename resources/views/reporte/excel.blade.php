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
            <h2>Nuevo Reporte Excel</h2>
            <br>
            
            
            <form action="{{route('excel.informe')}}" method="POST">
                @csrf



                <div class="form-row">
                    
                    <!-- Input A -->
                    

                    <div class="form-group col-md-6">
                        <label for="ei"><sup class="obligatorio"></sup>Fecha inicio</label>
                        <input type="date" class="form-control" name="ei" id="ei"
                               placeholder="" value="{{old('ei')}}">
                        <strong class="text-danger">{{$errors->first('ei')}}</strong>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="ef"><sup class="obligatorio"></sup>Fecha Fin</label>
                        <input type="date" class="form-control" name="ef" id="ef"
                               placeholder="" value="{{old('ef')}}">
                        <strong class="text-danger">{{$errors->first('ef')}}</strong>
                    </div>
                    <div class="m-t-25">
                             


                      
                                
                               
                               
                                
                            
                               

                            
                            

                    </div>

                    <!-- Input D -->



                </div>
                
                <a target="_blank" ><input type="submit" style="margin-left: 350px; width: 220px;" class="btn btn-enviar" value="Generar Excel" onlick="searchDate"></a>
                             
            </form>

        </div>
    </div>
</div>






@endsection