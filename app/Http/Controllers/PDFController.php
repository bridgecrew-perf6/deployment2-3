<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crabbly\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;
use App\Models\Despliegue;
use App\Models\Fechas;
use App\Http\Requests\FechStoreRequest;



class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function index(){

        $Desa = DB::table('Despliegue')
        ->select(
           'Ambiente.nomb_amb',
           'Desarollador.nomb_desa',
           'Devops.nomb_devo',
           'Layer.layer',
           'Proyecto.nomb_proy',
           'Rama.nomb_rama',
           'Servidor.numb_serv',
           'Despliegue.fecha',
           'Despliegue.IdDesp'
        )
        ->join('Ambiente','Despliegue.FK_AMB','=','Ambiente.idAmbiente')
        ->join('Desarollador','Despliegue.FK_DESA','=','Desarollador.idDesarollador')
        ->join('Devops','Despliegue.FK_DEVO','=','Devops.idDevops')
        ->join('Layer','Despliegue.FK_LAYE','=','Layer.idLayer')
        ->join('Proyecto','Despliegue.FK_PRO','=','Proyecto.idProyecto')
        ->join('Rama','Despliegue.FK_RAMA','=','Rama.idRama')
        ->join('Servidor','Despliegue.FK_SERV','=','Servidor.idServidor')
        ->distinct()
        ->get();



        return view('reporte.index')->with('Desa',$Desa);
     }

    public function informe(Request $request){
       
        $inicio=$request->di;
        $final=$request->df;




        $Desa = DB::table('Despliegue')
       ->select(
          'Ambiente.nomb_amb',
          'Desarollador.nomb_desa',
          'Devops.nomb_devo',
          'Layer.layer',
          'Proyecto.nomb_proy',
          'Rama.nomb_rama',
          'Servidor.numb_serv',
          'Despliegue.fecha',
          'Despliegue.IdDesp'
       )
       ->join('Ambiente','Despliegue.FK_AMB','=','Ambiente.idAmbiente')
       ->join('Desarollador','Despliegue.FK_DESA','=','Desarollador.idDesarollador')
       ->join('Devops','Despliegue.FK_DEVO','=','Devops.idDevops')
       ->join('Layer','Despliegue.FK_LAYE','=','Layer.idLayer')
       ->join('Proyecto','Despliegue.FK_PRO','=','Proyecto.idProyecto')
       ->join('Rama','Despliegue.FK_RAMA','=','Rama.idRama')
       ->join('Servidor','Despliegue.FK_SERV','=','Servidor.idServidor')
       ->wherebetween('Despliegue.fecha',[$inicio,$final])
       ->get();


        $pdf = app('Fpdf');
        $pdf->AddPage('l', 'Legal','mm','300','200');
        $pdf->Image('../public/assets/images/logo/mchelo.png', 20, 15, 50, 18,'PNG');
        $pdf->SetFont('Arial','B',9);
        $pdf->setXY(325, 9);
        $pdf->Cell(45,9,date('d/m/Y'),0);
        $pdf->setXY(327, 15);
        $pdf->Cell(45,9,date('H:i:s'),0);


        $pdf->SetFont('Arial','B',15);
        $pdf->setTextColor(73, 73, 73);
        $pdf->setXY(75, 35);
        $pdf->Cell(205, 10, 'Despliegue', '', 0, 'C');


        $pdf->setXY(5, 48);
        $pdf->setFont('Arial', 'B', 9);
        $pdf->setFillColor(178, 178, 178);
        $pdf->cell(40, 7, 'Hora y fecha', 'TBR', 0, 'C');


        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(45, 7, 'Ambiente', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(35, 7, 'Desarrollador', 'TBR', 0, 'C');
        
        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(35, 7, 'Devops', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(25, 7, 'Layer', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(40.5, 7, 'Proyecto', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(40.5, 7, 'Rama', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(40.5, 7, 'Servidor', 'TBR', 0, 'C');

        $pdf->setXY(5, 55);

        foreach($Desa as $desa){
            $pdf->setX(5);
            $pdf->cell(40,10,$desa->fecha,'TBR','C');
            $pdf->cell(45,10,$desa->nomb_amb,'TBR','C');
            $pdf->Cell(0.5,5);
            $pdf->cell(34.5,10,$desa->nomb_desa,'TBR','C');
            $pdf->Cell(0.5,48);
            $pdf->cell(34.5,10,$desa->nomb_devo,'TBR','L');
            $pdf->Cell(0.5,48);
            $pdf->cell(24.5,10,$desa->layer,'TBR','L');
            $pdf->Cell(0.5,48);
            $pdf->cell(40,10,$desa->nomb_proy,'TBR','L');
            $pdf->Cell(0.5,48);
            $pdf->cell(40,10,$desa->nomb_rama,'TBR',0,'L');
            $pdf->Cell(0.5,48);
            $pdf->cell(40,10,$desa->numb_serv,'TBR',1,'L');










           



        }

        return response($pdf->OutPut(), 200)
                ->header('Content-Type', 'application/pdf');
    }
}
