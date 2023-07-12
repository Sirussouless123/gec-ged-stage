@extends('layouts.app')

@section('title', 'Informations courrier')

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
    @php
        
        $favorite = DB::table('categories')
            ->where('nomCat', 'Favoris')
            ->first();
        
        $report = DB::table('categories')
            ->Where('nomCat', 'Importants')
            ->first();
    @endphp
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
                                href="{{ route('user.mail.create', ['mail' => $newMail]) }}">Ajouter
                                courrier</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-md-start" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <i class="fa-solid fa-list fa-lg"></i>
                                Ranger par
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item "
                                        href="{{ route('user.mail.showFormat', ['format' => 'recents']) }}">Courriers
                                        récents</a></li>
                                <li><a class="dropdown-item "
                                        href="{{ route('user.mail.showFormat', ['format' => 'anciens']) }}">Courriers
                                        anciens</a></li>
                                <li><a class="dropdown-item "
                                        href="{{ route('user.mail.showFormat', ['format' => 'format']) }}">Par format </a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('user.mail.showFormat', ['format' => 'service']) }}">Par service</a>
                                </li>
                            </ul>


                    </ul>
                    <div class="profile_info" style="z-index :200">
                        <img src="{{asset('assets/img/client_img.png')}}" alt="#">
                        <div class="profile_info_iner">
                            @php
                                $infos = DB::table('users')->where('id',session('loginId'))->first();
                            @endphp
                            <p>Bienvenue utilisateur</p>
                            <h5>{{$infos->nom}} {{$infos->prenom}}</h5>
                            <div class="profile_info_details">
                                <a href="{{route('user.user.edit',['user'=>$infos->id])}}">Mon profil <i class="ti-user"></i></a>
                                <a href="{{route('logout')}}">Log Out <i class="ti-shift-left"></i></a>
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
                            @endphp
                            <ul class="text-start">
                                <li class="{{ str_contains($route, 'index') ? 'active' : '' }}"><a
                                        href="{{ route('user.mail.index') }}"><i class="fas fa-inbox"></i> Mails
                                        ({{ $nbMail }})</a></li>


                            </ul>
                            <ul class="text-start mb-3">
                                <li class="{{ str_contains($route, 'category') ? 'active' : '' }}">
                                    <a dropdown-toggle href="{{ route('user.mail.index') }}" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside"><i class="ti-user"></i> Catégorie
                                        de documents ({{ $nbCat }})</a>
                                    <ul class="dropdown-menu">

                                        <li><a style="color: black " class="dropdown-item"
                                                href="{{ route('user.mail.category', ['category' => $favorite->idCat]) }}">Favoris</a>
                                        </li>
                                        <li><a style="color: black " class="dropdown-item"
                                                href="{{ route('user.mail.category', ['category' => $report->idCat]) }}">Importants</a>
                                        </li>


                                    </ul>
                                </li>
                            </ul>
                            <ul class="text-start py-3 ">
                                <li class="{{ str_contains($route, 'service') ? 'active' : '' }}">
                                    <a dropdown-toggle href="{{ route('user.mail.index') }}" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside"><i class="ti-user"></i>Services
                                        ({{ $nbSer }})</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($services as $service)
                                            <li><a class="dropdown-item" style="color: black "
                                                    href="{{ route('user.mail.showService', ['service' => $service]) }}">{{ $service->nomSer }}</a>
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
                            @if ($mail->formatMail == 'docx')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="convert-tab" data-bs-toggle="tab"
                                    data-bs-target="#convert-tab-pane" type="button" role="tab"
                                    aria-controls="convert-tab-pane" aria-selected="false">Convertir fichier en word</button>
                            </li>
                            @endif

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
                            $nomSer = DB::table('mails')
                                ->join('services', 'services.idSer', '=', 'mails.service_id')
                                ->where('mails.user_id', session('loginId'))
                                ->select('services.nomSer')
                                ->first();
                            $name = $mail->nomMail . '.' . $mail->formatMail;
                            $path = 'storage/cour_' . session('loginId');
                            $mailemp = new App\Models\Mail;
                        @endphp
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active infos" id="infos-tab-pane" role="tabpanel"
                                aria-labelledby="infos-tab" tabindex="0">
                                <h4 class="text-center">{{ $mail->nomMail . '.' . $mail->formatMail }}</h4>
                                <div class="d-flex gap-1 gy-2 flex-column v-stack mt-2">
                                    <h6>Nom du courrier : {{ $mail->nomMail }}</h6>
                                    <h6>Format du courrier : {{ $mail->formatMail }}</h6>
                                    <h6>Date d'ajout du courrier : {{ $mail->dateDepot }}</h6>
                                    <h6>Date de dernière modification : {{ $mail->updated_at }}</h6>
                                    <h6>Service : {{ $nomSer->nomSer }}</h6>
                                </div>
                            </div>
                            <div class="tab-pane fade show active convert" id="convert-tab-pane" role="tabpanel"
                            aria-labelledby="convert-tab" tabindex="0">
                            <h4 class="text-center">Word en Pdf</h4>
                            <div class="d-flex gap-1 gy-2 flex-column v-stack mt-2 justify-content-center">
                                <form action="{{ route('user.mail.convert') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Fichier word</label>
                                        <input type="file" id="hiddenfile" style="visibility:hidden;" />
                                        <input class="form-control" type="hidden" name="text1" size="50"
                                            value="{{ $mailemp->getPathFile($mail) }}" />
                                        <input class="form-control" type="hidden" name="text2" size="50"
                                            value="{{ $mailemp->getPath($mail)['path'] }}" />
                                        <input class="form-control" type="hidden" name="text3" size="50"
                                            value="{{ $mailemp->getPath($mail)['name'] }}" />

                                        <button class="btn btn-outline-primary" type="submit" value="Browse..."
                                            onclick="document.getElementById('hiddenfile').click.getFileName();"
                                            name="submit">Continuer</button>

                                    </div>
                                </form>

                            </div>

                        </div>
                            <div class="tab-pane fade" id="actions-tab-pane" role="tabpanel"
                                aria-labelledby="actions-tab" tabindex="0">
                                <div class="d-flex gap-1 gy-2 flex-column v-stack mt-2">

                                    <div class="d-flex gap-2">
                                        <h6>Modifier courrier : </h6>
                                        <a href="{{ route('user.mail.edit', ['mail' => $mail->idMail]) }}"
                                            style="text-decoration:none;color : black; " class='bx bxs-folder mt-1'>
                                        </a>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <h6>Supprimer courrier : </h6>
                                        <form action="{{ route('user.mail.destroy', ['mail' => $mail->idMail]) }}"
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
                                        <h6>Télécharger courrier : </h6>
                                        <a href="{{ route('user.downloadingmail', ['mail' => $mail->idMail]) }}"
                                            style="text-decoration:none;color : black; " class='bx bxs-download mt-1'>
                                        </a>
                                    </div>
                                    @if($mail->formaMail == 'pdf')
                                    <div class="d-flex gap-2">
                                        <h6>Ouvrir courrier : </h6>

                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Ouvrir
                                        </button>


                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Fermer"></button>
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

                                    <div class="d-flex gap-2" x-data>
                                        <h6>Ajouter/Supprimer des favoris : </h6>
                                        <livewire:favorite :mail="$mail->idMail" :favorite="$favorite->idCat" />
                                    </div>
                                    <div class="d-flex gap-2" x-data>
                                        <h6>Ajouter/Supprimer des importants : </h6>
                                        <livewire:report :mail="$mail->idMail" :report="$report->idCat" />
                                    </div>

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
