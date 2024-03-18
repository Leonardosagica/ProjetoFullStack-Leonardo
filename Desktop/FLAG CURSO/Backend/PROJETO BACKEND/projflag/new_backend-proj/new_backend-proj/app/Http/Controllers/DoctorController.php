<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Doctors;
use Illuminate\Support\Facades\Validator;


class DoctorController extends Controller
{
    public function show()
    {
        $doctor = Doctors::all();
        return response()->json($doctor);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:doctors',
            'specialty' => 'required|string|max:255',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $doctor = Doctors::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
        ]);
        // Retorna uma resposta JSON
        return response()->json([
            'message' => 'doctor added successfully',
            'doctor' => $doctor
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validator = Validator::make($request->all(), [
        'name' => [
            'required',
            'string',
            'max:255'
        ],
        'specialty' => 'required|string|min:55',
    ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $doctor = Doctors::findOrFail($id);
        $doctor->update([
            'name' => $request->name,
            'specialty' => $request->specialty,
        ]);

        return response()->json(['message' => 'doctor updated successfully', 'doctor' => $doctor]);
    }
        public function getDoctorId($id) {
            $doctor = Doctors::findOrFail($id);
            return response()->json($doctor);
        }
}
