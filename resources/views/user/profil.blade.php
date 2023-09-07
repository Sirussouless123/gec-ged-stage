@extends('layouts.app')

@section('title', 'Profil')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/user/css/boxicons-2.1.4/boxicons-2.1.4/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Insription.css') }}">


@endsection

@section('content')
    <div class="center-form " style="margin-top: 70px;">


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
