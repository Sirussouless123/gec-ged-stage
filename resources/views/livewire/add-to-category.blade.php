       @php
            $isAdding = DB::table('category_mails')->where('category_id',$this->category)->where('mail_id',$this->mail)->exists();
       @endphp
      <button class="btn btn-primary" wire:click="addMailToCategory">{{ $isAdding == true ? 'Ajouté' : ' Ajouter '}}</button>
