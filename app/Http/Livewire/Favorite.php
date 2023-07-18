<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Favorite extends Component
{

    public  $mail;
    public $favorite ;
    
   
    
    public function changeState(){
        $verif = DB::table('category_mails')->where('mail_id',$this->mail)->where('category_id',$this->favorite)->exists();
       if ($verif == false){
           
             $add  = DB::table('category_mails')->insert([
                'category_id'=>$this->favorite,
                'mail_id'=>$this->mail,
                'dateAjout'=>date('Y-m-d'),
             ]);    

                }else{
            $delete  = DB::table('category_mails')->where('mail_id',$this->mail)->where('category_id',$this->favorite)->delete();
         }
       
      
       }
    public function render()
    {
        return view('livewire.favorite');
    }
}
