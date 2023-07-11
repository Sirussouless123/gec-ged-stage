<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    public function index()
    {
          
          return view('admin.user.index',['users'=>User::paginate(4)]);
    }

    public function create()
    {
      return view('admin.user.form',['user'=>new User,'services'=>Service::all()]);
    }

   
    public function store(SignupRequest $request)
    {
        
        $data =  $request->validated();

        if ($data['motdepasse'] == $data['cpwd']) {
            $create = User::create([
                'nom'=>$data['nom'],
                'prenom'=>$data['prenom'],
                'email'=>$data['email'],
                'motdepasse'=>Hash::make($data['motdepasse']),
                'dateNaissance'=>$data['dateNaissance'],
                'villeNaissance'=>$data['villeNaissance'],
                'cree_a'=>now('Africa/Casablanca'),
                'service_id'=>$data['service_id'],
            ]);
            if ($create->exists){
     return to_route('admin.user.index');
            }
        }else{
            return back()->with('fail','Les mots de passe ne correspondent pas ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
