<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StorePrescriptionRequest;
use App\Http\Requests\Hospital\UpdatePrescriptionRequest;
use App\Http\Resources\PrescriptionResource;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = Prescription::all();
        return json_encode($prescriptions);
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
    public function store(StorePrescriptionRequest $request)
    {
        $validated = $request->validated();
        $prescription = Prescription::create($validated);
        if (!$prescription) {
            return response()->json(
                ["message" => "Prescription not created"],
                400
            );
        }
        return PrescriptionResource::make($prescription);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prescription = Prescription::find($id);
        if (!$prescription) {
            return response()->json(
                ["message" => "Prescription not found"],
                404
            );
        }
        return PrescriptionResource::make($prescription);
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
    public function update(UpdatePrescriptionRequest $request, string $id)
    {
        $prescription = Prescription::find($id);
        if (!$prescription) {
            return response()->json(
                ["message" => "Prescription not found"],
                404
            );
        }
        $validated = $request->validated();
        $prescription->update($validated);
        return PrescriptionResource::make($prescription);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-prescriptions")) {
            $prescription = Prescription::find($id);
            if (!$prescription) {
                return response()->json(
                    ["message" => "Prescription not found"],
                    404
                );
            }
            $prescription->delete();
            return response()->json(["message" => "Prescription deleted"], 200);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
