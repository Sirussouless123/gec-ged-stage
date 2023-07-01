<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  
    @vite(['resources/js/app.js'])
   
    @yield('links')
   
</head>

<body>
    @php
        $route = request()
            ->route()
            ->getName();
        if (str_contains($route, 'home')) {
            $class = 'container-main';
        } elseif (str_contains($route, 'register')) {
            $class = 'container-ins';
        } elseif (str_contains($route, 'login')) {
            $class = 'container-log';
        } elseif (str_contains($route, 'user.document.index') || str_contains($route, 'user.mail.index') || str_contains($route, 'user.mail.favorite') || str_contains($route, 'user.mail.important') || str_contains($route, 'user.mail.search') || str_contains($route, 'user.document.search')) {
            $class = 'container-main';
        } elseif (str_contains($route, 'user.document.create') || str_contains($route, 'user.document.edit')   ) {
            $class = 'container-ins';
        }elseif (str_contains($route, 'user.mail.create') || str_contains($route, 'user.mail.edit')) {
          $class = 'container-log';
        }
        
        $favorite = DB::table('categories')
            ->where('nomCat', 'Favoris')
            ->first();
        
        $report = DB::table('categories')
            ->where('nomCat', 'Importants')
            ->first();
        
    @endphp

    <style>

    
        .search-style a:hover {
            background-color: #cfe2ff;


        }

        .search-style a {
            text-decoration: none;
            color:  #707070;
            margin-left: 20px ;
        }
    </style>
    <div class="{{ $class }} ">
        <aside>
            <nav class="sidebar">
                <header>
                    <div class="image-text">
                        <span class="image">
                            <h3>GED-GEC</h3>
                        </span>

                        <div class="text header-text">
                            <span class="name"></span>
                            <span class="profession"></span>
                        </div>
                    </div>

                    <i class="bx bx-chevron-right toggle"></i>
                </header>

                <div class="menu-bar">
                    <div class="menu">

                        <livewire:search />

                        <div class="menu-links">
                            <li class="nav-link ">
                                <a href="{{ route('home') }}">
                                    <span class="material-symbols-sharp">home</span>
                                    <span class="text nav-text mx-3">Accueil</span>
                                </a>
                            </li>
                        </div>
                        @if (!Session::has('status'))
                            <div class="menu-links">
                                <li class="nav-link">
                                    <a href="{{ route('register') }}">
                                        <span class="material-symbols-sharp">subscriptions</span>
                                        <span class="text nav-text mx-3">Inscription</span>
                                    </a>
                                </li>
                            </div>

                            <div class="menu-links">
                                <li class="nav-link">
                                    <a href="{{ route('login') }}">
                                        <span class="material-symbols-sharp">tv_signin</span>
                                        <span class="text nav-text mx-3">Connexion</span>
                                    </a>
                                </li>
                            </div>
                        @endif
                        @if (Session::has('status'))
                            <div class="accordion accordion-flush color-accordion" id="accordionFlushExample ">
                                <div class="accordion-item">
                                    <p class="accordion-header d-flex align-items-center justify-content-space-around"
                                        id="flush-headingOne">
                                        <a href="{{ route('user.document.index') }}">
                                            <span class="material-symbols-sharp "
                                                style=" color: #0d6efd;">folder_open</span>
                                        </a>
                                        <span class="accordion-button collapsed text nav-text" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne" style="cursor: pointer">
                                            Documents
                                        </span>

                                    </p>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse link-visibility-item"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <ul class="list-document d-flex flex-column    ">
                                            <li>
                                                <a href="{{ route('user.document.create') }}">
                                                    <span class="material-symbols-sharp mx-2"
                                                        style=" color: #0d6efd;">add_box</span>

                                                    Ajouter document
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.document.index') }}">
                                                    <span class="material-symbols-sharp mx-2"
                                                        style=" color: #0d6efd;">newspaper</span>
                                                    Voir documents
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>


                            </div>
                            <div class="accordion accordion-flush color-accordion" id="accordionFlushExample2 ">
                                <div class="accordion-item">
                                    <p class="accordion-header d-flex align-items-center justify-content-space-around"
                                        id="flush-heading2">
                                        <a href=" {{ route('user.mail.index') }}">
                                            <span class="material-symbols-sharp "
                                                style=" color: #0d6efd;">dynamic_feed</span>
                                        </a>
                                        <span class="accordion-button collapsed text nav-text" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse2" aria-expanded="false"
                                            aria-controls="flush-collapse2" style="cursor: pointer">
                                            Courriers
                                        </span>

                                    </p>
                                    <div id="flush-collapse2" class="accordion-collapse collapse link-visibility-item"
                                        aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample2">
                                        <ul class="list-document d-flex flex-column  justify-content-start ">
                                            <li>
                                                <a href="{{ route('user.mail.create') }}">
                                                    <span class="material-symbols-sharp mx-2"
                                                        style=" color: #0d6efd;">add_box</span>
                                                    Ajouter courrier
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.mail.index') }}">
                                                    <span class="material-symbols-sharp mx-2"
                                                        style=" color: #0d6efd;">newspaper</span>

                                                    Voir courriers
                                                </a>
                                            </li>


                                            <li>
                                                <a href="{{ route('user.mail.favorite') }}">

                                                    <span class="material-symbols-sharp mx-2"
                                                        style=" color: #0d6efd;">hotel_class</span>

                                                    {{ $favorite->nomCat }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.mail.important') }}">
                                                    <span class="material-symbols-sharp mx-2"
                                                        style=" color: #0d6efd;">report</span>


                                                    {{ $report->nomCat }}
                                                </a>
                                            </li>


                                        </ul>
                                    </div>

                                </div>


                            </div>
                        @endif
                        <div class="menu-links">
                            <li class="nav-link">
                                <a href="{{ route('logout') }}">
                                    <span class="material-symbols-sharp">logout </span>
                                    <span class="text nav-text mx-3">Déconnexion</span>
                                </a>
                            </li>
                        </div>
                    </div>
                  
                    <div class="bottom-content">
                        <li class="mode">
                            <div class="moon-sun">
                                <i class="bx bx-moon icon moon"></i>
                                <i class="bx bx-sun icon sun"></i>
                            </div>
                            <span class="mode-text text">Dark Mode</span>
                            <div class="toggle-switch">
                                <span class="switch"> </span>
                            </div>
                        </li>
                    </div>
                </div>
            </nav>
        </aside>
        <main>

            @yield('content')


        </main>
    </div>
    @livewireScripts
    @yield('js')
    
    <script src="{{ asset('assets/js/Document.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
