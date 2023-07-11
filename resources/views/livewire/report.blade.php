<span @click=" $wire.changeState() " style="cursor: pointer">
    @php
    $verif = DB::table('category_mails')->where('mail_id',$mail)->where('category_id',$report)->exists();
  
@endphp
<svg xmlns="http://www.w3.org/2000/svg" fill="{{ $verif == true ? 'black' : 'white' }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 28px; height : 22px; ">
    <path stroke-linecap="round" fill-rule="{{ $verif == true ? 'evenodd' : '' }}"  chip-rule="{{ $verif == true ? 'evenodd' : '' }}" stroke-linejoin="round" d="{{ $verif == true ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z' : 'M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z' }}" />
  </svg>

  
    </span>
 
    


      