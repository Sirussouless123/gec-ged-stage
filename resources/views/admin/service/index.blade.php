{{-- @extends('admin.admin')

@section('title','Services')

@section('content')

<div class="d-flex justify-content-between align-items-center mt-5 ">
    <h1 class="text-center">@yield('title')</h1>

    <a href="{{ route('admin.service.create') }} " class="btn btn-success">Ajouter un service</a>

</div>

<div class="row d-flex mt-5 ">

      <table class="table-striped  ">

        <thead>
            <tr>

                <th>N°</th>
                <th>Nom du service</th>
                <th>Nom du département</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($services as $service)
                  <tr >
                    <td>{{ $service->idSer }}</td>
                    <td>{{ $service->nomSer }}</td>
                    <td>{{ $service->nom }}</td>
                    <div class="d-flex gap-2 justify-content-end w-100"> 
                        <td>
                            <a href="{{ route('admin.service.edit', ['service'=>$service->idSer])}}" class="btn btn-warning">Modifier</a>
                        </td>
                        

                        <td>
                            <form action="{{ route('admin.service.destroy',['service'=>$service->idSer]) }}" method="post">
                                @csrf
                               @method('delete')
                               <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </div>
                  </tr>
           @endforeach
        </tbody>
      </table>
      <div class="mt-3">

          {{ $services->links() }}
      </div>
</div>

    
@endsection --}}


@extends('admin.admin')

@section('title','Services')

@section('content')
<div class="container-fluid plr_30 body_white_bg pt_30">
    <div class="row justify-content-center">
        
        <div class="col-lg-12">
            <div class="white_box QA_section">
                <div class="white_box_tittle list_header">
                    <h4>Liste des services </h4>
                    <div class="box_right d-flex lms_block">
                        <a class="btn_1 mb-2 btn-lg email-gradient gradient-9-hover email__btn waves-effect" href="{{route('admin.service.create')}}"><i
                            class="icon-pencil"></i>Ajout</a>
                    </div>
                </div>
                <div class="QA_table ">
@if (Session::has("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert" >
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
                    <table class="table lms_table_active">
                        <thead>
                            <tr>
                               
                                
                                <th scope="col">N°</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Nom du département</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                       
                                        <div class="flex-grow-1 ms-3">
                                            <p>{{$service->idSer}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{$service->nomSer}}</p>
                                </td>
                                <td>
                                    <p>{{$service->nom}}</p>
                                </td>
                                <td>
                                   <a href="{{route('admin.service.edit',['service'=>$service->idSer])}}" class="btn btn-dark text-white">Modifier</a>
                                </td>
                                <td>
                                   <form action="{{route('admin.service.destroy',['service'=>$service->idSer])}}" method="post">
                   @csrf
                   @method('delete')
                                    <button class="btn btn-danger"  onclick="return confirm('Voulez-vous vraiment supprimer ?')">
                                        Supprimer
                                    </button>
                                   </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$services->links()}}
@endsection
