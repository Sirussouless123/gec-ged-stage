@extends('admin.admin')

@section('title', $service->exists ? 'Modifier un département' : 'Créer un département')


@section('content')
        
          <h1 class="my-3">@yield('title')</h1>

        
          <form action="{{ route($service->exists ? 'admin.service.update' : 'admin.service.store',['service'=>$service] )}}" method="post" class="v-stack gap-2">
            @method($service->exists ? 'put' : 'post')
            @csrf
            @include('shared.input', ['type'=>'text','label'=>'Nom du service', 'name'=>'nomSer','value'=>$service->nomSer])
            @include('shared.select',[ 'label'=>'Département', 'name'=>'department_id', 'options'=>$departments])
            <div class="mt-3"> 
                <button class="btn btn-success">
                        @if ($service->exists)
                            Modifier
                        @else 
                            Créer
                         @endif
             
                </button>
             
                </div>
          </form>
@endsection