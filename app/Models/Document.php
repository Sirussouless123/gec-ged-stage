<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomDoc',
        'formatDoc',
        'dateVersion',
        'numeroVersion',
        'taille',
        'type',
        'service_id',
        'user_id',
        'description'
    ];

    public function getRouteKeyName(): string
    {
        return 'idDoc';
    }
}
