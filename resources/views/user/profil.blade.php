@extends('layouts.app')

@section('title', 'Profil')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/user/css/boxicons-2.1.4/boxicons-2.1.4/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Insription.css') }}">


@endsection

@section('content')
    <div class="center-form">
        {{-- <div class="container-ins">
                    <form action="" method="post" class="v-stack gap-2">
                        @csrf
                        <div class="form first">
                            <div class="details personal">
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger" style="background: #dc354691;">
                                        {{ Session::get('fail') }}</div>
                                @endif
                                <div class="fields">
                                    <div class="input-field">
                                        <label for="nom">Nom</label>
                                        <input type="text" placeholder=" Entrez votre nom"
                                            value="{{ old('nom') ? old('nom') : $user->nom }}" name="nom">
                                        <span style="color: #dc354691;">
                                            @error('nom')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" placeholder=" Entrez votre prénom"
                                            value="{{ old('prenom') ? old('prenom') : $user->prenom }}" name="prenom">
                                        <span style="color: #dc354691;">
                                            @error('prenom')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder=" Entrez votre email"
                                            value="{{ old('email') ? old('email') : $user->email }}" name="email">
                                        <span style="color: #dc354691;">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <label for="motdepasse">Mot de passe</label>
                                        <input type="password" placeholder=" Entrez votre mot de passe"
                                            value="{{ old('motdepasse') }}" name="motdepasse">
                                        <span style="color: #dc354691;">
                                            @error('motdepasse')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <label for="cpwd">Confirmer le mot de passe</label>
                                        <input type="password" placeholder=" Confirmez votre mot de passe"
                                            value="{{ old('cpwd') }}" name="cpwd">
                                        <span style="color: #dc354691;">
                                            @error('cpwd')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <label for="">Date de naissance</label>
                                        <input type="date" name="dateNaissance" id=""
                                            placeholder="Entrez votre date de naissance"
                                            value="{{ old('dateNaissance') ? old('dateNaissance') : $user->dateNaissance }}">
                                        <span style="color: #dc354691;">
                                            @error('dateNaissance')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <input type="hidden" name="cree_a" value="datetime">
                                    <div class="input-field">
                                        <label for="villeNaissance">Ville de naissance</label>
                                        <input type="text" placeholder=" Entrez votre ville de naissance"
                                            value="{{ old('villeNaissance') ? old('villeNaissance') : $user->villeNaissance }}"
                                            name="villeNaissance">
                                        <span style="color: #dc354691;">
                                            @error('villeNaissance')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <label for="service">Service</label>
                                        <select name="service_id" id="service">
                                            @foreach ($services as $service)
                                                <option value="{{ $service->idSer }}">{{ $service->nomSer }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color: #dc354691;">
                                            @error('service_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                    </form>
                


            </div> --}}

        <div class="container d-flex justify-content-center">
            <div class="col-md-9 ">

                <div class="white_box ">
                    <div class="d-flex justify-content-between gap-2">
                        <div class="white_box_tittle list_header">
                            <h4>Informations de l'utilisateur</h4>
                        </div>
                        <div class="text-end">
                            <a href="{{route('user.user.edit',['user'=>$user->id])}}" class="btn_1 mb-2 btn-lg email-gradient gradient-9-hover email__btn waves-effect" style="cursor: pointer;"> Modification</a>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table " border="0">

                            <tbody>
                                <tr>

                                    <th class="row">Nom :</th>
                                    <td>{{ $user->nom }}</td>

                                </tr>
                                <tr>

                                    <th class="row">Prénom :</th>
                                    <td>{{ $user->prenom }}</td>

                                </tr>
                                <tr>

                                    <th class="row">Email(unique) :</th>
                                    <td>{{ $user->email }}</td>

                                </tr>
                                <tr>

                                    <th class="row">Date de naissance :</th>
                                    <td>{{ $user->dateNaissance }}</td>

                                </tr>
                                <tr>

                                    <th class="row">Ville de naissance :</th>
                                    <td>{{ $user->villeNaissance }}</td>

                                </tr>
                                <tr>
                                    @php
                                        $nomSer = DB::table('users')
                                            ->join('services', 'services.idSer', '=', 'users.service_id')
                                            ->where('users.id', session('loginId'))
                                            ->select('services.nomSer')
                                            ->first();
                                            $nomDep = DB::table('departments')
                                            ->join('services', 'services.department_id', '=', 'departments.idDep')
                                            ->join('users','users.service_id','=','services.idSer')
                                            ->where('users.id',session('loginId'))
                                            ->select('departments.nomDep')
                                            ->first();
                                          
                                    @endphp
                                    <th class="row">Service :</th>
                                    <td>{{ $nomSer->nomSer }}</td>
                                </tr>
                                <tr>
                                    <th class="row">Département :</th >
                                    <td>{{$nomDep->nomDep}}</td>  
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
