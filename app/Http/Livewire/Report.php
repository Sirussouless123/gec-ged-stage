<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Report extends Component
{

    public  $mail;
    public $report;


    public function changeState()
    {
        $verif = DB::table('category_mails')->where('mail_id', $this->mail)->where('category_id', $this->report)->exists();
        if ($verif == false) {
            $add  = DB::table('category_mails')->insert([
                'category_id' => $this->report,
                'mail_id' => $this->mail,
                'dateAjout' => date('Y-m-d'),
            ]);
        } else {

            $delete  = DB::table('category_mails')->where('mail_id', $this->mail)->where('category_id', $this->report)->delete();
        }
    }

    public function render()
    {
        return view('livewire.report');
    }
}
