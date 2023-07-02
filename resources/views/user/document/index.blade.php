@extends('layouts.app')

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
                              
                    <button class="button-7 " role="button" @click="option = !option" >Options</button>
                    <div x-show="option" x-cloak>
                        <div class="d-flex   justify-content-between my-2 gap-5 ">

                            <a href="{{ route('user.mail.edit', ['mail' => $document->idDoc]) }}"
                                style="text-decoration:none;color : black; " class='bx bxs-folder mt-1'>
                            </a>



                            <a href="{{ route('user.downloadingmail', ['mail' => $document->idDoc]) }}"
                                style="text-decoration:none;color : black; " class='bx bxs-download mt-1'>
                            </a>

                            <form action="{{ route('user.mail.destroy', ['mail' => $document->idDoc]) }}"
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
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
@endsection
