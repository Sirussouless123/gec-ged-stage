@extends('layouts.app')

@section('title', 'Documents')

@section('content')

   
<div class="delib my-5 ">
            
              @foreach ($documents as $document)
              
                  <div class="trim ">
                      <div class="icone">
                          <span class="material-symbols-sharp">folder_open</span>
                      </div>
                     
        
                      <div class="info">
                          <h3>Nom  : </h3>
                          <h3>{{ $document->nomDoc.".".$document->formatDoc}}</h3>
                              {{-- <a href="{{route('user.document.edit',['document'=>$document])}}" class='bx bxs-download text-underline-none'>
                                
                                <a> --}}
                        
                      </div>
                  </div>  
              
              
              @endforeach
            
        
</div>
     

@endsection
