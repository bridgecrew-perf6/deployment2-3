<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DespExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $inicio;
    private $final;

    public function __construct($inicio,$final) 
    {
        $this->inicio = $inicio; 
        $this->final = $final; 

    }

    public function collection()
    {
       
        return DB::table('Despliegue')
        ->select(
            'Despliegue.fecha',
            'Rama.nomb_rama',
            'Proyecto.nomb_proy',
            'Layer.layer',
            'Desarollador.nomb_desa',
            'Devops.nomb_devo',
           'Ambiente.nomb_amb',
           'Servidor.numb_serv'
        )
        ->join('Ambiente','Despliegue.FK_AMB','=','Ambiente.idAmbiente')
        ->join('Desarollador','Despliegue.FK_DESA','=','Desarollador.idDesarollador')
        ->join('Devops','Despliegue.FK_DEVO','=','Devops.idDevops')
        ->join('Layer','Despliegue.FK_LAYE','=','Layer.idLayer')
        ->join('Proyecto','Despliegue.FK_PRO','=','Proyecto.idProyecto')
        ->join('Rama','Despliegue.FK_RAMA','=','Rama.idRama')
        ->join('Servidor','Despliegue.FK_SERV','=','Servidor.idServidor')
        ->wherebetween('Despliegue.fecha',[$this->inicio,$this->final])
        ->get();
 
    }
    public function headings(): array
    {
        return[
            'Fecha',
            'Rama',
            'Proyecto',
            'Capa',
            'Desarollador',
            'Devops',
            'Ambiente',
            'Servidor'

        ];

    }
}
