@extends('admin.admin')

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

    
@endsection