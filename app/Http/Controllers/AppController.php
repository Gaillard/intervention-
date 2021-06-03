<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AppController extends Controller{
    public function init(){
        $user = Auth::user();
        return response()->json(['user'=>$user],200);
    }
    
    public function login(Request $request){
        if(Auth::attempt(['CIN'=> $request->CIN,'code'=>$request->code],true))
        {
            return response()->json(Auth::user(),200);
           
        }
        else{
            return response()->json(['error'=>'impossible de se connecter'],401);
        }
    }

    public function register(Request $request){
        $user = User::where('nom',$request->username)->first();

        if(isset($user->CIN)){
            return response()->json(['error'=>'le CIN existe deja'],401);
        }

        $user=new User();
        $user->CIN=$request->CIN;
        $user->nom=$request->nom;
        $user->prEnom=$request->prEnom;
        $user->genre=$request->genre;
        $user->add=$request->add;
        $user->dat_Naiss=$request->dat_Naiss;
        $user->Lieu_Naiss=$request->lieu_Naiss;
        $user->email=$request->email;
        $user->code=bcrypt($request->code);
        $user->save();

        Auth::login($user);
        
    }

    public function logout(){
        Auth::logout();
    }
}

?>