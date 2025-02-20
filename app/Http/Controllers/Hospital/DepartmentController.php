<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreDepartmentRequest;
use App\Http\Requests\Hospital\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse|string
    {
        $departments = Department::all();
        return json_encode($departments);
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
        StoreDepartmentRequest $request
    ): JsonResponse|DepartmentResource {
        $validatedData = $request->validated();
        $department = Department::create($validatedData);
        if (!$department) {
            return response()->json(
                ["message" => "Department creation failed"],
                500
            );
        }
        return response()->json(new DepartmentResource($department), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse|DepartmentResource
    {
        $department = Department::find($id);
        if (!$department) {
            return response()->json(["message" => "Department not found"], 404);
        }
        return response()->json(new DepartmentResource($department), 200);
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
        UpdateDepartmentRequest $request,
        int $id
    ): JsonResponse|DepartmentResource {
        $department = Department::find($id);
        if (!$department) {
            return response()->json(["message" => "Department not found"], 404);
        }
        $validatedData = $request->validated();
        $department->update($validatedData);
        return response()->json(new DepartmentResource($department), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse|string
    {
        if (!user()->hasRole("admin")) {
            return response()->json(["message" => "Unauthorized"], 403);
        }
        $department = Department::find($id);
        if (!$department) {
            return response()->json(["message" => "Department not found"], 404);
        }
        $department->delete();
        return response()->json(
            ["message" => "Department deleted successfully"],
            200
        );
    }
}
