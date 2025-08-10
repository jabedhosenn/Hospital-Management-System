<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

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

    public function viewDoctors(){
        $doctors = Doctor::all();
        return view('admin.view_doctors', compact('doctors'));
    }

    public function updateDoctors($id){
        $doctor = Doctor::findOrFail($id);
        return view('admin.update_doctors', compact('doctor'));
    }
    public function postUpdateDoctors(Request $request, $id){
        $doctor = Doctor::findOrFail($id);

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

        return redirect()->back()->with('success', 'Doctor updated successfully!');
    }
    public function deleteDoctors($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->back()->with('success', 'Doctor deleted successfully!');
    }

    public function viewAppointments(){
        $appointments = Appointment::all();
        return view('admin.view_appointments', compact('appointments'));
    }

   public function changeStatus(Request $request, $id)
{
    // Validate input, ensure 'status' is present and valid
    $request->validate([
        'status' => 'required|in:pending,approved,cancelled',
    ]);

    $appointment = Appointment::findOrFail($id);

    // Use the correct input name from the form ('status'), not 'changestatus'
    $appointment->status = $request->input('status');
    $appointment->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Appointment status updated successfully!');
}

}
