<?php

namespace App\Http\Controllers\User;

use App\Models\Service;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\DocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return view('user.document.index',[
            'documents'=>$documents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
          return view('user.document.form',[
            'document'=> new  Document,
            'services'=>$services,
          ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(DocumentRequest $request)
    {
        /** @var UploadedFile  $document*/
        $document = $request->validated('document');
        $format = $document->getClientOriginalExtension();
        $taille = $document->getSize();
        $dateVersion = date('Y-m-d');

        $data = $request->validated();

        $document->storeAs('doc_'.session('loginId'), $data['nomDoc'].".".$format,'public');

        $create = Document::create([
            'nomDoc'=>$data['nomDoc'],
            'formatDoc'=>$format,
            'dateVersion'=>$dateVersion,
            'numeroVersion'=>$data['numeroVersion'],
            'taille'=>$taille,
            'type'=>$data['type'],
            'service_id'=>$data['service_id'],
            'user_id'=>session('loginId'),
        ]);
        if ($create->exists()){
            return to_route('user.document.index');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
