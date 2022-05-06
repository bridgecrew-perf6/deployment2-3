<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UStoreRequest;
use Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('example');

    }
    public function mostrarperfil($id){
        $users = User::select("*")
        ->whereNotNull('last_seen')
        ->orderBy('last_seen', 'DESC')
        ->paginate(4);

        $desp = DB::table('Despliegue')->where('id','=',$id)
        ->select(
            'Despliegue.id_usua',
            'Despliegue.fecha',
            'Proyecto.nomb_proy'
          

        )
        ->join('users','Despliegue.id_usua', '=', 'users.id')
        ->join('Proyecto','Despliegue.FK_PRO', '=', 'Proyecto.idProyecto')
        ->orderBy('id_usua', 'DESC')
        ->paginate(4);

        return view('perfil.perfil', compact('users','desp'));
    }  
    public function editarperfil($id){
        $per = DB::table('users')
        ->select('id','type')
        ->get();
        return view('perfil.edit')->with('per',$per);
    }
    public function updateimg(Request $request, $id){
        $user = User::find($id);
        $user->name;
        $user->email;
        $user->type;
        $user->phone;
        $user->city;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $nombre = time()."_".$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, File::get($file));
            $user->image= $nombre;
   
           }
        $user->save();
        Alert::success('Proceso realizado!', 'Imagen actualizada Correctamente.');
        return redirect()->to('perfi/'.$id);
    }
    public function updateperfil(UserStoreRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->password = $request->input('password');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $nombre = time()."_".$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, File::get($file));
            $user->image= $nombre;
   
           }
           $user->save();
           Alert::success('Proceso realizado!', 'Perfil actualizado Correctamente.');
           return redirect()->to('perfi/'.$id);

    }
    public function passwordperfil(UStoreRequest $request, $id){
        $user = User::find($id);
        $user->name;
        $user->email;
        $user->type;
        $user->phone;
        $user->city;
        $user->password = $request->input('password');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $nombre = time()."_".$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, File::get($file));
            $user->image= $nombre;
   
           }
        $user->save();
        Alert::success('Proceso realizado!', 'Contraseña actualizada Correctamente.');
        return redirect()->to('perfi/'.$id);

    }


}
