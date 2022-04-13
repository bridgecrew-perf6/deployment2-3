@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Servidor</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <span class="breadcrumb-item active">Servidores</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                                
                            <h4>Servidores</h4>
                            <a href="{{url('servidores/create')}}"><button class="btn btn-success btn-tone m-r-5"">Nuevo Servidor</button></a>
                            <div class="m-t-25">
                             


                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Servidor</th>
                                            <th>Editar Servidor</th>
                                            <th>Eliminar Servidor</th>

                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($serv as $s)
                                        
                                        
                                    
                                       



                                        <tr>
                                            <td>{{$s->idServidor}}</td>
                                            

                                            <td>{{$s->numb_serv}}</td>

                                            <td><a class="btn btn-success btn-tone m-r-5"" href="{{url('servidores/'.$s->idServidor.'/edit')}}"
                                                title="Modificar"><i class="anticon anticon-edit" style="color:black"></i></a></td>

                                            <form action="{{route('servidores.delete', $s->idServidor)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td><button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-success btn-tone m-r-5"" style="color:rgb(19, 17, 17)"
                                                title="Eliminar" onclick="
                                                return confirm('Estas seguro de borrar este servidor?')"><i class="anticon anticon-delete" style="color:black"></i></button></td>
                                            </form>

                                           

                                     

                                        </tr>
                                        @endforeach
                                       
                                        
                                    
                                    

                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Servidor</th>
                                            <th>Editar Servidor</th>
                                            <th>Eliminar Servidor</th>


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

          @endsection