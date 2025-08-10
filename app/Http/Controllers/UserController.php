<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;

class UserController extends Controller
{
    public function Dashboard()
    {
        // if (Auth::check()) {
        //     if (Auth::user()->user_type == 'admin') {
        //         return view('admin.dashboard');
        //     }

        //     if (Auth::user()->user_type == 'user') {
        //         return view('dashboard');
        //     }

        // } else {
        //     return redirect()->route('login');  // redirect guests to login page
        // }

        // return abort(403, 'Unauthorized action.');
        return view('admin.dashboard');
        // return view('dashboard');
        // return view('index');
    }

    public function Index(){
        $doctors = Doctor::all();
        return view('index', compact('doctors'));
    }
    public function viewDoctors(){
        $doctors = Doctor::all();
        return view('doctors', compact('doctors'));
    }
    public function MakeAppointment(Request $request){
        $appointment = new Appointment();
        $appointment->full_name=$request->full_name;
        $appointment->email=$request->email;
        $appointment->submission_date=$request->submission_date;
        $appointment->department=$request->department;
        $appointment->number=$request->number;
        $appointment->message=$request->message;

        $appointment->save();

        return redirect()->back()->with('success', 'Appointment request submitted successfully.');
    }
}
