<?php

namespace App\Http\Livewire;

use App\Models\Mail;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class Search extends Component
{

    public $search;

   
    public  $results = [] ;

    
 
    public function updatedSearch(){
     
        if (strlen($this->search) >2 ){
         $words= '%'.$this->search.'%';
              $this->results = Mail::where('nomMail','like',$words)->where('user_id',session('loginId'))->get();
        }
    }
    public function render()
    {
        return view('livewire.search');
    }
}
