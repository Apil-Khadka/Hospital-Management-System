<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StorePatientRequest;
use App\Http\Requests\Hospital\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get user with role patient with patient data
        $patient = User::role("patient")->with("patient")->get();
        if (!$patient) {
            return response()->json(["message" => "No patients found"], 404);
        }
        return json_encode($patient);
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
    public function store(StorePatientRequest $request)
    {
        $validated = $request->validated();
        // Generate a unique 20-character MRN
        do {
            $mrn = Str::random(12);
        } while (Patient::where("mrn", $mrn)->exists());

        // Add the generated MRN to the validated data
        $validated["mrn"] = $mrn;

        $patient = Patient::create($validated);
        if (!$patient) {
            return response()->json(
                ["message" => "Patient creation failed"],
                500
            );
        }
        return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(["message" => "Patient not found"], 404);
        }
        return new PatientResource($patient);
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
    public function update(UpdatePatientRequest $request, string $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(["message" => "Patient not found"], 404);
        }
        $validated = $request->validated();
        $patient->update($validated);
        if (!$patient) {
            return response()->json(
                ["message" => "Patient update failed"],
                500
            );
        }
        return new PatientResource($patient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(["message" => "Patient not found"], 404);
        }
        $patient->delete();
        return response()->json(
            [
                "message" => "Patient deleted successfully",
                "patient_id" => $patient->id,
            ],

            200
        );
    }
}
