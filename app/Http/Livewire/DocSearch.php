<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DocSearch extends Component
{
    public $search;

    public $results = [];

    public function updatedSearch(){
        
        if (strlen($this->search) > 0){
            $word = '%'.$this->search.'%';
              $this->results = Document::where('nomDoc','like',$word)->where('user_id',session('loginId'))->orwhere('description','like',$word)->get();
        }
    }
    public function render()
    {
        return view('livewire.doc-search');
    }
}
