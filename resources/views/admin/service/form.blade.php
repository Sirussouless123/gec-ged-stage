{{-- @extends('admin.admin')

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
@endsection --}}

@extends('admin.admin')

@section('title', $service->exists ? 'Modifier un service' : 'Créer un service')


@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title">@yield('title')</h5>
                                </div>
                                <div class="modal-body">
                                    <form
                                        action="{{ route($service->exists ? 'admin.service.update' : 'admin.service.store',['service'=>$service] )}}" method="post"  class="gap-2 v-stack">
                                        @method($service->exists ? 'put' : 'post')
            @csrf
          
                                        <div class>
                                            @include('shared.input', ['type'=>'text','label'=>'Nom du service', 'name'=>'nomSer','value'=>$service->nomSer])
                                            @include('shared.select',[ 'label'=>'Département', 'name'=>'department_id', 'options'=>$departments])
                                                <button class="btn btn-success mt-3">
                                                        @if ($service->exists)
                                                            Modifier
                                                        @else 
                                                            Créer
                                                         @endif
                                                </button>                                       
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
