<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verify_email']);
        $this->middleware('example');

    }
    public function index()
   { 
    $user = User::all();

    $Amb = DB::table('Ambiente')
    ->select(DB::raw("COUNT(*) as count_row"))
    ->get();
    
    $Desa = DB::table('Desarollador')
    ->select(DB::raw("COUNT(*) as count_row"))
    ->get();

    $Devo = DB::table('Devops')
    ->select(DB::raw("COUNT(*) as count_row"))
    ->get();

    $Lay = DB::table('Layer')
    ->select(DB::raw("COUNT(*) as count_row"))
    ->get();

    $Pro = DB::table('Proyecto')
    ->select(DB::raw("COUNT(*) as count_row"))

    ->get();

    $Rama = DB::table('Rama')
    ->select(DB::raw("COUNT(*) as count_row"))
    ->get();

    $Serv = DB::table('Servidor')
    ->select(DB::raw("COUNT(*) as count_row"))
    ->get();

    $Desp= DB::table('Despliegue')
    ->select(DB::raw("COUNT(*) as count_row"))
    ->get();
    

    if(Auth::check()){
    return view('index.inicio')
    ->with('Desp',$Desp)
        ->with('Desa',$Desa)
        ->with('Devo',$Devo)
        ->with('Lay',$Lay)
        ->with('Pro',$Pro)
        ->with('Rama',$Rama)
        ->with('Serv',$Serv)
        ->with('Amb',$Amb)
        ->with('user', $user);
}

    return redirect('login.index')->WithSuccess('No Tienes acceso!');

}
}

