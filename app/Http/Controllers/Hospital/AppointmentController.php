<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreAppointmentRequest;
use App\Http\Requests\Hospital\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return json_encode($appointments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $validated = $request->validated();

        $appointment = Appointment::create($validated);
        if (!$appointment) {
            return response()->json(
                ["message" => "Appointment not created"],
                400
            );
        }
        return AppointmentResource::make($appointment);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(
                ["message" => "Appointment not found"],
                404
            );
        }
        return AppointmentResource::make($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, string $id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(
                ["message" => "Appointment not found"],
                404
            );
        }
        $validated = $request->validated();
        $appointment->update($validated);
        if (!$appointment) {
            return response()->json(
                ["message" => "Appointment not updated"],
                400
            );
        }
        return AppointmentResource::make($appointment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(
                ["message" => "Appointment not found"],
                404
            );
        }
        $appointment->delete();
        if (!$appointment) {
            return response()->json(
                ["message" => "Appointment not deleted"],
                400
            );
        }
        return response()->json(["message" => "Appointment deleted"], 200);
    }
}
