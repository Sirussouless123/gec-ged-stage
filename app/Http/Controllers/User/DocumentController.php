<?php

namespace App\Http\Controllers\User;

use App\Models\Service;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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

        
        $verif = DB::table('documents')->where('numeroVersion',$data['numeroVersion'])->where('nomDoc',$data['nomDoc'])->exists();

        if ( $verif == true){
            return to_route('user.document.create')->with('fail', 'Changez la version du document ');
        }else{
            $document->storeAs('doc_'.session('loginId'), $data['nomDoc'].'-version-'.$data['numeroVersion'].".".$format,'public');

     
            $create = Document::create([
                'nomDoc'=>$data['nomDoc'],
                'formatDoc'=>$format,
                'dateVersion'=>$dateVersion,
                'numeroVersion'=>$data['numeroVersion'],
                'taille'=>$taille,
                'type'=>$data['type'],
                'service_id'=>$data['service_id'],
                'user_id'=>session('loginId'),
                'description'=>$data['description'],
            ]);
            if ($create->exists()){
                return to_route('user.document.index');
            }
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
    public function edit(Document $document)
    {
        $services = Service::all();
         return view('user.document.form',[
            'document'=>$document,
            'services'=>$services,
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Document $document ,DocumentRequest $request)
    {

           $data = $request->validated();
          
           $documentUpdate = $request->validated('document');
            $format = $documentUpdate->getClientOriginalExtension();
            $taille = $documentUpdate->getSize();
            $date = date('Y-m-d');
           $oldname = $document->nomDoc.'-version-'.$data['numeroVersion'].'.'.$format;
           if (Storage::disk('public')->exists('doc_'.session('loginId').'/'.$oldname) == true) {
            Storage::disk('public')->delete('doc_'.session('loginId').'/'.$oldname);
           }
       
           
           
            $documentUpdate->storeAs('doc_'.session('loginId'), $data['nomDoc']."-version-".$data['numeroVersion'].'.'.$format,'public');
            
            $update = DB::table('documents')->where('idDoc','=',$document->idDoc)->update([
             'nomDoc'=>$data['nomDoc'],
             'formatDoc'=>$format,
             'dateVersion'=>$date,
             'numeroVersion'=>$data['numeroVersion'],
             'taille'=>$taille,
             'type'=>$data['type'],
             'service_id'=>$data['service_id'],
             'user_id'=>session('loginId'),
             'description'=>$data['description'],
            ]);
            
            if ($update == 1 ){
                   return to_route('user.document.index');
            }
        }
        
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {

        
        $name = $document->nomDoc.'-version-'.$document->numeroVersion.'.'.$document->formatDoc;
     
        if(Storage::disk('public')->exists('doc_'.session('loginId').'/'.$name) == true){
            Storage::disk('public')->delete('doc_'.session('loginId').'/'.$name);
        }

  
            $delete =  DB::table('documents')->where('idDoc',$document->idDoc)->delete(); 
    
            if ($delete == 1 ){
    
                return to_route('user.document.index');
            }else{
                return to_route('user.document.index');
            }
        }
    

    public function download(Document $document){
       
                 $name = $document->nomDoc.'-version-'.$document->numeroVersion.'.'.$document->formatDoc;
                 $path = 'storage/doc_'.session('loginId');
                 return response()->download(public_path($path.'/'.$name), $name);
            
    }

    public function showSearch(Document $document){
        return view('user.document.show',[
         'document'=>$document,
        ]);
  }
}
