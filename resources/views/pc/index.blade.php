@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Equipos</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <span class="breadcrumb-item active">Equipos</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                           
                                
                            <h4>Equipos</h4>
                            <a href="{{url('pc/create')}}"><button class="btn btn-default">Nuevo Proyecto</button></a>
                            <div class="m-t-25">
                             


                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre del equipo</th>
                                            <th>Editar Equipo</th>
                                            <th>Eliminar Equipo</th>


                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pc as $p)
                                        
                                        
                                    
                                       



                                        <tr>
                                            <td>{{$p->idEquipo}}</td>
                                            

                                            <td>{{$p->nomb_equipo}}</td>



                                            <td><a class="btn btn-default" href="{{url('pc/'.$p->idEquipo.'/edit')}}"
                                                title="Modificar"><i class="anticon anticon-edit"></i></a></td>

                                            <form action="{{route('pc.delete', $p->idEquipo)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td><button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-btn btn-default" style="color:black"
                                                title="Eliminar" onclick="
                                                return confirm('Estas seguro de borrar este equipo?')"><i class="anticon anticon-delete"></i></button></td>
                                            </form>

                                           

                                     

                                        </tr>
                                        @endforeach
                                       
                                        
                                    
                                    

                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre del equipo</th>
                                            <th>Editar Equipo</th>
                                            <th>Eliminar Equipo</th>



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