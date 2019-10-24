<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loginForm');
    }

    public function mymail()
    {
        $name = 'Aman Ullah';
        Mail::to('bsef15m527@pucit.edu.pk')->send(new SendMailable($name));

        return 'Email was sent';
    }


}
