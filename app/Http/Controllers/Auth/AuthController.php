<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show(){
        return view('user.register');
    }

    public function showLogin(){
        return view('user.login');
    }
}
