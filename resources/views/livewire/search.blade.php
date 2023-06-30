<div class="menu-link position-relative " x-data="{open:false}">
    <li class="search-box">
      <i class="bx bx-search icon"></i>
      <input  placeholder="Search........" @click= " open = true" @click.away=" open=false" wire:model= "search"/>
    </li>
@if (strlen($search) > 0)
  <div class="position-absolute w-100   search-style"  style="z-index: 200;background-color: #fff;" x-show="open">
 <div class="d-flex gap-4">

    <p class="material-symbols-sharp "
    style=" color: #0d6efd;">folder_open</p>
     <h6  style="color : #707070;" >Documents</h6>
 </div>
          @if(count($documents) > 0)
             @foreach ($documents as $document)
                     <p style="color : #707070;" >
                        <a href="{{route('user.document.search',['document'=>$document])}}"  >
                              {{ $document->nomDoc}}
                        </a>
                     </p>
             @endforeach
             @else
             <p style="color : #707070;" >Aucune correspondance</p>
          @endif
          <div class="d-flex gap-4">
            <p class="material-symbols-sharp "
            style=" color: #0d6efd;">dynamic_feed</p>
             <h6  style="color : #707070;" >Courriers</h6>
         </div>
          @if(count($mails) > 0)
          @foreach ($mails as $mail)
                  <p style="color : #707070;" >
                     <a href="{{route('user.mail.search',['mail'=>$mail])}}">
                           {{ $mail->nomMail}}
                     </a>
                  </p>
          @endforeach
          @else
          <p style="color : #707070;" >Aucune correspondance</p>
       @endif
    </div>
    @endif

</div>