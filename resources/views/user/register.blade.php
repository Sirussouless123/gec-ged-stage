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

<form action="#" method="post">
    <div class="form first">
        <div class="details personal">
            <span class="title">Informations Personnelles</span>

            <div class="fields">
                <div class="input-field">
                    <label for="">Nom</label>
                    <input type="text" placeholder=" Entrez votre nom">
                </div>
                <div class="input-field">
                    <label for="">Prénom</label>
                    <input type="text" placeholder=" Entrez votre prénom">
                </div>
                <div class="input-field">
                    <label for="">Email</label>
                    <input type="mail" placeholder=" Entrez votre email">
                </div>
                <div class="input-field">
                    <label for="">Mot de passe</label>
                    <input type="password" placeholder=" Entrez votre mot de passe">
                </div>
                <div class="input-field">
                    <label for="">Mot de passe</label>
                    <input type="password" placeholder=" Confirmez votre mot de passe">
                </div>
                <div class="input-field">
                    <label for="">Date de naissance</label>
                    <input type="date" name="date" id="" placeholder="Entrez votre date de naissance">
                </div>
                <div class="input-field">
                    <label for="">Ville de naissance</label>
                    <input type="text" placeholder=" Entrez votre ville de naissance">
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