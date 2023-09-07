<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\loginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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
                    'service_id'=>$data['service'],
                  ]);
                  if($user->exists()){
                      return to_route('login')->with('success','Vous êtes inscrit. Connectez-vous');
                  };
       }else{
          return to_route('register')->with('fail','Les mots de passe ne correspondent pas');
       }
    }

    public function loginUser(loginRequest $request){


    
        
        $data = $request->validated();
        $user = User::where('email', '=', $data['email'])->first();

        $verif = empty($user);

        if( $verif == false){
            if(Hash::check($data['motdepasse'],$user->motdepasse)) {  
               
                session(
                    [
                        'loginId'=>$user->id,
                        'status'=> 'isLogin',
                        'statut'=>$user->statut,
                    ]
                );
              if ($request->session()->has('statut') && session('statut') == 1){
             return to_route('admin.home');
              }else{
                
                return to_route('user.document.index');
              }
               
            }else {
                return back()->with('fail', "Mot de passe incorrect");
            }
        }else {
            return back()->with('fail', "Identifiants erronés");
        }
    }

    public function logout(Request $request){

        if(session('status')){
            $request->session()->forget(['status','loginId','statut']); 
            return to_route('login')->with('success','Vous êtes maintenant déconnecté');
        }else{
            return to_route('login')->with('fail','Veuillez vous connecter d\'abord');
        }     
    }
}
