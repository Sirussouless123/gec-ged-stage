<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
   
    <link rel="stylesheet" href="{{ asset('assets/css/Document.css')}}" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    @yield('links')
  </head>
  <body>
    @php
        $route = request()->route()->getName();
        if ( str_contains($route,'home') ){
             $class = 'container-main';
        }elseif(str_contains($route,'register')){
          $class = 'container-ins';
        }elseif(str_contains($route,'login')){
          $class = 'container-log';
        }elseif(str_contains($route,'user.document.index')){
          $class = 'container-main';
        }elseif(str_contains($route,'user.document.create')){
          $class = 'container-ins';
        }
        
    @endphp
    <div class="{{$class}} ">
      <aside>
        <nav class="sidebar">
          <header>
            <div class="image-text">
              <span class="image">
                <h3>Efficacity</h3>
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
              <div class="menu-link">
                <li class="search-box">
                  <i class="bx bx-search icon"></i>
                  <input type="text" placeholder="Search........" />
                </li>
              </div>


              <div class="menu-links">
                <li class="nav-link ">
                  <a href="{{ route('home')}}" >
                    <span class="material-symbols-sharp">home</span>
                    <span class="text nav-text mx-3">Accueil</span>
                  </a>
                </li>
              </div>
               @if (!(Session::has('status')))
              <div class="menu-links">
                <li class="nav-link">
                  <a href="{{route('register')}}">
                    <span class="material-symbols-sharp">subscriptions</span>
                    <span class="text nav-text mx-3">Inscription</span>
                  </a>
                </li>
              </div>
          
              <div class="menu-links">
                <li class="nav-link">
                  <a href="{{ route('login')}}">
                    <span class="material-symbols-sharp">tv_signin</span>
                    <span class="text nav-text mx-3">Connexion</span>
                  </a>
                </li>
              </div>
              @endif
            @if(Session::has('status'))
  <div class="accordion accordion-flush color-accordion" id="accordionFlushExample ">
    <div class="accordion-item">
      <h2 class="accordion-header d-flex align-items-center justify-content-space-around" id="flush-headingOne">
   <a href="{{ route('user.document.index')}}">
        <span class="material-symbols-sharp " style=" color: #0d6efd;" >folder_open</span>
   </a>  
        <span class="accordion-button collapsed text nav-text"  data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
         Documents
        </span>
   
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse link-visibility-item" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <ul class="list-document d-flex flex-column  justify-content-start ">
            <li>
                <a href="{{route('user.document.create')}}"  >Ajouter document</a>
            </li>
            <li>
                <a href="{{route('user.document.index')}}" >Voir documents

                </a>
            </li>
         </ul>
    </div>
    
  </div>
               
            
              </div>
              <div class="accordion accordion-flush color-accordion" id="accordionFlushExample2 ">
                <div class="accordion-item">
                  <h2 class="accordion-header d-flex align-items-center justify-content-space-around" id="flush-heading2">
               <a href="">
                    <span class="material-symbols-sharp " style=" color: #0d6efd;" >dynamic_feed</span>
               </a>  
                    <span class="accordion-button collapsed text nav-text"  data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                     Courriers
                    </span>
               
                  </h2>
                  <div id="flush-collapse2" class="accordion-collapse collapse link-visibility-item" aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample2">
                    <ul class="list-document d-flex flex-column  justify-content-start ">
                        <li>
                            <a href="#"  >Ajouter courrier</a>
                        </li>
                        <li>
                            <a href="#" >
                                Voir courriers
                            </a>
                        </li>
                     </ul>
                </div>
                
              </div>
                           
  
                          </div>
                          @endif
              <div class="menu-links">
                <li class="nav-link">
                  <a href="{{route('logout')}}">
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
      <main >
        
          @yield('content')
        
      
    </main>
    </div>
       @yield('js')
    <script src="{{ asset('assets/js/Document.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>
