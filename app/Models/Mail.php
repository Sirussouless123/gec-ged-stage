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
  
}
