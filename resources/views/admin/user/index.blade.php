@extends('admin.admin')

@section('title', 'Utilisateurs')

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <div class="white_box QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Liste des utilisateurs </h4>
                        <div class="box_right d-flex lms_block">
                            <a class="btn_1 mb-2 btn-lg email-gradient gradient-9-hover email__btn waves-effect"
                                href="{{ route('admin.user.create') }}"><i class="icon-pencil"></i>Ajout</a>
                        </div>
                    </div>
                    <div class="QA_table ">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Département</th>
                                    <th scope="col">Service</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($users as $user)
                                @php
                                $nomSer = DB::table('users')
                                    ->join('services', 'services.idSer', '=', 'users.service_id')
                                    ->where('users.id', $user->id)
                                    ->select('services.nomSer')
                                    ->first();
                                    $nomDep = DB::table('departments')
                                    ->join('services', 'services.department_id', '=', 'departments.idDep')
                                    ->join('users','users.service_id','=','services.idSer')
                                    ->where('users.id', $user->id)
                                    ->select('departments.nomDep')
                                    ->first();  
                            @endphp
                                    <tr>


                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="flex-grow-1 ms-3">
                                                    <p>{{ $user->id }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ $user->nom }}</p>
                                        </td>
                                        <td>
                                            {{$user->prenom}}
                                        </td>
                                        <td>
                                            {{$nomDep->nomDep}}
                                        </td>
                                        <td>
                                            {{$nomSer->nomSer}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $users->links() }}
    @endsection
