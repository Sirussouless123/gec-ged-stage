<div class="position-relative" x-data={menusearch:false}>                                         
    
    <input type="text" placeholder="Rechercher ici " @click="menusearch = !menusearch " @click.away="menusearch=false" wire:model="search" >
    @if (strlen($search) > 0 )
                    
    <div class="position-absolute w-100 search-style " style="z-index: 100" x-show="menusearch" >
        @if (count($results) > 0)
              @foreach ($results as $result)
                  <p class="text-md-center fs-5">
                    <a href="{{ route('user.document.search',['document'=>$result]) }}">{{$result->nomDoc}}</a>
                    <span class=" badge bg-primary">version {{$result->numeroVersion}}</span>
                  </p>
              @endforeach
              @else
              <p>Aucune correspondance</p>
        @endif
    </div>
    @endif
 </div>