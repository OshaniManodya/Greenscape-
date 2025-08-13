<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function showForm()
    {
        return view('appointments.book'); // create this blade file
    }

    public function submit(Request $request)
    {
        // Handle the appointment booking logic here
        return redirect()->route('appointments.book')->with('success', 'Appointment booked!');
    }
}

