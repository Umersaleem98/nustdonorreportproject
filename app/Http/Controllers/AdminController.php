<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    
    public function sign_in()
    {
        return view('signin');
    }
    
    public function sign_up()
    {
        return view('signup');
    }

}
