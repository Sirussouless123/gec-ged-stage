@extends('layouts.app')

@section('title', 'Documents')

@section('content')


  <div class="row">


      <div class="delib my-5 ">
  
          @foreach ($documents as $document)
         
              <div class="trim  ">
                  <div class="icone">
                      <span >Version : {{ $document->numeroVersion }}</span>
                        
                  </div>
                  <div class="info">
                      <h3>Nom :</h3>
                      <h3>{{ $document->nomDoc }}</h3>
                      <a href="{{ route('user.document.edit', ['document' => $document]) }}"
                          style="text-decoration:none;color : black; " class='bx bxs-folder'>
                      </a>
                      <a href="{{ route('user.downloading',['document'=>$document])}}" style="text-decoration:none;color : black; " class='bx bxs-download'>
                      </a>
                      <form action="{{ route('user.document.destroy', ['document' => $document]) }}" method="post" class="pb-3">
                          @csrf
                          @method('delete')
                          <button class='bx bxs-trash' style="border: none;"> </button>
  
                      </form>
  
  
  
  
  
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
