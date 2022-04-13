<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function mostrarperfil(){
        return view('perfil.perfil');
    }  
}
