@extends('admin.admin')

@section('title','Departements')

@section('content')

<div class="d-flex justify-content-between align-items-center mt-5 ">
    <h1 class="text-center">@yield('title')</h1>

    <a href="{{ route('admin.department.create') }} " class="btn btn-success">Ajouter un Département</a>

</div>

<div class="row d-flex mt-5 ">

      <table class="table-striped  ">

        <thead>
            <tr>

                <th>N°</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($departments as $department)
                  <tr >
                    <td>{{ $department->idDep }}</td>
                    <td>{{ $department->nomDep }}</td>
                    <div class="d-flex gap-2 justify-content-end w-100"> 
                        <td>
                            <a href="{{ route('admin.department.edit', ['department'=>$department])}}" class="btn btn-warning">Modifier</a>
                        </td>
                        

                        <td>
                            <form action="{{ route('admin.department.destroy',['department'=>$department]) }}" method="post">
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

          {{ $departments->links() }}
      </div>
</div>

    
@endsection