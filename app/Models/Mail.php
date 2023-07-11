<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomMail',
        'formatMail',
        'heureDepot',	
        'dateDepot'	,
        'service_id',
        'user_id',
    ];

    protected $primaryKey = 'idMail';

    public function getRouteKeyName(){
           return 'idMail';
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function scopeOnline($query){
        return $query->where('user_id', session('loginId'));
 }

 public function getPathFile(Mail $mail){
    $name = $mail->nomMail.'.'.$mail->formatMail;
    $path = 'storage/cour_'.session('loginId');

        return public_path($path . '/' . $name);
 }
 public function getPath(Mail $mail){
    $name = $mail->nomMail.'.'.$mail->formatMail;
    $path = 'storage/cour_'.session('loginId');

        return $info = [
            'name'=>$name,
            'path'=>public_path($path),
        ];
 }
  
}
