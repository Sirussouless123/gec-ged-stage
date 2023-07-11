@extends('layouts.app')

@section('title', $mail->exists ? 'Modifier un mail' : 'Créer un mail')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/Connexion.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection


@section('content')
<div class="center-form">
   <div class="container-log">
    <h1 class="my-3">@yield('title')</h1>
    <form action="{{ route($mail->exists ? 'user.mail.update' : 'user.mail.store', ['mail' => $mail]) }}" method="post"
        class="v-stack gap-2" enctype="multipart/form-data">
        @method($mail->exists ? 'put' : 'post')
        @csrf

        <div class="form first">
            <div class="details personal">
                @if (Session::has('fail'))
                    <div class="alert alert-danger" style="background: #dc354691;">{{ Session::get('fail') }}</div>
                @endif
                <div class="fields">
                    <div class="input-field">
                        <label for="nomMail">Nom </label>
                        <input type="text" placeholder="Nom du mail"
                            value="{{ old('nomMail') ? old('nomMail') : $mail->nomMail }}" name="nomMail">
                        <span class="text-danger" style="color: red;">
                            @error('nomMail')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    @php
                        $route = request()
                            ->route()
                            ->getName();
                    @endphp


                    <div class="input-field">
                        <label for="document">Document</label>
                        <input type="file" name="document" id="document">
                        <span class="text-danger" style="color: red;">
                            @error('document')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>


                    <div class="input-field">
                        <label for="service">Service</label>
                        <select name="service_id" id="service">
                            @foreach ($services as $service)
                                <option value="{{ $service->idSer }}">{{ $service->nomSer }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" style="color: red;">
                            @error('service_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                
                <button class="inscription px-5" type="submit">
                    @if ($mail->exists)
                        <span class="btnText">Modifier</span>
                    @else
                        <span class="btnText">Créer</span>
                    @endif
                </button>
            </div>



        </div>
    </form>
   </div>
</div>

   


@endsection
