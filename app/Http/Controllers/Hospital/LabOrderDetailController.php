<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreLabOrderDetailRequest;
use App\Http\Requests\Hospital\UpdateLabOrderDetailRequest;
use App\Http\Resources\LabOrderDetailResource;
use App\Models\LabOrderDetail;

class LabOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labOrderDetail = LabOrderDetail::all();
        return LabOrderDetailResource::collection($labOrderDetail);
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
    public function store(StoreLabOrderDetailRequest $request)
    {
        $validated = $request->validated();
        $labOrderDetail = LabOrderDetail::create($validated);
        if (!$labOrderDetail) {
            return response()->json(
                ["message" => "Failed to create lab order detail"],
                500
            );
        }
        return new LabOrderDetailResource($labOrderDetail);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $labOrderDetail = LabOrderDetail::find($id);
        if (!$labOrderDetail) {
            return response()->json(
                ["message" => "Lab order detail not found"],
                404
            );
        }
        return LabOrderDetailResource::make($labOrderDetail);
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
    public function update(UpdateLabOrderDetailRequest $request, string $id)
    {
        $labOrderDetail = LabOrderDetail::find($id);
        if (!$labOrderDetail) {
            return response()->json(
                ["message" => "Lab order detail not found"],
                404
            );
        }
        $validated = $request->validated();
        $labOrderDetail->update($validated);
        return new LabOrderDetailResource($labOrderDetail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-lab")) {
            $labOrderDetail = LabOrderDetail::find($id);
            if (!$labOrderDetail) {
                return response()->json(
                    ["message" => "Lab order detail not found"],
                    404
                );
            }
            $labOrderDetail->delete();
            return response()->json(
                ["message" => "Lab order detail deleted"],
                200
            );
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
