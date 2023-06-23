<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;

class AuthentificationController extends Controller
{
    public function show(){
        $services = Service::all();
        return view('user.register',[
            'services'=>$services,
        ]);
    }

    public function showLogin(){
        return view('user.login');
    }

    public function registerUser(SignupRequest $request){
       
       $data = $request->validated();
      
       if ($data['motdepasse'] === $data['cpwd']){
        $data['motdepasse'] = Hash::make( $data['motdepasse'] );
                  $user = User::create([
                    'nom'=>$data['nom'],
                    'prenom'=>$data['prenom'], 
                    'email'=>$data['email'],
                    'motdepasse'=>$data['motdepasse'],
                    'dateNaissance'=>$data['dateNaissance'],
                    'villeNaissance'=>$data['villeNaissance'],
                    'cree_a'=>$data['cree_a'],
                    'service_id'=>$data['service_id'],
                  ]);
                  if($user->exists()){
                      return to_route('login')->with('success','Vous êtes inscrit. Connectez-vous');
                  };
       }else{
          return to_route('register')->with('fail','Les mots de passe ne correspondent pas');
       }
    }

    public function loginUser(loginRequest $request){
        
        $user = User::where('email', '=', $request->email)->first();
        if($user->exists()){
            if(Hash::check($request->motdepasse,$user->motdepasse)) {
                  
                session(
                    [
                        'loginId', $user->id,
                        'status'=> 'islogin',
                        'statut'=>$user->statut
                    ]
                );
                
                
            }else {
                return back()->with('fail', "Ce mot de passe n'est pas valide");
            }
        }else {
            return back()->with('fail', "Identifiants erronés");
        }
    }
}
