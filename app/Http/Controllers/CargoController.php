<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargos;
use App\Http\Requests\CargoStoreRequest;
use Alert;


class CargoController extends Controller
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
        $c = Cargos::all();
        return view('cargo.index')->with('c',$c);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoStoreRequest $request)
    {
        $ca = new Cargos();
        $ca->nomb_cargo = $request->input('c');
        $ca->save();
        Alert::success('Proceso realizado!', 'Cargo creado Correctamente.');
        return redirect('cargos');

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
        $ca = Cargos::find($id);
        return view ('cargo.edit')->with('ca',$ca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ca = Cargos::find($id);
        $ca->nomb_cargo = $request->input('c');
        $ca->save();
        Alert::success('Proceso realizado!', 'Cargos actualizados Correctamente.');
        return redirect('cargos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ca = Cargos::find($id);
        $ca->delete();
        Alert::error('Proceso realizado!', 'Cargo eliminado Correctamente.');
        return redirect('cargos');
    }
}
