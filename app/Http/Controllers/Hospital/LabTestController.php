<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreLabTestRequest;
use App\Http\Requests\Hospital\UpdateLabTestRequest;
use App\Http\Resources\LabTestResource;
use App\Models\LabTest;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labtests = LabTest::all();
        return LabTestResource::collection($labtests);
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
    public function store(StoreLabTestRequest $request)
    {
        $validated = $request->validated();
        $labtest = LabTest::create($validated);
        if (!$labtest) {
            return response()->json(
                ["message" => "Lab test creation failed"],
                500
            );
        }
        return LabTestResource::make($labtest);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $labtest = LabTest::find($id);
        if (!$labtest) {
            return response()->json(["message" => "Lab test not found"], 404);
        }
        return LabTestResource::make($labtest);
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
    public function update(UpdateLabTestRequest $request, string $id)
    {
        $labtest = LabTest::find($id);
        if (!$labtest) {
            return response()->json(["message" => "Lab test not found"], 404);
        }
        $validated = $request->validated();
        $labtest->update($validated);
        return LabTestResource::make($labtest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-lab")) {
            $labtest = LabTest::find($id);
            if (!$labtest) {
                return response()->json(
                    ["message" => "Lab test not found"],
                    404
                );
            }
            $labtest->delete();
            return response()->json(["message" => "Lab test deleted"], 200);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
