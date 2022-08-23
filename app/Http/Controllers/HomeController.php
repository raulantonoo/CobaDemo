<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    //          CONTROLLER BUAT HALAMAN LOGIN
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     
    public function index()
    {
        if (\Auth::user()->role == 1) {
            return view('home');
            # code...
        }
        else{
            return view('user');
        }
        

        // if (\Auth::user()->role == 3) {
        //     return view('user');
        //     # code...
        // } else {
        //     # code...
        //     return view('user.user');
        // }

        //  dd(\Auth::user());
        // }
        }
}
