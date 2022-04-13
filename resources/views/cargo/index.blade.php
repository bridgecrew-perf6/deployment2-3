@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')

                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Cargo</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <span class="breadcrumb-item active">Cargo</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                              
                            <h4>Cargos</h4>
                            <a href="{{url('cargos/create')}}"><button class="btn btn-success btn-tone m-r-5">Nuevo Cargo</button></a>
                            <div class="m-t-25">
                             


                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Cargo</th>
                                            <th>Editar Cargo</th>
                                            <th>Eliminar Cargo</th>

                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($c as $ca)
                                        
                                        
                                    
                                       



                                        <tr>
                                            <td>{{$ca->idCargo}}</td>
                                            

                                            <td>{{$ca->nomb_cargo}}</td>

                                            <td><a class="btn btn-success btn-tone m-r-5" href="{{url('cargos/'.$ca->idCargo.'/edit')}}"
                                                title="Modificar"><i class="anticon anticon-edit"></i></a></td>

                                            <form action="{{route('cargos.delete', $ca->idCargo)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td><button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-success btn-tone m-r-5" style="color:green"
                                                title="Eliminar" onclick="
                                                return confirm('Estas seguro de borrar este cargo?')"><i class="anticon anticon-delete"></i></button></td>
                                            </form>

                                           

                                     

                                        </tr>
                                        @endforeach
                                       
                                        
                                    
                                    

                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Cargo</th>
                                            <th>Editar Cargo</th>
                                            <th>Eliminar Cargo</th>
                                        </tr>
                                    </tfoot>
                                </table>
                              
                            </div>
                            <div class="">
                                <pre><code class=""></code></pre>
                            </div>
                            <div class="">
                                <pre><code class=""><script type="text/plain">
   
</script></code></pre>
                            </div>
                            <div class="code-example">
                                <pre><code class=""><script type="text/plain">$('#data-table').DataTable();</script></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                @endsection