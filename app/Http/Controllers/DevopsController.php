<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devops;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DevoStoreRequest;
use App\Http\Requests\DevoEditarRequest;
use Alert;


class DevopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function index() {
        
        $devo = Devops::all();
        return view('devops.devops')->with('devo',$devo);

    }

    public function create(){
        return view('devops.nuevoDevops');
    }

    public function store(DevoStoreRequest $request){

        $devo = new Devops();
        $devo->nomb_devo = $request->input('dv'); 
        $devo->save();
        Alert::success('Felicidades!', 'Devops creado Correctamente.');
        return redirect('devops');

    }
    public function edit($id){
        $devo = Devops::find($id);
        return view ('devops.editarDevops')->with('devops',$devo);
    }
    public function update(DevoEditarRequest $request , $id){
        $devo = Devops::find($id);
        $devo->nomb_devo = $request->input('dv');
        $devo->save();
        Alert::success('Felicidades!', 'Devops actualizado Correctamente.');
        return redirect('devops');

    }
    public function destroy($id){
        $devops = Devops::find($id);
        $devops->delete();
        Alert::error('Felicidades!', 'Devops eliminado Correctamente.');
        return redirect('devops');
    }

}
