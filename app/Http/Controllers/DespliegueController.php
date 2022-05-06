<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Despliegue;
use App\Models\Ambiente;
use App\Models\Desarrollador;
use App\Models\Devops;
use App\Models\Layer;
use App\Models\Proyecto;
use App\Models\Rama;
use App\Models\Servidor;
use App\Events\UserEvent;
use Alert;




use Illuminate\Support\Facades\DB;
use App\Http\Requests\DespStoreRequest;
use App\Notifications\UserNotification;
use App\Http\Requests\DespEditarRequest;


class DespliegueController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
   public function index()
   {           

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
          'Despliegue.idDesp'
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

       return view("despliegue.despliegue")
       ->with('Desa',$Desa);
       

   }

   public function create()
   {

    $Desp = DB::table('Ambiente')
       ->select('nomb_amb','idAmbiente')
       ->get();
       
       $Desa = DB::table('Desarollador')
       ->select('nomb_desa','idDesarollador')
       ->get();

       $Devo = DB::table('Devops')
       ->select('nomb_devo','idDevops')
       ->get();

       $Lay = DB::table('Layer')
       ->select('layer','idLayer')
       ->get();

       $Pro = DB::table('Proyecto')
       ->select('nomb_proy','idProyecto')
       ->get();

       $Rama = DB::table('Rama')
       ->select('nomb_rama','idRama')
       ->get();

       $Serv = DB::table('Servidor')
       ->select('numb_serv','idServidor')
       ->get();
       

        return view('despliegue.nuevoDespliegue')->with('Desp',$Desp)
        ->with('Desa',$Desa)
        ->with('Devo',$Devo)
        ->with('Lay',$Lay)
        ->with('Pro',$Pro)
        ->with('Rama',$Rama)
        ->with('Serv',$Serv);
   }

   public function store(DespStoreRequest $request){
       

   


    $d = new Despliegue();
    $d->FK_AMB = $request->input('a');
    $d->FK_DESA = $request->input('d');
    $d->FK_DEVO = $request->input('dv');
    $d->FK_LAYE = $request->input('l');
    $d->FK_PRO = $request->input('p');
    $d->FK_RAMA = $request->input('r');
    $d->FK_SERV = $request->input('s');
    $d->id_usua = $request->user()->id;

   

   $d->save();
   
    Alert::success('Proceso realizado!', 'Despliegue registrado Correctamente.');
    
   /* User::all()
   ->except($d->id_usua)
   ->each(function(User $user)use ($d){
      $user->notify(new UserNotification($d));
   });
*/
   event(new UserEvent($d));
    return redirect('despliegues');
   }
   public function edit($id){
      $Desp = DB::table('Ambiente')
       ->select('nomb_amb','idAmbiente')
       ->get();

       $D = DB::table('Despliegue')
       ->select('idDesp','FK_AMB')
       ->get();
       
       $Desa = DB::table('Desarollador')
       ->select('nomb_desa','idDesarollador')
       ->get();

       $Devo = DB::table('Devops')
       ->select('nomb_devo','idDevops')
       ->get();

       $Lay = DB::table('Layer')
       ->select('layer','idLayer')
       ->get();

       $Pro = DB::table('Proyecto')
       ->select('nomb_proy','idProyecto')
       ->get();

       $Rama = DB::table('Rama')
       ->select('nomb_rama','idRama')
       ->get();

       $Serv = DB::table('Servidor')
       ->select('numb_serv','idServidor')
       ->get();
       
      $d = Despliegue::find($id);
      return view ('despliegue.editarDespliegue')->with('despliegues',$d)
      ->with('Desp',$Desp)
      ->with('Desa',$Desa)
        ->with('Devo',$Devo)
        ->with('Lay',$Lay)
        ->with('Pro',$Pro)
        ->with('Rama',$Rama)
        ->with('Serv',$Serv);

   }

   public function update(DespEditarRequest $request, $id){
      $despliegues = Despliegue::find($id);
      $despliegues->FK_AMB = $request->input('a');
      $despliegues->FK_DESA = $request->input('d');
      $despliegues->FK_DEVO = $request->input('dv');
      $despliegues->FK_LAYE = $request->input('l');
      $despliegues->FK_PRO = $request->input('p');
      $despliegues->FK_RAMA = $request->input('r');
      $despliegues->FK_SERV = $request->input('s');
      $despliegues->save();
      Alert::success('Proceso realizado!', 'Despliegue actualizado Correctamente.');
      return redirect('despliegues');
   }

   public function destroy($id){
      $despliegues = Despliegue::find($id);
      $despliegues->delete();
      Alert::error('Proceso realizado!', 'Despliegue eliminado Correctamente.');
      return redirect('despliegues');
  }
  public function nd(){
     $dn = auth()->user()->unreadnotifications;
     return view('despliegue.notification',compact('dn'));
  }


}
