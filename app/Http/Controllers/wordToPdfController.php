<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class wordToPdfController extends Controller
{
    public function index(){
        return view('user.document.wordPdf');
    }

    public function convert(Request $request){
      
        $file = $request->text1;
        $destinationPath = $request->text2;
        $filename = $request->text3;


        $dompdfPath = base_path('vendor/dompdf/dompdf');

        \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
       
        $content = \PhpOffice\PhpWord\IOFactory::load($file);

        $pdfwritter = \PhpOffice\PhpWord\IOFactory::createWriter($content,'PDF');
    
        $pdfwritter->save($destinationPath.'/'.$filename.'.pdf');
       
        return response()->download($destinationPath.'/'.$filename.'.pdf',$filename.'.pdf');
  

    }
    public function convertMail(Request $request){
      
        $file = $request->text1;
        $destinationPath = $request->text2;
        $filename = $request->text3;
        $realfilename = explode('.',$filename);
       
        $dompdfPath = base_path('vendor/dompdf/dompdf');

        \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
       
        $content = \PhpOffice\PhpWord\IOFactory::load($file);

        $pdfwritter = \PhpOffice\PhpWord\IOFactory::createWriter($content,'PDF');
    
        $pdfwritter->save($destinationPath.'/'.$realfilename[0].'.pdf');
       
        return response()->download($destinationPath.'/'.$realfilename[0].'.pdf',$realfilename[0].'.pdf');
  

    }
}
