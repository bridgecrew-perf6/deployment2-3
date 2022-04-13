
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/development.svg">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="http://cdn.syncfusion.com/js/assets/external/jsrender.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>




</head>
<body>
   
    </script>
    
    <div class="app">
        <div class="container-fluid">
            <div class="d-flex full-height p-v-15 flex-column justify-content-between">
                <div class="d-none d-md-flex p-h-40">
                    <img src="assets/images/logo/logo.png" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h2 class="m-t-20">Iniciar Sesion</h2>
                                    <p class="m-b-30">Introduzca sus credenciales</p>
                                    @if (session("message"))
                                    <div class="alert alert-success">
                                        <div class="d-flex justify-content-center">
                                            <h3>{{session("message")}}</h3>
                                        </div>
                                    </div>
                                    @endif
                                    <form action="{{url('login')}}" method="POST" id="form" name="form">
                                        @csrf
                                        @if (session("mensaje"))
                    <h5 style="color: rgb(80, 62, 62)">{{ session("mensaje") }}</h5>
                @endif

                                        <div class="form-group ">
                                            <label class="font-weight-semibold  col-form-label control-label" for="Email">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email')}}">
                                            </div>        
                                            <div class="valid-feedback">
                                            </div>                                  
                                            <br>


                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold col-form-label control-label" for="password">Password:</label>
                                            <a class="float-right font-size-13 text-muted" href="">Olvidaste la contraseña?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="password" value="{{ old('password')}}">
                                            </div>
                                            <br>


                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    No tienes una cuenta? 
                                                    <a class="small" href="{{url('register')}}"> Registrate</a>
                                                </span>
                                                <button type="submit"class="btn btn-primary">Iniciar sesion</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-6 d-none d-md-block">
                            <img class="img-fluid" src="assets/images/logo/mchelo.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex  p-h-40 justify-content-between">
                    <span class="">© 2022 Montechelo</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacidad</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>




    <script src="assets/js/vendors.min.js"></script>

    <!-- Core Vendors JS -->

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        
        $(document).ready(function () {
        $('#form').validate({
            errorElement: 'div', 
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            rules: {
                email: {
                    required: true,
                    email: true,
                },              
                password: {
                    required: true,
                },
            },
            messages: {
               
                email: {
                    required:"",
                    email: "",
                },
                password: {
                    required:"",
                },
            },
        });
    });
    </script>
   

</body>

</html>