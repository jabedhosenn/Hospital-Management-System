<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard');
    }
}
