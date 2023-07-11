@extends('admin.admin')

@section('title', 'Créer un utilisateur')


@section('content')

<div class="container-fluid plr_30 body_white_bg pt_30">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_box mb_30">
                <div class="row justify-content-center ">
                    <div class="col-lg-6">

                        <div class="modal-content cs_modal">
                            <div class="modal-header">
                                <h5 class="modal-title">@yield('title')</h5>
                            </div>
                            <div class="modal-body">
                                @if (Session::has('fail'))
                                <div class="alert alert-danger " >{{ Session::get('fail') }}</div>
                            @endif
                                <form action="{{route('admin.user.store')}}" method="POST" class="gap-2 v-stack">  
                                    @csrf
                                    @method('post')
                                    <div class>
                                       @include('shared.input',['label'=>'Nom','placeholder'=>'Entrer le nom','name'=>'nom','type'=>'text','value'=> old('nom') ])
                                    </div>
                                  
                                    <div class>

                                        @include('shared.input',['label'=>'Prénom','placeholder'=>'Entrer le prénom','name'=>'prenom','type'=>'text','value'=>old('prenom')])
                                    </div>
                                    <div class>
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="{{old('email')}} "
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Entrer l' mail">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class>
                                        @include('shared.input',['label'=>'Date de naissance','name'=>'dateNaissance','type'=>'date','value'=>old('dateNaissance')])
                                    </div>
                                    <div class>
                                        @include('shared.input',['label'=>'Ville de naissance','placeholder'=>'Entrer la ville de naissance','name'=>'villeNaissance','type'=>'text','value'=>old('villeNaissance')])
                                    </div>
                                    <div class>
                                        <label for="service">Service</label>
                                        <select name="service_id" id="service" class="form-select">
                                            @foreach ($services as $service)
                                                <option value="{{ $service->idSer }}">{{ $service->nomSer }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>   @enderror
                                                                       </div>
                                    <div class="mt-2">
                                        @include('shared.input',['label'=>'Mot de passe','name'=>'motdepasse','type'=>'password'])                                    </div>
                                        
                                    <div class>
                                        @include('shared.input',['label'=>'Confirmer le mot de passe','name'=>'cpwd','type'=>'password'])                                    </div>
                                   
                                  
                                    
                                    
                                    <button class="btn_1 full_width text-center"> Valider</a>
                                   
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
