@extends('layouts.app')

@section('title', 'Courriers')

@section('content')


  <div class="row">


      <div class="delib my-5 ">
  
          @foreach ($mails as $mail)
         
              <div class="trim  ">
                  <div class="icone">
                      <span >Date et heure  : {{ $mail->dateDepot }}- {{ $mail->heureDepot }}</span>
                        
                  </div>
                  <div class="info">
                      <h3>Nom :</h3>
                      <h3>{{ $mail->nomMail }}</h3>
                      <a href="{{ route('user.mail.edit', ['mail' => $mail]) }}"
                          style="text-decoration:none;color : black; " class='bx bxs-folder'>
                      </a>
                      {{-- {{ route('user.downloading.mail',['mail'=>$mail])}} --}}
                      <a href="#" style="text-decoration:none;color : black; " class='bx bxs-download'>
                      </a>
                      <form action="{{ route('user.mail.destroy', ['mail' => $mail]) }}" method="post" class="pb-3">
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
