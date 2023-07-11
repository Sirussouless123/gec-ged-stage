{{-- @extends('layouts.app')

@section('title', 'Courriers')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}" />
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


    <div class="container-fluid my-3">


        <div class="row g-5">

            @foreach ($mails as $mail)
                <div class="  col-lg-4 col-md-6 ">
                    <div class="card ">


                        <div class="image-content">
                            <span class="overlay"></span>
                            @php
                                $image = 'text-3.png';
                                if ($mail->formatMail == 'pdf') {
                                    $image = 'pdf-1.png';
                                } elseif ($mail->formatMail == 'docx') {
                                    $image = 'word-1.png';
                                } elseif ($mail->formatMail == 'xlsx') {
                                    $image = 'excel-1.png';
                                } elseif ($mail->formatMail == 'csv') {
                                    $image = 'csv-1.png';
                                } elseif ($mail->formatMail == 'xml') {
                                    $image = 'xml-2.png';
                                }
                            @endphp

                            <div class="card-image">
                                <img src="{{ asset('assets/img/' . $image) }}" alt="" class="card-img" />
                            </div>

                        </div>



                        <div class="card-content">
                            <h2 class="name">Mail</h2>

                            <p>Nom : {{ $mail->nomMail }}</p>
                            <div x-data="{ option: false }">
                              
                                <button class="button-7 " role="button" @click="option = !option">Options</button>
                                <div x-show="option">
                                    <div class="d-flex   justify-content-between my-2 gap-5 ">

                                        <a href="{{ route('user.mail.edit', ['mail' => $mail->idMail]) }}"
                                            style="text-decoration:none;color : black; " class='bx bxs-folder mt-1'>
                                        </a>



                                        <a href="{{ route('user.downloadingmail', ['mail' => $mail->idMail]) }}"
                                            style="text-decoration:none;color : black; " class='bx bxs-download mt-1'>
                                        </a>

                                        <livewire:favorite :mail="$mail->idMail" :favorite="$favorite->idCat" />
                                            <livewire:report :mail="$mail->idMail" :report="$report->idCat" />
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

@section('title', 'Courriers')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/user/css/boxicons-2.1.4/boxicons-2.1.4/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/doc.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/subnav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <script src="{{ asset('assets/user/js/jquery-3.7.0.min.js') }}"></script>
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
                            <a class="btn btn-outline-primary text-md-center " aria-current="page" href="{{route('user.mail.create',['mail'=>$newMail])}}">Ajouter
                                courrier</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-md-start" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <i class="fa-solid fa-list fa-lg"></i>
                                Ranger par
                            </a>
                            <ul class="dropdown-menu " >
                                <li><a class="dropdown-item " href="{{route('user.mail.showFormat',['format'=>'recents'])}}">Courriers récents</a></li>
                                <li><a class="dropdown-item " href="{{route('user.mail.showFormat',['format'=>'anciens'])}}">Courriers anciens</a></li>
                                <li><a class="dropdown-item " href="{{route('user.mail.showFormat',['format'=>'format'])}}">Par format </a></li>
                                <li><a class="dropdown-item" href="{{route('user.mail.showFormat',['format'=>'service'])}}">Par service</a></li>
                            </ul>
                           

                    </ul>
                    <div class=" d-flex  justify-content-start">
                        <input class="form-control  " type="search" placeholder="Search" aria-label="Search">


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
                        <div class="email-sidebar pt-3">
                            <h4>Menu</h4>
                            @php 
                                  $route = request()->route()->getName();
                            @endphp 
                            <ul class="text-start">
                                <li class="{{str_contains($route,'index') ?  'active' : ''}}"><a href="{{route('user.mail.index')}}"><i class="fas fa-inbox"></i> Mails ({{$nbMail}})</a></li>


                            </ul>
                            <ul class="text-start mb-3">
                                <li class="{{str_contains($route,'category') ?  'active' : ''}}">
                                    <a dropdown-toggle href="{{route('user.mail.index')}}"  data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside" ><i class="ti-user"></i> Catégorie de documents ({{$nbCat}})</a>
                                    <ul class="dropdown-menu">
                                       
                                        <li ><a style="color: black " class="dropdown-item" href="{{route('user.mail.category',['category'=>$favorite->idCat])}}">Favoris</a></li>
                                        <li><a style="color: black " class="dropdown-item" href="{{route('user.mail.category',['category'=>$report->idCat])}}">Importants</a></li>
                                      
                                      
                                    </ul>
                                </li>
                            </ul>
                            <ul class="text-start py-3 ">
                                <li class="{{str_contains($route,'service') ?  'active' : ''}}">
                                    <a dropdown-toggle href="{{route('user.mail.index')}}" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside" ><i class="ti-user"></i>Services ({{$nbSer}})</a>
                                    <ul class="dropdown-menu">
                                        @foreach($services as $service)
                                        <li><a class="dropdown-item" style="color: black " href="{{route('user.mail.showService',['service'=>$service])}}">{{$service->nomSer}}</a></li>
                                        @endforeach
                                      
                                    </ul>
                                </li>
                            </ul>


                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="white_box QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Liste des courriers</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                           
                                                <div class="search_field">
                                                   <livewire:search />
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
                                           
                                             @foreach($mails as $mail)
                                        @php
                                        $image ='text-3.png';
                                        if ($mail->formatMail == 'pdf'){
                                            $image = 'pdf-1.png';
                                        }elseif($mail->formatMail == 'docx'){
                                            $image = 'word-1.png';
                                        }
                                        elseif($mail->formatMail == 'xlsx'){
                                            $image = 'excel-1.png';
                                        }
                                        elseif($mail->formatMail == 'csv'){
                                            $image = 'csv-1.png';
                                        }
                                        elseif($mail->formatMail == 'xml'){
                                            $image = 'xml-2.png';
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
                                                                <h5 class="card-title">{{$mail->nomMail.'.'.$mail->formatMail}}</h5>
                                                                <p class="card-text"><small class="text-muted">{{$mail->dateDepot}}</small></p>
                                                                <a href="{{route('user.mail.search',['mail'=>$mail])}}" style="text-decoration:none;color:white;" class="btn btn-primary text-center " >Plus d'infos</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{ $mails->links() }}

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