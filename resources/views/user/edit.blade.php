@extends('layouts.app')

@section('title','Profil')
@section('links')
<link rel="stylesheet" href="{{asset('assets/css/Insription.css')}}">

@endsection

@section('content')
<div class="center-form">
    <div class="container-ins">
        <header class="head">Modification de profil</header>
        <form action="{{route('user.user.update',['user'=>$user])}}" method="post">
            @csrf
            @method('put')
            <div class="form first">
                <div class="details personal">
                    @if(Session::has('fail'))
                    <div class="alert alert-danger" style="background: #dc354691;">{{Session::get('fail')}}</div>
                    @endif
                    <div class="fields">
                        <div class="input-field">
                            <label for="nom">Nom</label>
                            <input type="text" placeholder=" Entrez votre nom" value="{{old('nom') ? old('nom') : $user->nom }}" name="nom">
                            <span style="color: #dc354691;">@error('nom') {{$message}} @enderror</span>
                        </div>
                        <div class="input-field">
                            <label for="prenom">Prénom</label>
                            <input type="text" placeholder=" Entrez votre prénom" value="{{old('prenom') ? old('prenom') : $user->prenom }}" name="prenom">
                            <span style="color: #dc354691;">@error('prenom') {{$message}} @enderror</span>
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email"  value="{{ $user->email }}" @readonly(true) name="email">
                            <span style="color: #dc354691;">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="input-field">
                            <label for="motdepasse">Mot de passe</label>
                            <input type="password" placeholder=" Entrez votre mot de passe" value="{{old('motdepasse') }}" name="motdepasse">
                            <span style="color: #dc354691;">@error('motdepasse') {{$message}} @enderror</span>
                        </div>
                        <div class="input-field">
                            <label for="cpwd">Confirmer le mot de passe</label>
                            <input type="password" placeholder=" Confirmez votre mot de passe" value="{{old('cpwd') }}" name="cpwd">
                            <span style="color: #dc354691;">@error('cpwd') {{$message}} @enderror</span>
                        </div>
                        <div class="input-field">
                            <label for="">Date de naissance</label>
                            <input type="date" name="dateNaissance" id="" placeholder="Entrez votre date de naissance" value="{{old('dateNaissance') ? old('dateNaissance') : $user->dateNaissance }}" >
                            <span style="color: #dc354691;">@error('dateNaissance') {{$message}} @enderror</span>
                        </div>
                        <input type="hidden" name="cree_a" value="datetime">
                        <div class="input-field">
                            <label for="villeNaissance">Ville de naissance</label>
                            <input type="text" placeholder=" Entrez votre ville de naissance" value="{{old('villeNaissance') ? old('villeNaissance') : $user->villeNaissance }}" name="villeNaissance">
                            <span style="color: #dc354691;">@error('villeNaissance') {{$message}} @enderror</span>
                         </div>
                        <div class="input-field">
                            <label for="service">Service</label>
                             <select name="service_id" id="service">
                                   @foreach ($services as $service)
                                            <option value="{{ $service->idSer}}">{{ $service->nomSer}}</option>
                                   @endforeach
                             </select>
                            <span style="color: #dc354691;">@error('service_id') {{$message}} @enderror</span>
                         </div>
                    </div>
                    <button class="inscription" type="submit">
                        <span class="btnText">Valider</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
