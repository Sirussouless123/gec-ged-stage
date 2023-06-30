@extends('layouts.app')

@section('title', $document->exists ? 'Modifier un document' : 'Créer un document')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/Insription.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection


@section('content')

    <h1 class="my-3">@yield('title')</h1>

    <form action="{{ route($document->exists ? 'user.document.update' : 'user.document.store', ['document' => $document]) }}"
        method="post" class="v-stack gap-2" enctype="multipart/form-data">
        @method($document->exists ? 'put' : 'post')
        @csrf

        <div class="form first">
            <div class="details personal">
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="fields">
                    <div class="input-field">
                        <label for="nomDoc">Nom </label>
                        <input type="text" placeholder="Nom du document"
                            value="{{ old('nomDoc') ? old('nomDoc') : $document->nomDoc }}" name="nomDoc">
                        <span class="text-danger">
                            @error('nomDoc')
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
                        <span class="text-danger">
                            @error('numeroVersion')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    
                    <div class="input-field">
                        <label for="document">Document</label>
                        <input type="file" name="document" id="document">
                        <span class="text-danger">
                            @error('document')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                      
                    <div class="input-field">
                        <label for="description">Description(Optionnel)</label>
                        <textarea name="description" id="description"></textarea>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input-field">
                        <label for="type">Type du document</label>
                        <input type="text" placeholder=" Ex:Facture"
                            value="{{ old('type') ? old('type') : $document->type }}" name="type">
                        <span class="text-danger">
                            @error('type')
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
                        <span class="text-danger">
                            @error('service_id')
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
@endsection
