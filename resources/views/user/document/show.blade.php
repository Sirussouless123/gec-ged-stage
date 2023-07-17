@extends('layouts.app')

@section('title', 'Informaions documents')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/user/css/boxicons-2.1.4/boxicons-2.1.4/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/doc.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/subnav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/tab_css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome-free-6.4.0-web/css/all.min.css') }}">
@endsection

@section('content')

    <section class="doc-content ">

        <nav class="navbar navbar-expand-lg bg-light  ">
            <div class="container-fluid ">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse py-3" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-outline-primary text-md-center " aria-current="page"
                                href="{{ route('user.document.create', ['document' => $newDoc]) }}">Ajouter
                                document</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-md-start" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <i class="fa-solid fa-list fa-lg"></i>
                                Ranger par
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item "
                                        href="{{ route('user.showFormat', ['format' => 'recents']) }}">Documents récents</a>
                                </li>
                                <li><a class="dropdown-item "
                                        href="{{ route('user.showFormat', ['format' => 'anciens']) }}">Documents anciens</a>
                                </li>
                                <li><a class="dropdown-item "
                                        href="{{ route('user.showFormat', ['format' => 'format']) }}">Par format </a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('user.showFormat', ['format' => 'service']) }}">Par service</a></li>
                            </ul>


                    </ul>
                    <div class="profile_info" style="z-index :200">
                        <img src="{{ asset('assets/img/client_img.png') }}" alt="#">
                        <div class="profile_info_iner">
                            @php
                                $infos = DB::table('users')
                                    ->where('id', session('loginId'))
                                    ->first();
                            @endphp
                            <p>Bienvenue utilisateur</p>
                            <h5>{{ $infos->nom }} {{ $infos->prenom }}</h5>
                            <div class="profile_info_details">
                                <a href="{{ route('user.user.edit', ['user' => $infos->id]) }}">Mon profil <i
                                        class="ti-user"></i></a>
                                <a href="{{ route('logout') }}">Déconnexion <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </nav>

    </section>

    <section class="sidebar_content ">
        <div class="main_content_iner ">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-md-3">

                        <div class="email-sidebar pt-3">
                            <h4>Menu</h4>
                            @php
                                $route = request()
                                    ->route()
                                    ->getName();
                                
                             $verif = $document->formatDoc == 'docx' ? true : false;
                            @endphp
                            <ul class="text-start">
                                <li class="{{ str_contains($route, 'document') ? 'active' : '' }}"><a
                                        href="{{ route('user.document.index') }}"><i class="fas fa-inbox"></i> Documents
                                        ({{ $nbDoc }})</a></li>


                            </ul>
                            <ul class="text-start mb-3">
                                <li>
                                    <a dropdown-toggle href="{{ route('user.document.index') }}" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                                        class="{{ str_contains($route, 'type') ? 'active' : '' }}"><i class="ti-user"></i>
                                        Types de documents ({{ $nbType }})</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($types as $type)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.showType', ['type' => $type->type]) }}">{{ $type->type }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                            </ul>
                            <ul class="text-start py-3 ">
                                <li>
                                    <a dropdown-toggle href="{{ route('user.document.index') }}" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                                        class="{{ str_contains($route, 'service') ? 'active' : '' }}"><i
                                            class="ti-user"></i>Services ({{ $nbSer }})</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($services as $service)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.showService', ['service' => $service]) }}">{{ $service->nomSer }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                            </ul>


                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="infos-tab" data-bs-toggle="tab"
                                    data-bs-target="#infos-tab-pane" type="button" role="tab"
                                    aria-controls="infos-tab-pane" aria-selected="true">Informations</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="actions-tab" data-bs-toggle="tab"
                                    data-bs-target="#actions-tab-pane" type="button" role="tab"
                                    aria-controls="actions-tab-pane" aria-selected="false">Actions</button>
                            </li>
                          

                        </ul>
                        <style>
                            .infos {
                                height: 1000px;
                                overflow: auto;
                            }

                            .desc-style {
                                border: 1px solid gray;
                                width: 800px;
                                height: 200px;

                                overflow: auto;
                                text-align: justify;
                                padding-left: 5px;

                            }
                        </style>
                        @php
                            $nomSer = DB::table('documents')
                                ->join('services', 'services.idSer', '=', 'documents.service_id')
                                ->where('documents.user_id', session('loginId'))
                                ->select('services.nomSer')
                                ->first();
                            $name = $document->nomDoc . '-version-' . $document->numeroVersion . '.' . $document->formatDoc;
                            $path = 'storage/doc_' . session('loginId');
                            $doc = new App\Models\Document();
                       
                         @endphp
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active infos" id="infos-tab-pane" role="tabpanel"
                                aria-labelledby="infos-tab" tabindex="0">
                                <h4 class="text-center">{{ $document->nomDoc . '.' . $document->formatDoc }}</h4>
                                <div class="d-flex gap-1 gy-2 flex-column v-stack mt-2">
                                    <h6>Nom du document : {{ $document->nomDoc }}</h6>
                                    <h6>Format du document : {{ $document->formatDoc }}</h6>
                                    <h6>Date d'ajout du document : {{ $document->dateVersion }}</h6>
                                    <h6>Date de dernière modification : {{ $document->updated_at }}</h6>
                                    <h6>Version du document : {{ $document->numeroVersion }}</h6>
                                    <h6>Service : {{ $nomSer->nomSer }}</h6>
                                    <h6>Type du document : {{ $document->type }}</h6>
                                    <h6>Taille : {{ round($document->taille / 1000000, 2) }} Mb</p>
                                </div>
                                <div class=" gy-2 flex-column d-none d-xl-flex">
                                    <h5 class="">Description</h5>
                                    <p class="desc-style pt-1 text-break">
                                        {{ $document->description }}
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="actions-tab-pane" role="tabpanel"
                                aria-labelledby="actions-tab" tabindex="0">
                                <div class="d-flex gap-1 gy-2 flex-column v-stack mt-2">

                                    <div class="d-flex gap-2">
                                        <h6>Modifier document : </h6>
                                        <a href="{{ route('user.document.edit', ['document' => $document->idDoc]) }}"
                                            style="text-decoration:none;color : black; " class='bx bxs-folder mt-1'>
                                        </a>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <h6>Supprimer document : </h6>
                                        <form
                                            action="{{ route('user.document.destroy', ['document' => $document->idDoc]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class='bx bxs-trash'
                                                style=" background: none;color: black;border: none; padding: 0;font: inherit; cursor: pointer; outline: inherit; "
                                                class="mb-5">
                                            </button>
                                        </form>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <h6>Télécharger document : </h6>
                                        <a href="{{ route('user.downloading', ['document' => $document->idDoc]) }}"
                                            style="text-decoration:none;color : black; " class='bx bxs-download mt-1'>
                                        </a>
                                    </div>
                                    @if ($document->formatDoc == 'pdf')
                                        <div class="d-flex gap-2">
                                            <h6>Ouvrir courrier : </h6>

                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Ouvrir
                                            </button>


                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                Ouverture du pdf
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <embed src="{{ '/' . $path . '/' . $name }}" width="1366"
                                                                height="768" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($verif == true)
                                        <div class="d-flex gap-1 gy-2 flex-column v-stack  justify-content-center">
                                            <h4 class="text-center">Word en Pdf</h4>
                                            <form action="{{ route('user.document.convert') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Convertir</label>
                                                    <input type="file" id="hiddenfile" style="visibility:hidden;" />
                                                    <input class="form-control" type="hidden" name="text1"
                                                        size="50" value="{{ $doc->getPathFile($document) }}" />
                                                    <input class="form-control" type="hidden" name="text2"
                                                        size="50" value="{{ $doc->getPath($document)['path'] }}" />
                                                    <input class="form-control" type="hidden" name="text3"
                                                        size="50" value="{{ $doc->getPath($document)['name'] }}" />

                                                    <button class="btn btn-outline-primary" type="submit"
                                                        value="Browse..."
                                                        onclick="document.getElementById('hiddenfile').click.getFileName();"
                                                        name="submit">Continuer</button>

                                                </div>
                                            </form>

                                        </div>
                                    @endif
                                  

                                </div>
                            </div>


                        </div>




                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection

@section('js')


    <script src="{{ asset('assets/user/js/tab_js.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

@endsection
