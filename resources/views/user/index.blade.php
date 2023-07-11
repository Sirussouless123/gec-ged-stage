{{-- @extends('layouts.app')

@section('title','Accueil')
@section('links')

<link rel="stylesheet" href="{{ asset('assets/css/Accueil.css')}}" />
@endsection

@section('content')
<div class="head">
    <h1>Bienvenue chez nous</h1>
    <img src="{{ asset('assets/img/Online document-rafiki.svg')}}" class="img" />
    <img src="{{ asset('assets/img/Envelope-amico.svg')}}" class="img" />
  </div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Accueil')
@section('content')
<div class="slider-area ">
  <div class="slider-active">
      <div class="single-slider slider-height d-flex align-items-center"
          data-background="{{asset('assets/user/img/hero/h1_hero.png')}}">
          <div class="container">
              <div class="row d-flex align-items-center">
                  <div class="col-lg-7 col-md-9 ">
                      <div class="hero__caption">
                          <h1 data-animation="fadeInLeft" data-delay=".4s">Gérez facilement <br> vos documents et courriers 
                          </h1>
                          <p data-animation="fadeInLeft" data-delay=".6s">L'application vous permet de garder vos documents en sécurité et de les retrouver quand vous voulez </p>

                          <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                              <a href="{{route('login')}}" class="btn hero-btn">Commencer</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                          <img src="{{asset('assets/user/img/hero/doc.svg')}}" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="single-slider slider-height d-flex align-items-center"
          data-background="{{asset('assets/user/img/hero/h1_hero.png')}}">
          <div class="container">
              <div class="row d-flex align-items-center">
                  <div class="col-lg-7 col-md-9 ">
                      <div class="hero__caption">
                          <h1 data-animation="fadeInLeft" data-delay=".4s">Gérez facilement <br> vos documents et courriers 
                          </h1>
                          <p data-animation="fadeInLeft" data-delay=".6s">L'application vous permet de garder vos documents et courriers en sécurité et de les retrouver quand vous voulez</p>

                          <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                              <a href="{{route('login')}}" class="btn hero-btn">Commencer</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="hero__img d-none d-lg-block" data-animation="fadeInRight"
                          data-delay="1s">
                          <img src="{{asset('assets/user/img/hero/mail.svg')}}" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="what-we-do we-padding">
  <div class="container">

    <div class="row d-flex justify-content-center">
      <div class="col-lg-8">
        <div class="section-tittle text-center">
          <h2>Ce Que Vous Pouvez Faire avec L'application ​</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="single-do text-center mb-30">
          <div class="do-icon">
            <span class="flaticon-tasks"></span>
          </div>
          <div class="do-caption">
            <h4>Gestion des documents</h4>
            <p>Vous pouvez enregistrer vos documents,les modifier,les supprimer ainsi que les classer selon des types(Que vous définissez).Vous pouvez également télécharger vos documents</p>
          </div>
          <div class="do-btn">
            <a href="{{route('login')}}"><i class="ti-arrow-right"></i>Commencer</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-do active text-center mb-30">
          <div class="do-icon">
            <span class="flaticon-social-media-marketing"></span>
          </div>
          <div class="do-caption">
            <h4>Gestion des courriers</h4>
            <p>De la même manière que les documents, vous pouvez enregistrer vos courriers, les modifier et les supprimer. Les courriers sont également téléchargeables </p>
          </div>
          <div class="do-btn">
            <a href="{{route('login')}}"><i class="ti-arrow-right"></i>Commencer</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-do text-center mb-30">
          <div class="do-icon">
            <span class="flaticon-project"></span>
          </div>
          <div class="do-caption">
            <h4>Classification des documents et courriers </h4>
            <p> Les documents sont enregistrés par version, par type et par service.Les courriers peuvent être classés par catégorie. On peut également retrouver les courriers par service</p>
          </div>
          <div class="do-btn">
            <a href="{{route('login')}}"><i class="ti-arrow-right"></i>Commencer</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection