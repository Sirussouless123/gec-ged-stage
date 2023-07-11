{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  
    @vite(['resources/js/app.js'])
   @livewireStyles
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

    
        .search-style p:hover {
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
                                    <h2 class="accordion-header d-flex align-items-center justify-content-space-around"
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

                                    </h2>
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
                                    <h2 class="accordion-header d-flex align-items-center justify-content-space-around"
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

                                    </h2>
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

</html> --}}

<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/seos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jul 2023 06:34:51 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico"> --}}

    <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
    @vite(['resources/js/app.js'])
    @livewireStyles
    @yield('links')
    <script nonce="83228693-1fef-4d01-9f3b-666c418813af">
        (function(w, d) {
            ! function(f, g, h, i) {
                f[h] = f[h] || {};
                f[h].executed = [];
                f.zaraz = {
                    deferred: [],
                    listeners: []
                };
                f.zaraz.q = [];
                f.zaraz._f = function(j) {
                    return function() {
                        var k = Array.prototype.slice.call(arguments);
                        f.zaraz.q.push({
                            m: j,
                            a: k
                        })
                    }
                };
                for (const l of ["track", "set", "debug"]) f.zaraz[l] = f.zaraz._f(l);
                f.zaraz.init = () => {
                    var m = g.getElementsByTagName(i)[0],
                        n = g.createElement(i),
                        o = g.getElementsByTagName("title")[0];
                    o && (f[h].t = g.getElementsByTagName("title")[0].text);
                    f[h].x = Math.random();
                    f[h].w = f.screen.width;
                    f[h].h = f.screen.height;
                    f[h].j = f.innerHeight;
                    f[h].e = f.innerWidth;
                    f[h].l = f.location.href;
                    f[h].r = g.referrer;
                    f[h].k = f.screen.colorDepth;
                    f[h].n = g.characterSet;
                    f[h].o = (new Date).getTimezoneOffset();
                    if (f.dataLayer)
                        for (const s of Object.entries(Object.entries(dataLayer).reduce(((t, u) => ({
                                ...t[1],
                                ...u[1]
                            })), {}))) zaraz.set(s[0], s[1], {
                            scope: "page"
                        });
                    f[h].q = [];
                    for (; f.zaraz.q.length;) {
                        const v = f.zaraz.q.shift();
                        f[h].q.push(v)
                    }
                    n.defer = !0;
                    for (const w of [localStorage, sessionStorage]) Object.keys(w || {}).filter((y => y.startsWith(
                        "_zaraz_"))).forEach((x => {
                        try {
                            f[h]["z_" + x.slice(7)] = JSON.parse(w.getItem(x))
                        } catch {
                            f[h]["z_" + x.slice(7)] = w.getItem(x)
                        }
                    }));
                    n.referrerPolicy = "origin";
                    n.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(f[h])));
                    m.parentNode.insertBefore(n, m)
                };
                ["complete", "interactive"].includes(g.readyState) ? zaraz.init() : f.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <style>
        .search-style{
            background: #87cfebb7;
        }
        .search-style{
          cursor: pointer;
        }
    .search-style p:hover {
        background-color: #cfe2ff;


    }

    .search-style a {
        text-decoration: none;
        color:  white;
        margin: 20px ;
    }
    </style>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('assets/img/text-3.png')}}" alt="" >
                </div>
            </div>
        </div>
    </div>

    <header>

        <div class="header-area header-transparrent ">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{route('home')}}"><img src="{{asset('assets/user/img/logo/text-3.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">

                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li class="nav-link"><a class="nav-item" href="{{route('home')}}"> Accueil</a></li>
                                        <li class="nav-link"><a  class="nav-item " href="{{route('user.document.index')}}">Documents</a></li>
                                        <li class="nav-link"><a class="nav-item" href="{{route('user.mail.index')}}">Courriers</a></li>
                                        {{-- <li><a href="contact.html">About</a></li> --}}
                                        {{-- <li><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                            </ul>
                                        </li> --}}
                                        {{-- <li><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">Element</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    
                            
                       
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="{{ Session::has('status') ? route('logout') : route('login')}}" class="genric-btn info radius ">{{ Session::has('status') ? 'Se déconnecter' : 'Se connecter'}}</a>
                            </div>
                        </div>
                      
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main >
   
     @yield('content')
    </main>
    <footer>

        <div class="footer-main" data-background="{{asset('assets/user/img/shape/footer_bg.png')}}">
            {{-- <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">

                                    <div class="footer-logo">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png"
                                                alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p class="info1">221B Baker Street, P.O Box 353 Park <br> Road, USA -
                                                215431</p>
                                            <p class="info2"><a
                                                    href="https://preview.colorlib.com/cdn-cgi/l/email-protection"
                                                    class="__cf_email__"
                                                    data-cfemail="a4cdcac2cbe4ddcbd1d6c0cbc9c5cdca8ac7cbc9">[email&#160;protected]</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-globe"></i></a>
                                        <a href="#"><i class="fab fa-behance"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="about.html">Features</a></li>
                                        <li><a href="single-blog.html">Pricing</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Support</h4>
                                    <ul>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#"> Sitemap</a></li>
                                        <li><a href="#">FAQs</a></li>
                                        <li><a href="#">Report a bugb</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Core Features</h4>
                                    <ul>
                                        <li><a href="#">Email Marketing</a></li>
                                        <li><a href="#"> Offline SEO</a></li>
                                        <li><a href="#">Social Media Marketing</a></li>
                                        <li><a href="#">Lead Generation</a></li>
                                        <li><a href="#"> 24/7 Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        Copyright &copy;
                                        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | GED-GEC  </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    @yield('js')
    @livewireScripts
    <script src="{{asset('assets/user/js/vendor/modernizr-3.5.0.min.js')}}"></script>

    <script src="{{asset('assets/user/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/user/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/user/js/jquery.slicknav.min.js')}}"></script>

    <script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/user/js/slick.min.js')}}"></script>

    <script src="{{asset('assets/user/js/gijgo.min.js')}}"></script>

    <script src="{{asset('assets/user/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/user/js/animated.headline.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.magnific-popup.js')}}"></script>

    <script src="{{asset('assets/user/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.sticky.js')}}"></script>

    <script src="{{asset('assets/user/js/contact.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/user/js/mail-script.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{asset('assets/user/js/plugins.js')}}"></script>
    <script src="{{asset('assets/user/js/main.js')}}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7e0d1ad879360e3b","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
      
</body>

<!-- Mirrored from preview.colorlib.com/theme/seos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jul 2023 06:35:20 GMT -->

</html>
