<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicationResource;
use App\Models\Medication;
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medication = Medication::all();
        return MedicationResource::collection($medication);
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
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo("manage-pharmacy")) {
            $validatedData = $request->validate([
                "generic_name" =>
                    "required|unique:medications,generic_name|string|max:255",
                "category_id" => "required|exists:categories,id",
                "unit_price" => "required|numeric|min:0",
            ]);
            $medication = Medication::create($validatedData);
            return new MedicationResource($medication);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medication = Medication::find($id);
        if (!$medication) {
            return response()->json(["message" => "Medication not found"], 404);
        }
        return MedicationResource::make($medication);
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
    public function update(Request $request, string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-pharmacy")) {
            $validatedData = $request->validate([
                "generic_name" =>
                    "nullable|unique:medications,generic_name|string|max:255",
                "unit_price" => "nullable|numeric|min:0",
            ]);
            $medication = Medication::find($id);
            if (!$medication) {
                return response()->json(
                    ["message" => "Medication not found"],
                    404
                );
            }
            $medication->update($validatedData);
            return new MedicationResource($medication);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-pharmacy")) {
            $medication = Medication::find($id);
            if (!$medication) {
                return response()->json(
                    ["message" => "Medication not found"],
                    404
                );
            }
            $medication->delete();
            return response()->json(["message" => "Medication deleted"]);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
