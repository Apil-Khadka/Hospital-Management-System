<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StorePrescriptionDetailRequest;
use App\Http\Requests\Hospital\UpdatePrescriptionDetailRequest;
use App\Http\Resources\PrescriptionDetailResource;
use App\Models\PrescriptionDetail;
use Illuminate\Http\Request;

class PrescriptionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptionsDetails = PrescriptionDetail::all();
        return response()->json($prescriptionsDetails);
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
    public function store(StorePrescriptionDetailRequest $request)
    {
        $validated = $request->validated();
        $prescriptionDetail = PrescriptionDetail::create($validated);
        if (!$prescriptionDetail) {
            return response()->json(
                ["message" => "Prescription detail not created"],
                400
            );
        }
        return new PrescriptionDetailResource($prescriptionDetail);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prescriptionDetail = PrescriptionDetail::find($id);
        if (!$prescriptionDetail) {
            return response()->json(
                ["message" => "Prescription detail not found"],
                404
            );
        }
        return PrescriptionDetailResource::make($prescriptionDetail);
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
    public function update(UpdatePrescriptionDetailRequest $request, string $id)
    {
        $prescriptionDetail = PrescriptionDetail::find($id);
        if (!$prescriptionDetail) {
            return response()->json(
                ["message" => "Prescription detail not found"],
                404
            );
        }
        $validated = $request->validated();
        $prescriptionDetail->update($validated);
        if (!$prescriptionDetail) {
            return response()->json(
                ["message" => "Prescription detail not updated"],
                400
            );
        }
        return new PrescriptionDetailResource($prescriptionDetail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-prescriptions")) {
            $prescriptionDetail = PrescriptionDetail::find($id);
            if (!$prescriptionDetail) {
                return response()->json(
                    ["message" => "Prescription detail not found"],
                    404
                );
            }
            $prescriptionDetail->delete();
            if (!$prescriptionDetail) {
                return response()->json(
                    ["message" => "Prescription detail not deleted"],
                    400
                );
            }
            return response()->json(
                ["message" => "Prescription detail deleted"],
                200
            );
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
