<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SideNavController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //For the student side navigation
    public function studentAppointment()
    {
        return view('sideNav.student.appointment');
    }
    public function studentRecord()
    {
        return view('sideNav.student.record');
    }

    //For the staff side navigation
    public function staffAppointment()
    {
        return view('sideNav.staff.appointment');
    }
    public function staffRecord()
    {
        return view('sideNav.staff.record');
    }

    //For the clinic side navigation
    public function appointment()
    {
        return view('sideNav.appointment');
    }
    public function record()
    {
        return view('sideNav.record');
    }
    public function storage()
    {
        return view('sideNav.storage');
    }

}