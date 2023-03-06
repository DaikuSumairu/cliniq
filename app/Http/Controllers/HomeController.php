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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function studentHome()
    {
        return view('student_apcHome');
    }
    
    public function staffHome()
    {
        return view('staff_apcHome');
    }
    
    public function clinicHome()
    {
        return view('clinicHome');
    }
}
