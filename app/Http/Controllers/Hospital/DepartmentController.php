<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreDepartmentRequest;
use App\Http\Requests\Hospital\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return DepartmentResource::collection($departments);
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
        $roleName = 'hod' . $request['name'];

        try {
            $hodDepartmentRole = Role::create([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);

            if (!$hodDepartmentRole) {
                throw new \Exception('Role creation failed');
            }

            // create the hod role of the department
            $validatedData = $request->validated();
            // create the hodDepartment role
            $department = Department::create($validatedData);
            return response()->json(new DepartmentResource($department), 201);
        } catch (\Exception $e) {
            if (isset($hodDepartmentRole)) {
            }
            return response()->json(
                [
                    'message' => 'Department creation failed',
                    'error' => $e->getMessage(),
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse|DepartmentResource
    {
        try {
            $department = Department::findOrFail($id);
            return response()->json(new DepartmentResource($department), 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Department not found',
                    'error' => $e->getMessage(),
                ],
                404
            );
        }
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
        try {
            $department = Department::findOrFail($id);
            $validatedData = $request->validated();
            $department->update($validatedData);
            return response()->json(new DepartmentResource($department), 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Department not found or update failed',
                    'error' => $e->getMessage(),
                ],
                404
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse|string
    {
        try {
            if (!auth()->user()->hasRole('admin')) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }
            $department = Department::findOrFail($id);
            $department->delete();
            return response()->json(
                ['message' => 'Department deleted successfully'],
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Department not found or deletion failed',
                    'error' => $e->getMessage(),
                ],
                404
            );
        }
    }
}
