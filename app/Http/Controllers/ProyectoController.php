<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProStoreRequest;
use App\Http\Requests\ProEditarRequest;
use Alert;



class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function index(){
        $pro = Proyecto::all();

        $pro = DB::table('Layer')
       ->join('Proyecto','Proyecto.FK_FB','=','Layer.idLayer')
       ->select('Proyecto.*','Layer.*')
       ->get();
        return view('proyecto.proyecto')->with('pro',$pro);
    }
    public function create(){

        $pro = DB::table('Layer')
       ->select('layer','idLayer')
       ->get();

        return view('proyecto.nuevoProyecto')->with('pro',$pro);
    }

    public function store(ProStoreRequest $request){

        $pro = new Proyecto();
        $pro->nomb_proy = $request->input('p');
        $pro->FK_FB = $request->input('s');
        $pro->save();
        Alert::success('Felicidades!', 'Proyecto creado Correctamente.');
        return redirect('proyectos');
  }

    public function edit($id){

        $pr = DB::table('Layer')
       ->select('Layer.*')
       ->get();        
        $pro = Proyecto::find($id);
        return view ('proyecto.editarProyecto')
        ->with('proyecto', $pro)
        ->with('pr', $pr);

    }

    public function update(ProEditarRequest $request, $id){
        $pro = Proyecto::find($id);
        $pro->nomb_proy = $request->input('p');
        $pro->FK_FB = $request->input('s');
        $pro->save();
        Alert::success('Felicidades!', 'Proyecto editado Correctamente.');
        return redirect('proyectos');
    }

    public function destroy($id){
        $pro = Proyecto::find($id);
        $pro->delete();
        Alert::error('Felicidades!', 'Proyecto eliminado Correctamente.');
        return redirect('proyectos');

    }
}
