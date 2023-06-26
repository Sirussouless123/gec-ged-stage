<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getRouteKeyName(){
           return 'idMail';
    }
}
