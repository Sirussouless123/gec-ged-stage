<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Report extends Component
{

    public  $mail;
    public $report;
    public $state;

    public $color;

    public function changeState(){
      
        if ($this->state == false){
              $this->state = true;
              $add  = DB::table('category_mails')->insert([
                 'category_id'=>$this->report,
                 'mail_id'=>$this->mail,
                 'dateAjout'=>date('Y-m-d'),
                 'user_id'=>session('loginId'),
              ]);    
 
         
 
              if ($add == true ){
                   $this->color = 'black';
 
              }
             
        }elseif ($this->state == true){
         $this->state = false;
                     $id = DB::table('category_mails')->where('mail_id',$this->mail)->where('category_id',$this->report)->select('category_mails.id')->first();
            
             $delete  = DB::table('category_mails')->where('id',$id->id)->delete();
         
 
              if ($delete == true ){
                   $this->color = 'white';
              }
          }
        
       
        }

        public function render()
        {
            return view('livewire.report');
        }
}
