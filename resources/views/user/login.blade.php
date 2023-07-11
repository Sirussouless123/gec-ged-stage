{{-- @extends('layouts.app')

@section('title', 'Connexion')

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/Connexion.css')}}">
@endsection

@section('content')


    <header class="head">Connexion</header>

    <form class="connexion" action="{{route('login')}}" method="post">
        <div class="form first">
            <div class="details personal">
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
                @csrf
                <div class="fields">
                    <div class="input-field">
                        <label for="">Email</label>
                        <input type="mail" placeholder=" Entrez votre email" value="{{old('email')}}" name="email">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="input-field">
                        <label for="">Mot de passe</label>
                        <input type="password" placeholder=" Entrez votre mot de passe" name="motdepasse">
                        <span class="text-danger">@error('motdepasse') {{$message}} @enderror</span>
                    </div>
                </div>
                <button class="inscription">
                    <span class="btnText">Valider</span>
                </button>
            </div>
        </div>
    </form>


@endsection --}}

@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/Connexion.css') }}">
@endsection
@section('title', 'Connexion')

@section('content')
    <div class="center-form">
        <div class="container-log">
            <header class="head">Connexion</header>
            <form class="connexion" action="{{ route('login') }}" method="post">
                <div class="form first">
                    <div class="details personal">
                        @if (Session::has('success'))
                            <div style="background-color :#00ff00;" class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger " style="background: #dc354691;">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="fields">
                            <div class="input-field">
                                <label for="">Email</label>
                                <input type="mail" placeholder=" Entrez votre email" value="{{ old('email') }}"
                                    name="email">
                                <span  style="color: #dc354691;">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="input-field">
                                <label for="">Mot de passe</label>
                                <input type="password" placeholder=" Entrez votre mot de passe" name="motdepasse">
                                <span style="color: #dc354691;">
                                    @error('motdepasse')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <button class="inscription">
                            <span class="btnText">Valider</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

@endsection
