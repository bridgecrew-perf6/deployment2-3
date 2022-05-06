@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')

                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Capa</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <span class="breadcrumb-item active">Capas</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                              
                            <h4>Capa</h4>
                            <a href="{{url('capas/create')}}"><button class="btn btn-info">Nueva Capa</button></a>
                            <div class="m-t-25">
                             


                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Capa</th>
                                            <th>Editar Capa</th>
                                            <th>Eliminar Capa</th>

                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($capa as $c)
                                        
                                        
                                    
                                       



                                        <tr>
                                            <td>{{$c->idLayer}}</td>
                                            

                                            <td>{{$c->layer}}</td>

                                            <td><a class="btn btn-info" href="{{url('capas/'.$c->idLayer.'/edit')}}"
                                                title="Modificar"><i class="anticon anticon-edit"></i></a></td>

                                            <form action="{{route('capas.delete', $c->idLayer)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td><button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-btn btn-info" style="color:white"
                                                title="Eliminar" onclick="
                                                return confirm('Estas seguro de borrar esta capa?')"><i class="anticon anticon-delete"></i></button></td>
                                            </form>

                                           

                                     

                                        </tr>
                                        @endforeach
                                       
                                        
                                    
                                    

                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Capa</th>
                                            <th>Editar Capa</th>
                                            <th>Eliminar Capa</th>

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