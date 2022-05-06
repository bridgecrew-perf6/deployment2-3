<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desarrollador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DesaStoreRequest;
use App\Http\Requests\DesaEditarRequest;
use Alert;





class DesarrolladorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function index(){
        $desa = Desarrollador::all();
        return view('desarrollador.desarrollador')->with('desa',$desa);
    }
    public function create(){
        return view("desarrollador.nuevoDesarrollador");
    }
    public function store(DesaStoreRequest $request){
         $desa = new Desarrollador();
         $desa->nomb_desa = $request->input('nd');
         $desa->save();
         Alert::success('Proceso realizado!', 'Desarrollador creado Correctamente.');
         return redirect('desarrolladores');

    }
    public function edit($id){
        $desa = Desarrollador::find($id);
        return view('desarrollador.editarDesarrollador')->with('desarrollador', $desa);
    }
    public function update(DesaEditarRequest $request, $id){
        $desa = Desarrollador::find($id);
        $desa->nomb_desa = $request->input('nd');
        $desa->save();
        Alert::success('Proceso realizado!', 'Desarrollador actualizado Correctamente.');
        return redirect('desarrolladores');

    }

    public function destroy($id){

        $desarrollador = Desarrollador::find($id);
        $desarrollador->delete();
        Alert::error('Proceso realizado!', 'Desarollador eliminado Correctamente.');
        return redirect('desarrolladores');
    }
    
}
