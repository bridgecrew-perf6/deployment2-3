<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servidor;
use App\Http\Requests\ServidorStoreRequest;
use App\Http\Requests\ServidorEditarRequest;
use Alert;


class ServidorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function index(){
        $serv = Servidor::all();

   return view('servidor.servidor')->with('serv',$serv);
}
public function create(){

    return view('servidor.nuevoServidor');

}
public function store(ServidorStoreRequest $request){

    $serv = new Servidor();
    $serv->numb_serv = $request->input('s');
    $serv->save();
    Alert::success('Proceso realizado!', 'Servidor creado Correctamente.');
    return redirect('servidores');

}

public function edit($id){
    $serv = Servidor::find($id);
    return view ('servidor.editarServidor')->with('servidor', $serv);
}
public function update(ServidorEditarRequest $request , $id){
    $serv = Servidor::find($id);
    $serv->numb_serv = $request->input('s');
    $serv->save();
    Alert::success('Proceso realizado!', 'Servidor editado Correctamente.');
    return redirect('servidores');

}
public function destroy($id){
    $serv = Servidor::find($id);
    $serv->delete();
    Alert::error('Proceso realizado!', 'Servidor eliminado Correctamente.');
    return redirect('servidores');
}
}
