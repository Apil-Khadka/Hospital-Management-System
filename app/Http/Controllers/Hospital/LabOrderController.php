<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreLabOrderRequest;
use App\Http\Requests\Hospital\UpdateLabOrderRequest;
use App\Http\Resources\LabOrderResource;
use App\Models\LabOrder;
use Illuminate\Http\Request;

class LabOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labOrder = LabOrder::all();
        return LabOrderResource::collection($labOrder);
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
    public function store(StoreLabOrderRequest $request)
    {
        $validated = $request->validated();
        $labOrder = LabOrder::create($validated);
        if (!$labOrder) {
            return response()->json(
                ["message" => "lab Order Creation Failed"],
                400
            );
        }
        return LabOrderResource::make($labOrder);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $labOrder = LabOrder::find($id);
        if (!$labOrder) {
            return response()->json(
                ["message" => "Specified Lab Order Not found"],
                400
            );
        }
        return LabOrderResource::make($labOrder);
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
    public function update(UpdateLabOrderRequest $request, string $id)
    {
        $labOrder = LabOrder::find($id);
        if (!$labOrder) {
            return response()->json(
                ["message" => "Specified Lab Order Not found"],
                400
            );
        }
        $validated = $request->validated();
        $labOrder->update($validated);
        return LabOrderResource::make($labOrder);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-lab")) {
            $labOrder = LabOrder::find($id);
            if (!$labOrder) {
                return response()->json(
                    ["message" => "Specified Lab Order Not found"],
                    400
                );
            }
            $labOrder->delete();
            return response()->json(
                ["message" => "Lab Order Deleted Successfully"],
                200
            );
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
