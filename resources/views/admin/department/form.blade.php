@extends('admin.admin')

@section('title', $department->exists ? 'Modifier un département' : 'Créer un département')


@section('content')
        
          <h1 class="my-3">@yield('title')</h1>

        
          <form action="{{ route($department->exists ? 'admin.department.update' : 'admin.department.store',['department'=>$department] )}}" method="post" class="v-stack gap-2">
            @method($department->exists ? 'put' : 'post')
            @csrf
            @include('shared.input', ['type'=>'text','label'=>'Nom', 'name'=>'nomDep','value'=>$department->nomDep])
            <div class="mt-3"> 
                <button class="btn btn-success">
                        @if ($department->exists)
                            Modifier
                        @else 
                            Créer
                         @endif
             
                </button>
             
                </div>
          </form>
@endsection