<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/development.svg')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid">
            <div class="d-flex full-height p-v-20 flex-column justify-content-between">
                <div class="d-none d-md-flex p-h-40">
                    <img src="{{asset('assets/images/logo/logo.png')}}" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 d-none d-md-block">
                            <img class="img-fluid" src="{{asset('assets/images/logo/mlox.png')}}" alt="">
                        </div>
                        <div class="m-l-auto col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="m-t-20">Registro</h2>
                                    <p class="m-b-30">Introduce tus credenciales para acceder</p>
                                    <form action="{{route('register.store')}}" method="post" enctype="multipart/form-data" id="form">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6 ">
                                                <label for="name">Nombre y apellido</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombres">
                                                <div class="valid-feedback">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone">Telefono</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefono">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Correo electronico</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Correo">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirmar Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="city">Ciudad</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="type">Tipo</label>
                                                <select id="type" name="type" class="form-control">
                                                    <option value="Devops" selected>Devops</option>
                                                    <option value="Desarrollador">Desarrollador</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-16">                                            
                                            <div class="custom-file col-md-16 col-md-offset-2">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="customFile"  placeholder="foto">Foto de perfil</label>
                                            </div>
                                                                                 
                                                 <div class="checkbox" style="padding:16px">
                                                <input id="acepto" type="checkbox" required>
                                                <label for="acepto">Acepto el tratamiento de datos</label>
                                                 </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="margin-left:150px">Registrarse</button>
                                    </form>
                                </div>
                            </div>
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
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


    <!-- page js -->
    <script>
        $(document).ready(function () {
            $.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // Letra minuscula
       && /[a-z]/.test(value) // Letra mayuscula
       && /\d/.test(value) // digitos no sin sentido
       && /[=!\-@._*]/.test(value) // Caracter especial
});
        $('#form').validate({
            errorElement: 'div', 
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            rules: {
                name: {
                    required: true,
                    maxlength: 20,
                    letterswithbasicpunc: true

                },
                phone: {
                    required: true,
                    digits: true,
                    maxlength: 15,
                    minlength: 10
                    
                },
                email: {
                    required: true,
                    remote:{
                    url:"validate",
                    type:"get"
                },
                    email: true,
                },
               
                password: {
                    required: true,
                    pwcheck:true

                    
                },
                password_confirmation: {
                    required: true,
                    equalTo: '#password'
                },
                city: {
                    required: true,                    
                },
                image: {
                    required: true,
                    extension: "jpg|png"
                },
                type:{
                    required: true,
                }
            },
            messages: {
                name: {
                    required:"Campo obligatorio!",
                    maxlength: "Solo 20 Caracteres!",
                    letterswithbasicpunc: "Solo Letras!",
                    
                },
                phone:{
                    required:"Campo obligatorio!",
                    digits:"Solo numeros!",
                    maxlength: "Numero Invalido!",
                    minlength: "Numero Invalido!",
                },
                email: {
                    required:"Campo obligatorio!",
                    email: "Correo Invalido!",
                    remote: "Correo ya existente!",
                },
                password: {
                    required:"Campo obligatorio!",
                    pwcheck:"Password Invalida! (Una minuscula, una mayuscula y un caracter especial)",
                },
                password_confirmation: {
                    required:"Campo obligatorio!",
                    equalTo: "No hay coincidencias!"
                },
                city: {
                    required:"Campo obligatorio!",
                },
                image: {
                    required:"Campo obligatorio!",
                    extension: "Solo formato PNG/JPEG"
                },
                type: {
                    required:"Campo obligatorio!",
                },
            },
        });
    });
    </script>
    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>