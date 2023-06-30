@extends('layouts.app')

@section('title', 'Documents')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}" />

@endsection
@section('content')

<div class="container-fluid my-3">
    <div class="row g-5">
      <div class="  col-lg-4 col-md-6 ">
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
                <div class="icone">
                    <a href="{{ route('user.document.edit', ['document' => $document]) }}"
                        style="text-decoration:none;color : white; " class='bx bxs-folder'>
                    </a>
                    <a href="{{ route('user.downloading',['document'=>$document])}}" style="text-decoration:none;color : white; " class='bx bxs-download'>
                    </a>
                    <form action="{{ route('user.document.destroy', ['document' => $document]) }}" method="post" style>
                        @csrf
                        @method('delete')
                        <button class='bx bxs-trash' style=" background: none;
                        color: white;
                        border: none;
                        padding: 0;
                        font: inherit;
                        cursor: pointer;
                        outline: inherit; "> </button>
                    </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>


@endsection

@section('js')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
@endsection
