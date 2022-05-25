<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\Despliegue;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\UserVerify;
use App\Models\User;
use Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;





class RegistroController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){


        $user = User::create($request->all());
        $token = Str::random(64);

        
        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);
        Mail::send('email.emailVerificationEmail',['token'=>$token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Email verification mail');
        });

        if($request->hasFile('image')){
         $file = $request->file('image');
         $nombre = time()."_".$file->getClientOriginalName();
         Storage::disk('public')->put($nombre, File::get($file));
         $user->image= $nombre;

        }

        $user->save();
        return redirect('/')->with('mensaje', 'Usuario registrado correctamente');
    }
    public function validateuseremail(Request $request)
   {
    $user = User::where('email', $request->email)->first('email');
       if($user){
         $return =  false;
        } 
        else{
         $return= true;
        }
        echo json_encode($return);
        exit;
   }
   public function verifyAccount($token)
{
    $verifyUser = UserVerify::where('token', $token)->first();
    $message = 'Sorry your email cannot be identified.';
    if(!is_null($verifyUser) ){
    $user = $verifyUser->user;
        if(!$user->is_email_verified) {
$verifyUser->user->is_email_verified = 1;
$verifyUser->user->save();
$message = "Your e-mail is verified. You can now login.";
} else {
$message = "Your e-mail is already verified. You can now login.";
}
}
return redirect()->route('/')->with('message', $message);
}
}

   


