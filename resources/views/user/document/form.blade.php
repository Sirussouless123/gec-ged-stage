@extends('layouts.app')

@section('title', $document->exists ? 'Modifier un document' : 'Créer un document')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/Insription.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection


@section('content')

    <div class="center-form ">
        <div class="container-ins">



            <h1 class="my-3">@yield('title')</h1>

            <form
                action="{{ route($document->exists ? 'user.document.update' : 'user.document.store', ['document' => $document]) }}"
                method="post" class="v-stack gap-2" enctype="multipart/form-data">
                @method($document->exists ? 'put' : 'post')
                @csrf

                <div class="form first">
                    <div class="details personal">
                        @if (Session::has('fail'))
                            <div class="alert alert-danger" style="background: #dc354691;">{{ Session::get('fail') }}</div>
                        @endif
                        <div class="fields">
                            <div class="input-field">
                                <label for="nomDoc">Nom </label>
                                <input type="text" placeholder="Nom du document"
                                    value="{{ old('nom') ? old('nom') : $document->nomDoc }}" name="nom">
                                <span style="color: red;">
                                    @error('nom')
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
                                <label for="numeroVersion">Numéro version</label>
                                <input type="text" placeholder="Numéro de version du document"
                                    value="{{ old('numeroVersion') ? old('numeroVersion') : $document->numeroVersion }}"
                                    name="numeroVersion" @readonly($route == 'user.document.edit')>
                                <span style="color:red;">
                                    @error('numeroVersion')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="input-field">
                                <label for="document">Document</label>
                                <input type="file" name="fichier" id="document">
                                <span style="color:red;">
                                    @error('document')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="input-field">
                                <label for="description">Description(Optionnel)</label>
                                <textarea name="description" id="description"></textarea>
                                <span style="color:red;">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="input-field">
                                <label for="type">Type du document</label>
                                <input type="text" placeholder=" Ex:Facture"
                                    value="{{ old('type') ? old('type') : $document->type }}" name="type">
                                <span style="color:red;">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="input-field">
                                <label for="service">Service</label>
                                <select name="service" id="service">
                                    @foreach ($services as $service)
                                        <option value="{{ $service->idSer }}">{{ $service->nomSer }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red;">
                                    @error('service')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>
                        <button class="inscription px-5" type="submit">
                            @if ($document->exists)
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
