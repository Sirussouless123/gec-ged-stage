<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function show(){
        $user= DB::table("users")->where('statut',0)->count();
        $document= DB::table("documents")->count();
        $mail= DB::table("mails")->count();
        $department= DB::table("departments")->count();
        $service= DB::table("services")->count();
        $category= DB::table("categories")->count();
     
  return view('admin.index',[
       'user'=>$user,
       'document'=> $document,
       'mail'=>$mail,
       'department'=>$department,
       'service'=>$service,
       'category'=>$category,
       
  ]);
      
    }
}
