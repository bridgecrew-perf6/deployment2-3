<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capa;
use App\Http\Requests\CapaStoreRequest;
use Alert;

class CapaController extends Controller
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
        $capa = Capa::all();
        return view('capa.index')->with('capa', $capa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('capa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CapaStoreRequest $request)
    {
        $capa = new Capa();
        $capa->layer = $request->input('c');
        $capa->save();
        Alert::success('Proceso realizado!', 'Capa creada Correctamente.');
        return redirect('capas');
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
        $capa = Capa::find($id);
        return view ('capa.edit')->with('capa', $capa);
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
        $capa = Capa::find($id);
        $capa->layer = $request->input('c');
        $capa->save();
        Alert::success('Proceso realizado!', 'Capa editada Correctamente.');
        return redirect('capas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capa = Capa::find($id);
        $capa->delete();
        Alert::error('Proceso realizado!', 'Capa eliminada Correctamente.');
        return redirect('capas');
    }
}
