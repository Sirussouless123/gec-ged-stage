<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\ProfilRequest;

class ProfilController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $services = Service::all();
        return view('user.register', ['user' => $user, 'services' => $services]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, ProfilRequest $request)
    {
        $data =  $request->validated();

        if ($data['motdepasse'] == $data['cpwd']) {
            $update = $user->update([
                'nom'=>$data['nom'],
                'prenom'=>$data['prenom'],
                'email'=>$data['email'],
                'motdepasse'=>Hash::make($data['motdepasse']),
                'dateNaissance'=>$data['dateNaissance'],
                'villeNaissance'=>$data['villeNaissance'],
                'cree_a'=>now(),
                'service_id'=>$data['service_id'],
            ]);
          
            if ($update == true){
     return to_route('user.document.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
