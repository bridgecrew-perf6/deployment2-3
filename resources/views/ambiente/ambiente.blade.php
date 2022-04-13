@extends('template.plantillab')
@section('p')
@include('sweetalert::alert')


                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Ambientes</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
                                <span class="breadcrumb-item active">Ambientes</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if (session("mensaje"))
                            <div class="notification-toast top-right" id="notification-toast" data-delay="3000">
                                <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="alert alert-success m-b-0">
                                        <button type="button" class="ml-2 close" data-dismiss="toast"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="d-flex justify-content-start">
                                        <span class="alert-icon m-r-20 font-size-30">
                                            <i class="anticon anticon-check-circle text-success"></i>
                                        </span>
                                            <div class="m-t-10">
                                                <p>{{ session("mensaje") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif
                                
                            <h4>Ambientes</h4>
                            <a href="{{url('ambientes/create')}}"><button class="btn btn-success">Nuevo Ambiente</button></a>
                            <div class="m-t-25">
                             


                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Ambiente</th>
                                            <th>Editar Ambiente</th>
                                            <th>Eliminar Ambiente</th>

                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($amb as $a)
                                        
                                        
                                    
                                       



                                        <tr>
                                            <td>{{$a->idAmbiente}}</td>
                                            

                                            <td>{{$a->nomb_amb}}</td>

                                            <td><a class="btn btn-success" href="{{url('ambientes/'.$a->idAmbiente.'/edit')}}"
                                                title="Modificar"><i class="anticon anticon-edit"></i></a></td>

                                            <form action="{{route('ambientes.delete', $a->idAmbiente)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td><button type="submit" style="background-color:transparent; border-color:transparent"><a class="btn btn-btn btn-success" style="color:white"
                                                title="Eliminar" onclick="
                                                return confirm('Estas seguro de borrar este ambiente?')"><i class="anticon anticon-delete"></i></button></td>
                                            </form>

                                           

                                     

                                        </tr>
                                        @endforeach
                                       
                                        
                                    
                                    

                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Ambiente</th>
                                            <th>Editar Ambiente</th>
                                            <th>Eliminar Ambiente</th>

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