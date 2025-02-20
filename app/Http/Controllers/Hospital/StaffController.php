<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreStaffRequest;
use App\Http\Requests\Hospital\UpdateStaffRequest;
use App\Http\Resources\StaffResource;
use App\Models\Staff;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $staff = Staff::all();
        return response()->json($staff);
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
    public function store(
        StoreStaffRequest $request
    ): JsonResponse|StaffResource {
        $validatedData = $request->validated();
        $staff = Staff::create($validatedData);
        if (!$staff) {
            return response()->json(
                ["message" => "Failed to create staff"],
                500
            );
        }
        return new StaffResource($staff);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse|StaffResource
    {
        $staff = Staff::findOrFail($id);
        if (!$staff) {
            return response()->json(["message" => "Staff not found"], 404);
        }
        return response()->json($staff);
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
    public function update(
        UpdateStaffRequest $request,
        int $id
    ): JsonResponse|StaffResource {
        $staff = Staff::findOrFail($id);
        if (!$staff) {
            return response()->json(["message" => "Staff not found"], 404);
        }
        $validatedData = $request->validated();
        $staff->update($validatedData);
        if (!$staff) {
            return response()->json(
                ["message" => "Failed to update staff"],
                500
            );
        }
        return new StaffResource($staff);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (user()->hasPermission("manage-users")) {
            $staff = Staff::findOrFail($id);
            if (!$staff) {
                return response()->json(["message" => "Staff not found"], 404);
            }
            $staff->delete();
            return response()->json([
                "message" => "Staff deleted successfully",
            ]);
        }
        return response()->json(["message" => "Permission denied"], 403);
    }
}
