{{-- @extends('layouts.app')

@section('title', 'Documents')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}" />

@endsection
@section('content')

<div class="container-fluid my-3 ">


    <div class="row g-5 ">

        @foreach ($documents as $document)
        <div class=" col-xl-6 col-lg-6 col-md-6  ">
            <div class="card ">
              <div class="image-content">
                <span class="overlay"></span>
                @php
                    $image ='text-3.png';
                    if ($document->formatDoc == 'pdf'){
                        $image = 'pdf-1.png';
                    }elseif($document->formatDoc == 'docx'){
                        $image = 'word-1.png';
                    }
                    elseif($document->formatDoc == 'xlsx'){
                        $image = 'excel-1.png';
                    }
                    elseif($document->formatDoc == 'csv'){
                        $image = 'csv-1.png';
                    }
                    elseif($document->formatDoc == 'xml'){
                        $image = 'xml-2.png';
                    }

             
                @endphp
  
                <div class="card-image">
                  <img src="{{ asset('assets/img/'.$image)}}" alt="" class="card-img" />
                </div>
              </div>
             
              <div class="card-content">
                <h2 class="name">Documents</h2>
                <h2 class="name badge rounded-pill text-bg-primary">Version {{$document->numeroVersion}}</h2>
                <p>Nom : {{$document->nomDoc}}</p>
                <div x-data="{ option: false }" >
                              
                    <button class="button-7 "  @click="option = !option" >Options</button>
                    <div x-show="option" x-cloak>
                        <div class="d-flex   justify-content-between my-2 gap-5 ">

                            <a href="{{ route('user.document.edit', ['document' => $document->idDoc]) }}"
                                style="text-decoration:none;color : black; " class='bx bxs-folder mt-1'>
                            </a>



                            <a href="{{ route('user.downloading', ['document' => $document->idDoc]) }}"
                                style="text-decoration:none;color : black; " class='bx bxs-download mt-1'>
                            </a>

                            <form action="{{ route('user.document.destroy', ['document' => $document->idDoc]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button class='bx bxs-trash'
                                    style=" background: none;color: black;border: none; padding: 0;font: inherit; cursor: pointer; outline: inherit; "
                                    class="mb-5">
                                </button>


                            </form>
               
                        </div>

                    </div>


                </div>
              </div>
            </div>
          </div>
        @endforeach


    </div>
</div>



@endsection

@section('js')

@endsection --}}

@extends('layouts.app')

@section('title', 'Documents')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/user/css/boxicons-2.1.4/boxicons-2.1.4/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/doc.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/subnav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome-free-6.4.0-web/css/regular.css') }}">
    <script src="{{ asset('assets/user/js/jquery-3.7.0.min.js') }}"></script>
@endsection

@section('content')
 
    <section class="doc-content ">
        {{-- <header class="subnav bg-light"> --}}
        <nav class="navbar navbar-expand-lg bg-light  ">
            <div class="container-fluid ">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse py-3" id="navbarSupportedContent" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-outline-primary text-md-center " aria-current="page" href="{{route('user.document.create',['document'=>$newDoc])}}">Ajouter
                                document</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-md-start" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <i class="fa-solid fa-list fa-lg"></i>
                                Ranger par
                            </a>
                            <ul class="dropdown-menu " >
                                <li><a class="dropdown-item " href="{{route('user.showFormat',['format'=>'recents'])}}">Documents récents</a></li>
                                <li><a class="dropdown-item " href="{{route('user.showFormat',['format'=>'anciens'])}}">Documents anciens</a></li>
                                <li><a class="dropdown-item " href="{{route('user.showFormat',['format'=>'format'])}}">Par format </a></li>
                                <li><a class="dropdown-item" href="{{route('user.showFormat',['format'=>'service'])}}">Par service</a></li>
                            </ul>
                           

                    </ul>
                    @php 
                      $admin = DB::table('users')->where('id',session('loginId'))->select('users.statut')->first();
                    @endphp
                    @if($admin->statut == 1)
                    <div class="mx-2">
                        <a class="btn btn-outline-primary" href="{{route('admin.home')}}">
                              Dashboard
                        </a>
                    </div>
                    @endif
                    <div class="profile_info " style="z-index :200">
                        <img src="{{asset('assets/img/client_img.png')}}" alt="#">
                        <div class="profile_info_iner">
                            @php
                                $infos = DB::table('users')->where('id',session('loginId'))->first();
                            @endphp
                            <p>Bienvenue utilisateur</p>
                            <h5>{{$infos->nom}} {{$infos->prenom}}</h5>
                            <div class="profile_info_details">
                                <a href="{{route('user.profil',['user'=>$infos->id])}}">Mon profil <i class="fa-regular fa-user"></i></a>
                                <a href="{{route('logout')}}">Déconnexion <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </nav>
        {{-- </header> --}}
    </section>

    <section class="sidebar_content ">
        <div class="main_content_iner ">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        {{-- <div class="text-start">
                            <button class="btn_1 mb-2 btn-lg email-gradient gradient-9-hover email__btn waves-effect"><i
                                    class="icon-pencil"></i>COMPOSE</button>
                        </div> --}}
                        <div class="email-sidebar pt-3">
                            <h4>Menu</h4>
                            @php 
                                  $route = request()->route()->getName();
                            @endphp 
                            <ul class="text-start">
                                <li class="{{str_contains($route,'index') ?  'active' : ''}}"><a  href="{{route('user.document.index')}}"><i class="fas fa-inbox"></i> Documents ({{$nbDoc}})</a></li>


                            </ul>
                            <ul class="text-start mb-3">
                                <li class="{{str_contains($route,'type') ?  'active' : ''}}">
                                    <a dropdown-toggle href="{{route('user.document.index')}}"  data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside" ><i class="ti-user"></i> Types de documents ({{$nbType}})</a>
                                    <ul class="dropdown-menu">
                                        @foreach($types as $type)
                                        <li><a style="color: black " class="dropdown-item" href="{{route('user.showType',['type'=>$type->type])}}">{{$type->type}}</a></li>
                                        @endforeach
                                      
                                    </ul>
                                </li>
                            </ul>
                            <ul class="text-start py-3 ">
                                <li class="{{str_contains($route,'service') ?  'active' : ''}}">
                                    <a dropdown-toggle href="{{route('user.document.index')}}"  data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside" ><i class="ti-user"></i>Services ({{$nbSer}})</a>
                                    <ul class="dropdown-menu">
                                        @foreach($services as $service)
                                        <li><a style="color: black " class="dropdown-item" href="{{route('user.showService',['service'=>$service])}}">{{$service->nomSer}}</a></li>
                                        @endforeach
                                      
                                    </ul>
                                </li>
                            </ul>


                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="white_box QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Liste des documents</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                           
                                                <div class="search_field">
                                                   <livewire:doc-search />
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table ">

                                <table class="table lms_table_active">
                                   
                                    <tbody>

                                       
                                       
                      
                                        <tr>
                                           
                                             @foreach($documents as $document)
                                        @php
                                        $image ='text-3.png';
                                        if ($document->formatDoc == 'pdf'){
                                            $image = 'pdf-1.png';
                                        }elseif($document->formatDoc == 'docx'){
                                            $image = 'word-1.png';
                                        }
                                        elseif($document->formatDoc == 'xlsx'){
                                            $image = 'excel-1.png';
                                        }
                                        elseif($document->formatDoc == 'csv'){
                                            $image = 'csv-1.png';
                                        }
                                        elseif($document->formatDoc == 'xml'){
                                            $image = 'xml-2.png';
                                        } elseif($document->formatDoc == 'zip' || $document->formatDoc == 'rar' ){
                                            $image = 'zip.jpg';
                                        }elseif ($document->formatDoc == 'pptx') {
                                            $image = 'pptx.jpg';
                                        }
                    
                                 
                                    @endphp

                                            <td class="d-flex justify-content-center">
                                                <div class="card" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="{{ asset('assets/img/'.$image) }}"
                                                                class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{$document->nomDoc.'.'.$document->formatDoc}}</h5>
                                                                <p class="card-text"><small class="text-muted">{{$document->dateVersion}}</small></p>
                                                                <p class="card-text"> <span class="badge bg-primary">Version {{$document->numeroVersion}}</span></p>
                                                                <a href="{{route('user.document.search',['document'=>$document])}}" style="text-decoration:none;color:white;" class="btn btn-primary text-center " >Plus d'infos</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{ $documents->links() }}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      
    </section>

@endsection

@section('js')

    <script src="{{ asset('assets/user/js/side_js.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

@endsection
