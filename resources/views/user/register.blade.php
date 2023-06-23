@extends('layouts.app')

@section('title','Inscription')
@section('links')
<link rel="stylesheet" href="{{asset('assets/css/Insription.css')}}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection

@section('content')
<header class="head">Inscription</header>

<form action="{{route('register')}}" method="post">
    @csrf
    <div class="form first">
        <div class="details personal">
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class="fields">
                <div class="input-field">
                    <label for="">Nom</label>
                    <input type="text" placeholder=" Entrez votre nom" value="{{old('nom')}}" name="nom">
                    <span class="text-danger">@error('nom') {{$message}} @enderror</span>
                </div>
                <div class="input-field">
                    <label for="">Prénom</label>
                    <input type="text" placeholder=" Entrez votre prénom" value="{{old('prenom')}}" name="prenom">
                    <span class="text-danger">@error('prenom') {{$message}} @enderror</span>
                </div>
                <div class="input-field">
                    <label for="">Email</label>
                    <input type="email" placeholder=" Entrez votre email" value="{{old('email')}}" name="email">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="input-field">
                    <label for="">Mot de passe</label>
                    <input type="password" placeholder=" Entrez votre mot de passe" value="{{old('motdepasse')}}" name="motdepasse">
                    <span class="text-danger">@error('motdepasse') {{$message}} @enderror</span>
                </div>
                <div class="input-field">
                    <label for="">Mot de passe</label>
                    <input type="password" placeholder=" Confirmez votre mot de passe" value="{{old('motdepasse')}}" name="cpwd">
                    <span class="text-danger">@error('cpwd') {{$message}} @enderror</span>
                </div>
                <div class="input-field">
                    <label for="">Date de naissance</label>
                    <input type="date" name="dateNaissance" id="" placeholder="Entrez votre date de naissance" value="{{old('dateNaissance')}}" >
                    <span class="text-danger">@error('dateNaissance') {{$message}} @enderror</span>
                </div>
                <input type="hidden" name="cree_a" value="datetime">
                <div class="input-field">
                    <label for="">Ville de naissance</label>
                    <input type="text" placeholder=" Entrez votre ville de naissance" value="{{old('villeNaissance')}}" name="villeNaissance">
                    <span class="text-danger">@error('villeNaissance') {{$message}} @enderror</span>
                 </div>
                <div class="input-field">
                    <label for="service">Service</label>
                     <select name="service_id" id="service">
                           @foreach ($services as $service)
                                    <option value="{{ $service->idSer}}">{{ $service->nomSer}}</option>
                           @endforeach
                     </select>
                    <span class="text-danger">@error('service_id') {{$message}} @enderror</span>
                 </div>
            </div>
            <button class="inscription" type="submit">
                <span class="btnText">Valider</span>
            </button>
        </div>
    </div>
</form>
</div>

@endsection
