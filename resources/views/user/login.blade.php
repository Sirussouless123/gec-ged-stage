@extends('layouts.app')

@section('title','Connexion')

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/Connexion.css')}}">
@endsection

@section('content')
<div class="container">
   
    <header class="head">Connexion</header>

    <form class="connexion" action="#">
        <div class="form first">
            <div class="details personal">

                <div class="fields">
                    <div class="input-field">
                        <label for="">Email</label>
                        <input type="mail" placeholder=" Entrez votre email">
                    </div>
                    <div class="input-field">
                        <label for="">Mot de passe</label>
                        <input type="password" placeholder=" Entrez votre mot de passe">
                    </div>
                </div>
                <button class="inscription">
                    <span class="btnText">Valider</span>
                </button>
            </div>
        </div>
    </form>
</div>

@endsection