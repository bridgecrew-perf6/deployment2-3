@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')

    

            <!-- Page Container START -->                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Despliegues</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <span class="breadcrumb-item active">Despliegues</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <h4>Despliegues</h4>
                            <a href="{{url('despliegues/create')}}"><button class="btn btn-primary">Nuevo Despliegue</button></a>
                            <div class="m-t-25">
                             


                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Hora y fecha</th>
                                            <th>Ambiente</th>
                                            <th>Desarrollador</th>
                                            <th>Devops</th>
                                            <th>Layer</th>
                                            <th>Proyecto</th>
                                            <th>Rama</th>
                                            <th>Servidor </th>
                                            <th>ED</th>


                                           


                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                       
                                       
                                        
                                    
                                       


                                        @foreach ($Desa as $desa)

                                        <tr>

                                            <td>{{$desa->fecha}}</td>
                                            

                                            <td>{{$desa->nomb_amb}}</td>

                                            <td>{{$desa->nomb_desa}}</td>

                                            <td>{{$desa->nomb_devo}}</td>

                                            <td>{{$desa->layer}}</td>

                                            <td>{{$desa->nomb_proy}}</td>
                                            
                                            <td>{{$desa->nomb_rama}}</td>

                                            <td>{{$desa->numb_serv}}</td>
                                            
                                            <td><a class="btn btn-xs btn-danger" href="{{url('despliegues/'.$desa->idDesp.'/edit')}}"
                                                title="Modificar"><i class="anticon anticon-edit"></i></a>
                                                

                                                <form action="{{route('despliegues.delete', $desa->idDesp)}}" method="POST">
                                
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-xs btn-danger" style="color:white;display:inline-block"
                                                    title="Eliminar" onclick="
                                                    return confirm('Estas seguro de borrar este despliegue?')"><i class="anticon anticon-delete"></i></button></td>
                                                </form>

                                     

                                        </tr>
                                        @endforeach

                                        
                                    
                                    

                                    <tfoot>
                                        <tr>
                                            <th>Hora y fecha</th>
                                            <th>Ambiente</th>
                                            <th>Desarrollador</th>
                                            <th>Devops</th>
                                            <th>Layer</th>
                                            <th>Proyecto</th>
                                            <th>Rama</th>
                                            <th>Servidor</th>
                                            <th>ED</th>


                                        </tr>
                                    </tfoot>
                                </table>
                              
                            </div>
                            <div class="">
                                <pre><code class=""></code></pre>
                            </div>
                            <div class="">
                                <pre><code class=""><script type="text/plain"><table id="data-table" class="table">
  </script></code></pre>
                            </div>
                            <div class="code-example">
                                <pre><code class=""><script type="text/plain">$('#data-table').DataTable();</script></code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                @endsection

                <!-- Content Wrapper END -->

                <!-- Footer START -->
               