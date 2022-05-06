<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambiente;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AmbStoreRequest;
use App\Http\Requests\AmbEditarRequest;
use Alert;


class AmbienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }

    public function index(){

        $amb = Ambiente::all();

        return view("ambiente.ambiente")->with('amb', $amb);
    }

    public function create(){

        return view("ambiente.nuevoAmbiente");
    }
    public function store(AmbStoreRequest $request){


        $a = new Ambiente();
        $a->nomb_amb = $request->input('ambiente');
        $a->save();
        Alert::success('Proceso realizado!', 'Ambiente creado Correctamente.');

        return redirect('ambientes');
    }

    public function edit($id){

        $amb = Ambiente::find($id);

        return view('ambiente.editarAmbiente')->with('ambiente',$amb);
    }

        public function update(AmbEditarRequest $request, $id){

        $amb = Ambiente::find($id);

        $amb->nomb_amb = $request->input('ambiente');

        $amb->save();

        Alert::success('Proceso realizado!', 'Ambiente actualizado Correctamente.');

        return redirect('ambientes');



        }

        public function destroy(Ambiente $ambiente){

            $ambiente->delete();
            Alert::error('Proceso realizado!', 'Ambiente eliminado Correctamente.');
            return redirect('ambientes');
        }


}


    

