<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\StoreBillItemRequest;
use App\Http\Requests\Hospital\UpdateBillItemRequest;
use App\Http\Resources\BillItemResource;
use App\Models\BillItem;
use Exception;

class BillItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billItems = BillItem::all();
        return BillItemResource::collection($billItems);
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
    public function store(StoreBillItemRequest $request)
    {
        try {
            $validated = $request->validated();
            $billItem = BillItem::create($validated);
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" => "Failed to create bill item",
                    "error" => $e->getMessage(),
                ],

                500
            );
        }
        return new BillItemResource($billItem);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $billItem = BillItem::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" => "Failed to retrieve bill item",
                    "error" => $e->getMessage(),
                ],
                404
            );
        }
        return new BillItemResource($billItem);
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
    public function update(UpdateBillItemRequest $request, string $id)
    {
        try {
            $validated = $request->validated();
            $billItem = BillItem::findOrFail($id);
            $billItem->update($validated);
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" => "Failed to update bill item",
                    "error" => $e->getMessage(),
                ],
                500
            );
        }
        return new BillItemResource($billItem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-billing")) {
            try {
                $billItem = BillItem::findOrFail($id);
                $billItem->delete();
            } catch (Exception $e) {
                return response()->json(
                    [
                        "message" => "Failed to delete bill item",
                        "error" => $e->getMessage(),
                    ],
                    500
                );
            }
            return response()->json(
                [
                    "message" => "Bill item deleted successfully",
                ],
                200
            );
        }
        return response()->json(
            [
                "message" => "Unauthorized",
            ],
            403
        );
    }
}
