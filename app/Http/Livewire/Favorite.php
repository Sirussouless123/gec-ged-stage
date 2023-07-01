<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Favorite extends Component
{

    public function test(){
        dd('yo');
    }
    public function render()
    {
        return view('livewire.favorite');
    }
}
