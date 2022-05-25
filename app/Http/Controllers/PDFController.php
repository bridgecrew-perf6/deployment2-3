<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crabbly\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;
use App\Models\Despliegue;
use App\Models\Fechas;
use App\Http\Requests\FechStoreRequest;
use PDF;



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

    public function informe(FechStoreRequest $request){

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
        $pdf->Image('../public/assets/images/logo/mlox.png', 20, 15, 50, 18,'PNG');
        $pdf->SetFont('Arial','B',9);
        $pdf->setXY(325, 9);
        $pdf->Cell(45,9,date('d/m/Y'),0);
        $pdf->setXY(327, 15);
        $pdf->Cell(45,9,date('H:i:s'),0);


        $pdf->SetFont('Arial','B',15);
        $pdf->setTextColor(73, 73, 73);
        $pdf->setXY(75, 35);
        $pdf->Cell(205, 10, 'Listado de despliegues', '', 0, 'C');


        $pdf->setXY(25, 48);
        $pdf->setFont('Arial', 'B', 9);
        $pdf->setFillColor(178, 178, 178);
        $pdf->cell(0.1, 7, '', 'TBR', 0, 'C');
        $pdf->cell(42, 7, 'Hora y fecha', 'TBR', 0, 'C');


        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(35, 7, 'Rama', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(35, 7, 'Proyecto', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(35, 7, 'Layer', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(40, 7, 'Desarrollador', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(40.5, 7, 'Devops', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(40.5, 7, 'Ambiente', 'TBR', 0, 'C');

        $pdf->setFont('Arial', 'B', 9);
        $pdf->cell(42, 7, 'Servidor', 'TBR', 0, 'C');

        $pdf->setXY(5, 55);

        foreach($Desa as $desa){
            $pdf->setX(25);
            $pdf->cell(0.1, 10, '', 'TBR', 0, 'C');
            $pdf->cell(42,10,$desa->fecha,'TBR',0,'L');
            $pdf->cell(35,10,$desa->nomb_rama,'TBR','L');
            $pdf->Cell(0.5,5);
            $pdf->cell(34.5,10,$desa->nomb_proy,'TBR','L');
            $pdf->Cell(0.5,48);
            $pdf->cell(34.5,10,$desa->layer,'TBR','L');
            $pdf->Cell(0.5,48);
            $pdf->cell(39.5,10,$desa->nomb_desa,'TBR','L');
            $pdf->Cell(0.5,48);
            $pdf->cell(40,10,$desa->nomb_devo,'TBR','L');
            $pdf->Cell(0.5,48);
            $pdf->cell(40,10,$desa->nomb_amb,'TBR',0,'L');
            $pdf->Cell(0.5,48);
            $pdf->cell(41.5,10,$desa->numb_serv,'TBR',1,'L');














        }

        return response($pdf->OutPut('S'), 200)
                ->header('Content-Type', 'application/pdf');
    }

    public function acta(Request $request, $id){
        $usua= DB::table('Inventario')->where('idUsuario','=',$id)
        ->select(
            'usuario_inventario.nomb_usua',
            'usuario_inventario.cedula',
            'usuario_inventario.idUsuario',
            'cargo.nomb_cargo',
            'Inventario.idUsuaActivo',
            'Inventario.serial',
            'Inventario.placa',
            'equipo.nomb_equipo',
            'Inventario.FK_U',
            'Inventario.acta'

        )
        ->join('usuario_inventario','Inventario.FK_U', '=', 'usuario_inventario.idUsuario')
        ->join('cargo','usuario_inventario.FK_CARGO', '=', 'cargo.idCargo')
        ->join('equipo','Inventario.FK_EQUI', '=', 'equipo.idEquipo')
        ->get();

        return $pdf = \PDF::loadView('pdf.acta',compact('usua'))->stream('acta.pdf');

    }

    public function paz(Request $request, $id){
        $usua = DB::table('Inventario')->where('idUsuario','=',$id)
        ->select(
            'usuario_inventario.nomb_usua',
            'usuario_inventario.cedula',
            'usuario_inventario.idUsuario',
            'cargo.nomb_cargo',
            'Inventario.idUsuaActivo',
            'Inventario.serial',
            'Inventario.placa',
            'equipo.nomb_equipo',
            'Inventario.FK_U',
            'Inventario.acta'

        )
        ->join('usuario_inventario','Inventario.FK_U', '=', 'usuario_inventario.idUsuario')
        ->join('cargo','usuario_inventario.FK_CARGO', '=', 'cargo.idCargo')
        ->join('equipo','Inventario.FK_EQUI', '=', 'equipo.idEquipo')
        ->get();
        return $pdf = \PDF::loadView('pdf.paz',compact('usua'))->stream('Paz y salvo.pdf');

    }
}
