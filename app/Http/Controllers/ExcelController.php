<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DespExport;


class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }

    public function index(){

        return view('reporte.excel');

    }




    public function DespExport(Request $request)
    {       

        $inicio = $request->ei;
        $final = $request->ef;
    
        return Excel::download(new DespExport($inicio, $final), 'despliegues.xlsx');
    
    }
}
