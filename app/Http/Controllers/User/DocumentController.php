<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Service;
use App\Models\Document;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Break_;
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

        $documents = Document::OrderBy('created_at', 'desc')->where('user_id',session('loginId'))->paginate(2);
        $nbDoc = DB::table('documents')->where('user_id',session('loginId'))->count();
        $types = DB::table('documents')->where('user_id', session('loginId'))->select('documents.type')->distinct()->get();
        $services = Service::all();

        return view('user.document.index', [
            'documents' => $documents,
            'nbDoc' => $nbDoc,
            'types' => $types,
            'nbType' => count($types),
            'newDoc' => new Document,
            'services'=> $services,
            'nbSer'=>count($services),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view(
            'user.document.form',
            [
                'document' => new  Document,
                'services' => $services,
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


        $verif = DB::table('documents')->where('numeroVersion', $data['numeroVersion'])->where('nomDoc', $data['nomDoc'])->where('user_id',session('loginId'))->exists();

        if ($verif == true) {
            return to_route('user.document.create')->with('fail', 'Changez la version du document ');
        } else {
            if ($format == 'pdf' || $format == 'docx' || $format == 'xlsx ' || $format == 'pptx' || $format =='zip' ||$format =='rar' || $format == 'txt' || $format == 'csv' ){
                
                $document->storeAs('doc_' . session('loginId'), $data['nomDoc'] . '-version-' . $data['numeroVersion'] . "." . $format, 'public');
    
    
                $create = Document::create([
                    'nomDoc' => $data['nomDoc'],
                    'formatDoc' => $format,
                    'dateVersion' => $dateVersion,
                    'numeroVersion' => $data['numeroVersion'],
                    'taille' => $taille,
                    'type' => $data['type'],
                    'service_id' => $data['service_id'],
                    'user_id' => session('loginId'),
                    'description' => $data['description'],
                ]);
                if ($create->exists()) {
                    return to_route('user.document.index');
                }
            }else{
                return back()->with('fail','Choisissez un document au format correct(docx,pptx,csv,zip,rar,xlsx,pdf,txt,xml)');
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
        return view('user.document.form', [
            'document' => $document,
            'services' => $services,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Document $document, DocumentRequest $request)
    {
        $data = $request->validated();

        $documentUpdate = $request->validated('document');
        $format = $documentUpdate->getClientOriginalExtension();
        $taille = $documentUpdate->getSize();
        $date = date('Y-m-d');
        $oldname = $document->nomDoc . '-version-' . $data['numeroVersion'] . '.' . $format;
        if (Storage::disk('public')->exists('doc_' . session('loginId') . '/' . $oldname) == true) {
            Storage::disk('public')->delete('doc_' . session('loginId') . '/' . $oldname);
        }

        if ($format == 'pdf' || $format == 'docx' || $format == 'xlsx ' || $format == 'pptx' || $format =='zip' ||$format =='rar' || $format == 'txt' || $format == 'csv' || $format == 'xml'){


            $documentUpdate->storeAs('doc_' . session('loginId'), $data['nomDoc'] . "-version-" . $data['numeroVersion'] . '.' . $format, 'public');
    
            $update = DB::table('documents')->where('idDoc', '=', $document->idDoc)->update([
                'nomDoc' => $data['nomDoc'],
                'formatDoc' => $format,
                'dateVersion' => $date,
                'numeroVersion' => $data['numeroVersion'],
                'taille' => $taille,
                'type' => $data['type'],
                'service_id' => $data['service_id'],
                'user_id' => session('loginId'),
                'description' => $data['description'],
            ]);
    
            if ($update == 1) {
                return to_route('user.document.index');
            }
        }else{

            return back()->with('fail','Choisissez un document au format correct(docx,pptx,csv,zip,rar,xlsx,pdf,txt,xml)');
        }

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {


        $name = $document->nomDoc . '-version-' . $document->numeroVersion . '.' . $document->formatDoc;

        if (Storage::disk('public')->exists('doc_' . session('loginId') . '/' . $name) == true) {
            Storage::disk('public')->delete('doc_' . session('loginId') . '/' . $name);
        }


        $delete =  DB::table('documents')->where('idDoc', $document->idDoc)->delete();

        if ($delete == 1) {

            return to_route('user.document.index');
        } else {
            return to_route('user.document.index');
        }
    }


    public function download(Document $document)
    {

        $name = $document->nomDoc . '-version-' . $document->numeroVersion . '.' . $document->formatDoc;
        $path = 'storage/doc_' . session('loginId');

        return response()->download(public_path($path . '/' . $name), $name);
    }

    public function showSearch(Document $document)
    {
    
     
        $nbDoc = DB::table('documents')->where('user_id',session('loginId'))->count();
        $types = DB::table('documents')->where('user_id', session('loginId'))->select('documents.type')->distinct()->get();
        $services = Service::all();
        return view('user.document.show', [
            'document' => $document,
            'nbDoc' => $nbDoc,
            'types' => $types,
            'nbType' => count($types),
            'newDoc' => new Document,
            'services'=> $services,
            'nbSer'=>count($services),
        ]);
    }


    public function showByType(string $type = '')
    {

        $verif = Document::where('type', $type)->where('user_id', session('loginId'))->exists();

        $documents = null;

        if ($verif == false) {
            $documents = Document::orderBy('created_at', 'desc')->where('user_id', session('loginId'))->paginate(2);
        } else {
            $documents = Document::where('type', $type)->where('user_id', session('loginId'))->paginate(2);
        }



        $nbDoc = DB::table('documents')->where('user_id',session('loginId'))->count();
        $types = DB::table('documents')->where('user_id', session('loginId'))->select('documents.type')->distinct()->get();
        $services = Service::all();

        return view('user.document.index', [
            'documents' => $documents,
            'nbDoc' => $nbDoc,
            'types' => $types,
            'nbType' => count($types),
            'newDoc' => new Document,
            'services'=> $services,
            'nbSer'=>count($services),
        ]);
    }
    public function showByFormat(string $format = '')
    {

        $documents = null;
        switch ($format) {
            case 'recents':

                $documents = Document::orderBy('dateVersion', 'desc')->where('user_id', session('loginId'))->paginate(2);
                break;
            case 'anciens':

                $documents = Document::orderBy('dateVersion', 'asc')->where('user_id', session('loginId'))->paginate(2);
                break;
            case 'format':

                $documents = Document::orderBy('formatDoc', 'asc')->where('user_id', session('loginId'))->paginate(2);
                break;
            case 'service':

                $documents = Document::orderBy('service_id', 'asc')->where('user_id', session('loginId'))->paginate(2);
                break;

            default:
                $documents = Document::orderBy('created_at', 'desc')->where('user_id', session('loginId'))->paginate(2);
                break;
        }

        $nbDoc = DB::table('documents')->where('user_id',session('loginId'))->count();
        $types = DB::table('documents')->where('user_id', session('loginId'))->select('documents.type')->distinct()->get();
        $services = Service::all();
        

        return view('user.document.index', [
            'documents' => $documents,
            'nbDoc' => $nbDoc,
            'types' => $types,
            'nbType' => count($types),
            'newDoc' => new Document,
            'services'=>$services,
            'nbSer'=>count($services),
        ]);
    }

    public function showByService(Service $service){
              $documents = Document::where('service_id',$service->idSer)->where('user_id',session('loginId'))->paginate(2);
              $nbDoc = DB::table('documents')->where('user_id',session('loginId'))->count();
        $types = DB::table('documents')->where('user_id', session('loginId'))->select('documents.type')->distinct()->get();
        $services = Service::all();
        return view('user.document.index', [
            'documents' => $documents,
            'nbDoc' => $nbDoc,
            'types' => $types,
            'nbType' => count($types),
            'newDoc' => new Document,
            'services'=>$services,
            'nbSer'=>count($services),
        ]);
    }

    public function showProfile(User $user){
               


                return view('user.profil',['user'=>$user,'services'=>Service::all()]);
    }
}
