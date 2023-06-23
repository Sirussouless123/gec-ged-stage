<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomSer',
        'department_id',
    ];

    public function getRouteKeyName(): string
    {
        return 'idSer';
    }
}
