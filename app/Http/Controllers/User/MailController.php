<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\MailRequest;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
       
       
        $mails =  Mail::online()->latest()->get();
        

        return view('user.mail.index',[
            'mails'=>$mails,
              
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('user.mail.form',
             [ 'mail'=>new Mail, 'services'=>Service::all() , ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MailRequest $request)
    {
         /** @var UploadedFile  $document*/
         $document = $request->validated('document');
         $format = $document->getClientOriginalExtension();
         $taille = $document->getSize();
         $date = date('Y-m-d');
         $heure = now();
 
         $data = $request->validated();
 
             $document->storeAs('cour_'.session('loginId'), $data['nomMail'].".".$format,'public');
 
 
             $create = Mail::create([
                 'nomMail'=>$data['nomMail'],
                 'formatMail'=>$format,
                 'dateDepot'=>$date,
                 'heureDepot'=>$heure,
                 'service_id'=>$data['service_id'],
                 'user_id'=>session('loginId'),
             ]);
             if ($create->exists()){
                 return to_route('user.mail.index');
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
    public function edit(Mail $mail)
    {
          return view('user.mail.form',[
            'mail'=>$mail,
            'services'=>Service::all(),
          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Mail $mail, MailRequest $request)
    {
       
        $data = $request->validated();
     
        $documentUpdate = $request->validated('document');
         $format = $documentUpdate->getClientOriginalExtension();
         $date = date('Y-m-d');
         $heure = now();
        $oldname = $mail->nomMail.'.'.$format;
      
        if (Storage::disk('public')->exists('cour_'.session('loginId').'/'.$oldname) == true){
            Storage::disk('public')->delete('cour_'.session('loginId').'/'.$oldname);
        }
          
           
           $documentUpdate->storeAs('cour_'.session('loginId'), $data['nomMail'].".".$format,'public');
           
           $update = DB::table('mails')->where('idMail',$mail->idMail)->update([
               'nomMail'=>$data['nomMail'],
               'formatMail'=>$format,
               'dateDepot'=>$date,
               'heureDepot'=>$heure,
               'service_id'=>$data['service_id'],
               'user_id'=>session('loginId'),
           ]);

        
           if ($update == 1 ){
                  return to_route('user.mail.index');
           }else{
            return to_route('user.mail.index');
           }
        }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        $name = $mail->nomMail.'.'.$mail->formatMail;

        if(Storage::disk('public')->exists('cour_'.session('loginId').'/'.$name) == true){
            Storage::disk('public')->delete('cour_'.session('loginId').'/'.$name);
        }

           
            $delete =  DB::table('mails')->where('idMail',$mail->idMail)->delete(); 
    
            if ($delete == 1 ){
    
                return to_route('user.mail.index');
            }else{
                return to_route('user.mail.index');
            }
        }

        public function download(Mail $mail){
            $name = $mail->nomMail.'.'.$mail->formatMail;
            $path = 'storage/cour_'.session('loginId');
            return response()->download(public_path($path.'/'.$name), $name);
        }
        

        public function showFavorites(){
            $favorite = DB::table('categories')->where('nomCat','Favoris')->first();
       
            
            $favorites = DB::table('mails')->join('category_mails','category_mails.mail_id','=','mails.idMail')->where('category_mails.category_id',$favorite->idCat)->where('category_mails.user_id',session('loginId'))->select('mails.*')->get();

           
            return view('user.mail.favorites',[
                'mails'=>$favorites,
            ]);
        }

     public function showImportants(){
        $report = DB::table('categories')->where('nomCat','Importants')->first();
        $importants = DB::table('mails')->join('category_mails','category_mails.mail_id','=','mails.idMail')->where('category_mails.category_id',$report->idCat)->where('category_mails.user_id',session('loginId'))->select('mails.*')->get();
        return view('user.mail.importants',[
            'mails'=>$importants,
        ]);
     }

     public function showSearch(Mail $mail){
           return view('user.mail.show',[
            'mail'=>$mail,
           ]);
     }
}


