<?php

namespace App\Http\Livewire;


use Livewire\Component;

use Illuminate\Support\Facades\DB;

class AddToCategory extends Component
{

    public $mail;
    public  $category;

    public function addMailToCategory(){
      
        $isAdding = DB::table('category_mails')->where('category_id',$this->category)->where('mail_id',$this->mail)->exists();

        if ($isAdding == true){
                $delete = DB::table('category_mails')->where('category_id',$this->category)->where('mail_id',$this->mail)->delete();
        }else{
           $add = DB::table('category_mails')->insert(['category_id'=>$this->category,'mail_id'=>$this->mail,'dateAjout'=>date('Y-m-d')]);
        }
    }
    public function render()
    {
        return view('livewire.add-to-category');
    }
}
