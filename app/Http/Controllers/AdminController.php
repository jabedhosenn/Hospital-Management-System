<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addDoctors()
    {
        return view('admin.add_doctors');
    }

    public function postAddDoctors(Request $request)
    {
        $doctor = new Doctor();
        $doctor->doctors_name = $request->doctors_name;
        $doctor->doctors_phone = $request->doctors_phone;
        $doctor->speciality = $request->speciality;
        $doctor->department = $request->department;
        $doctor->room_number = $request->room_number;

        $image = $request->file('doctors_image');  // get the uploaded file correctly

        if ($image) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $doctor->doctors_image = $image_name;
        }

        $doctor->save();

        if ($image) {
            // Move the file using $image, not $request->doctor_image
            $image->move(public_path('images'), $image_name);
        }

        return redirect()->back()->with('success', 'Doctor added successfully!');
    }
}
