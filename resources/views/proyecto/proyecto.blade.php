@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Proyecto</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <span class="breadcrumb-item active">Proyectos</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                           
                                
                            <h4>Proyecto</h4>
                            <a href="{{url('proyectos/create')}}"><button class="btn btn-warning">Nuevo Proyecto</button></a>
                            <div class="m-t-25">
                             


                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Proyecto</th>
                                            <th>Capa</th>
                                            <th>Editar Proyecto</th>
                                            <th>Eliminar Proyecto</th>


                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pro as $p)
                                        
                                        
                                    
                                       



                                        <tr>
                                            <td>{{$p->idProyecto}}</td>
                                            

                                            <td>{{$p->nomb_proy}}</td>

                                            <td>{{$p->layer}}</td>


                                            <td><a class="btn btn-warning" href="{{url('proyectos/'.$p->idProyecto.'/edit')}}"
                                                title="Modificar"><i class="anticon anticon-edit"></i></a></td>

                                            <form action="{{route('proyectos.delete', $p->idProyecto)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td><button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-btn btn-warning" style="color:white"
                                                title="Eliminar" onclick="
                                                return confirm('Estas seguro de borrar este proyecto?')"><i class="anticon anticon-delete"></i></button></td>
                                            </form>

                                           

                                     

                                        </tr>
                                        @endforeach
                                       
                                        
                                    
                                    

                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Proyecto</th>
                                            <th>Capa</th>
                                            <th>Editar Proyecto</th>
                                            <th>Eliminar Proyecto</th>


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