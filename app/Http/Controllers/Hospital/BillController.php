<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreBillRequest;
use App\Http\Requests\Hospital\UpdateBillRequest;
use App\Http\Resources\BillResource;
use App\Models\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all();
        return BillResource::collection($bills);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBillRequest $request)
    {
        $validatedData = $request->validated();
        $bill = Bill::create($validatedData);
        if (!$bill) {
            return response()->json(["message" => "Bill creation failed"], 500);
        }
        return BillResource::make($bill);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bill = Bill::findOrFail($id);
        if (!$bill) {
            return response()->json(["message" => "Bill not found"], 404);
        }
        return BillResource::make($bill);
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
    public function update(UpdateBillRequest $request, string $id)
    {
        $bill = Bill::findOrFail($id);
        if (!$bill) {
            return response()->json(["message" => "Bill not found"], 404);
        }
        $validatedData = $request->validated();
        $bill->update($validatedData);
        if (!$bill) {
            return response()->json(["message" => "Bill update failed"], 500);
        }
        return BillResource::make($bill);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-billing")) {
            $bill = Bill::findOrFail($id);
            if (!$bill) {
                return response()->json(["message" => "Bill not found"], 404);
            }
            $bill->delete();
            return response()->json(
                ["message" => "Bill deleted successfully"],
                200
            );
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
