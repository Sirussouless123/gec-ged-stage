@extends('layouts.app')

@section('title','Accueil')
@section('links')

<link rel="stylesheet" href="{{ asset('assets/css/Accueil.css')}}" />
@endsection

@section('content')
<div class="head">
    <h1>Bienvenue chez nous</h1>
    <img src="{{ asset('assets/img/Online document-rafiki.svg')}}" class="img" />
    <img src="{{ asset('assets/img/Envelope-amico.svg')}}" class="img" />
  </div>
@endsection