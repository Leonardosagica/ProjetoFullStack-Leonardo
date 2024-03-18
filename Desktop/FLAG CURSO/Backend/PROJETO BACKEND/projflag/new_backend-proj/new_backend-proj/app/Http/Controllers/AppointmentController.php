<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Appointments;

class AppointmentController extends Controller
{
   /*  public function index()
    {
        $appointment = Appointments::all();
        return response()->json(['appointment' => $appointment], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
        'specialty' => 'required',
        'date_time' => 'required|date',
        'doctor_id' => 'required|exists:doctors,id',
        'patient_id' => 'required|exists:patients,id',
        ]);

        $appointment = Appointments::create($data);
        return response()->json(['appointment' => $appointment], 201);
    }

    public function show(Appointments $appointment)
    {
        return response()->json(['appointment' => $appointment], 200);
    } */
}
