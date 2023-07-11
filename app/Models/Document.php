<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDoc';
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

    public function scopeOnline($query){
        return $query->where('user_id', session('loginId'));
 }

 public function getPathFile(Document $document){
    $name = $document->nomDoc . '-version-' . $document->numeroVersion . '.' . $document->formatDoc;
        $path = 'storage/doc_' . session('loginId');

        return public_path($path . '/' . $name);
 }
 public function getPath(Document $document){
    $name = $document->nomDoc . '-version-' . $document->numeroVersion;
        $path = 'storage/doc_' . session('loginId');

        return $info = [
            'name'=>$name,
            'path'=>public_path($path),
        ];
 }
}
