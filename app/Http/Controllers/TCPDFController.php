<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Mail;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;

class TCPDFController extends Controller
{

    public int $count = 1;

    public function __construct(){
        $this->count +=1; 
    }
    public function downloadPdf(User $user, Document $document, Request $request)
    {

        #  dd($document->getPath($document),$document,$user);
        if ($document->formatDoc == 'pdf') {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($document->getPathFile($document));
            
            $text = $pdf->getText();
            $convert = '' . $text . '';
            $infos = $document->getPath($document);
            $certificate = 'file://' . base_path() . '/storage/app/certificate/gedgec.crt';
            // set additional information in the signature
            $info = array(
                'Name' => $user->nom . ' ' . $user->prenom,
                'Location' => $user->villeNaissance,
                'Reason' => 'Sign',
                'ContactInfo' => '',
            );

            PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);
            PDF::SetFont('helvetica', '', 12);
            PDF::SetCreator('GED-GEC');
            PDF::SetTitle($document->nomDoc);
            PDF::SetAuthor($user->nom);
            PDF::SetSubject('Generated signature');
            PDF::AddPage();



            PDF::writeHTML($convert, true, false, true, false, '');


            PDF::Output(public_path('storage/doc_' . session('loginId') . '/' . $infos['name'] . '-signed-'.$this->count.'-pdf.pdf'), 'F');


            PDF::reset();
          

            return response()->download(public_path('storage/doc_' . session('loginId') . '/' . $infos['name'] . '-signed-'.$this->count.'-pdf.pdf'),$infos['name'] . '-signed-pdf.pdf');
           
                    
        } else {
            return to_route('user.document.index');
        }
    }
    public function downloadMail(User $user, Mail $mail, Request $request)
    {
      
        if ($mail->formatMail == 'pdf') {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($mail->getPathFile($mail));
            $text = $pdf->getText();
            $convert = '' . $text . '';
            $infos = $mail->getPath($mail);
            $certificate = 'file://' . base_path() . '/storage/app/certificate/gedgec.crt';
            // set additional information in the signature
            $info = array(
                'Name' => $user->nom . ' ' . $user->prenom,
                'Location' => $user->villeNaissance,
                'Reason' => 'Sign',
                'ContactInfo' => '',
            );

            PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);
            PDF::SetFont('helvetica', '', 12);
            PDF::SetCreator('GED-GEC');
            PDF::SetTitle($mail->nomMail);
            PDF::SetAuthor($user->nom);
            PDF::SetSubject('Generated signature');
            PDF::AddPage();



            PDF::writeHTML($convert, true, false, true, false, '');


            PDF::Output(public_path('storage/cour_' . session('loginId') . '/' . $infos['name'] . '-signed-'.$this->count.'-pdf.pdf'), 'F');

            PDF::reset();
           
            return response()->download(public_path('storage/cour_' . session('loginId') . '/' . $infos['name'] . '-signed-'.$this->count.'-pdf.pdf'),$infos['name'] . '-signed-pdf.pdf');
           
             
         
        } else {
            return to_route('user.mail.index');
        }
    }
}
