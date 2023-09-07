<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    <link rel="icon" href="{{ asset('assets/img/text-3.png') }}" type="image/png">

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
                        <div class="col-xl-2 col-lg-2 col-md-1 ">
                            <div class="logo-user" >
                                <a href="{{route('home')}}"><img src="{{asset('assets/img/logo-4.png')}}" alt=""  class=" img-fluid d-none d-lg-block" height="50" ></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">

                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li class="nav-link"><a class="nav-item" href="{{route('home')}}"> Accueil</a></li>
                                        <li class="nav-link"><a  class="nav-item " href="{{route('user.document.index')}}">Documents</a></li>
                                        <li class="nav-link"><a class="nav-item" href="{{route('user.mail.index')}}">Courriers</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    
                            
                       
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="{{ Session::has('status') ? route('logout') : route('login')}}" class="genric-btn info radius ">{{ Session::has('status') ? 'Déconnexion' : 'Connexion'}}</a>
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


</html>
