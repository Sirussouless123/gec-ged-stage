<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomCat',
        'user_id',
    ];

    public function getRouteKeyName(): string
    {
        return 'idCat';
    }

    public function mails(){
        return $this->belongsToMany('App\Models\Mails');
    }
}
