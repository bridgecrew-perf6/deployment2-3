<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipos;
use App\Http\Requests\EquipoStoreRequest;
use App\Http\Requests\EquipoEditarRequest;
use Alert;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function index()
    {
        $pc = Equipos::all();
        return view('pc.index')->with('pc', $pc);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipoStoreRequest $request)
    {
        $pc = new Equipos();
        $pc->nomb_equipo = $request->input('pc');
        $pc->save();
        Alert::success('Proceso realizado!', 'Equipo creado Correctamente.');
        return redirect('pc');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pc = Equipos::find($id);
        return view ('pc.edit')->with('pc',$pc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EquipoEditarRequest $request, $id)
    {
        $pc = Equipos::find($id);
        $pc->nomb_equipo = $request->input('pc');
        $pc->save();
        Alert::success('Proceso realizado!', 'Equipo actualizado Correctamente.');
        return redirect('pc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pc = Equipos::find($id);
        $pc->delete();
        Alert::error('Proceso realizado!', 'Equipo eliminado Correctamente.');
        return redirect('pc');
    }
}
