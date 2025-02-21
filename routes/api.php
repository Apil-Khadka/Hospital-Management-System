<?php

use App\Http\Controllers\Hospital\AppointmentController;
use App\Http\Controllers\Hospital\BillController;
use App\Http\Controllers\Hospital\BillItemController;
use App\Http\Controllers\Hospital\CategoryContorller;
use App\Http\Controllers\Hospital\DepartmentController;
use App\Http\Controllers\Hospital\LabOrderController;
use App\Http\Controllers\Hospital\LabOrderDetailController;
use App\Http\Controllers\Hospital\LabTestController;
use App\Http\Controllers\Hospital\MedicationController;
use App\Http\Controllers\Hospital\PatientController;
use App\Http\Controllers\Hospital\PrescriptionController;
use App\Http\Controllers\Hospital\PrescriptionDetailController;
use App\Http\Controllers\Hospital\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Oauth\GoogleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware("auth:sanctum")->get("/sanctum/user", function (
    Request $request
) {
    return $request->user()->load("roles", "roles.permissions");
});

Route::post("/login", [UserController::class, "login"]);

Route::middleware("auth:sanctum")->group(function () {
    // user
    Route::get("/user", [UserController::class, "index"]);
    Route::get("/user/{id}", [UserController::class, "show"]);
    Route::post("/user", [UserController::class, "store"]);
    Route::patch("/user/{id}", [UserController::class, "update"]);
    Route::delete("/user/{id}", [UserController::class, "destroy"]);

    //department
    Route::get("/department", [DepartmentController::class, "index"]);
    Route::get("/department/{id}", [DepartmentController::class, "show"]);
    Route::post("/department", [DepartmentController::class, "store"]);
    Route::patch("/department/{id}", [DepartmentController::class, "update"]);
    Route::delete("/department/{id}", [DepartmentController::class, "destroy"]);

    //Staff
    Route::get("/staff", [StaffController::class, "index"]);
    Route::get("/staff/{id}", [StaffController::class, "show"]);
    Route::post("/staff", [StaffController::class, "store"]);
    Route::patch("/staff/{id}", [StaffController::class, "update"]);
    Route::delete("/staff/{id}", [StaffController::class, "destroy"]);

    //Patient
    Route::get("/patient", [PatientController::class, "index"]);
    Route::get("/patient/{id}", [PatientController::class, "show"]);
    Route::post("/patient", [PatientController::class, "store"]);
    Route::patch("/patient/{id}", [PatientController::class, "update"]);
    Route::delete("/patient/{id}", [PatientController::class, "destroy"]);

    //appointment
    Route::get("/appointment", [AppointmentController::class, "index"]);
    Route::get("/appointment/{id}", [AppointmentController::class, "show"]);
    Route::post("/appointment", [AppointmentController::class, "store"]);
    Route::patch("/appointment/{id}", [AppointmentController::class, "update"]);
    Route::delete("/appointment/{id}", [
        AppointmentController::class,
        "destroy",
    ]);

    // medicine category
    Route::get("/category/medication", [CategoryContorller::class, "index"]);
    Route::get("/category/medication/{id}", [
        CategoryContorller::class,
        "show",
    ]);
    Route::post("/category/medication", [CategoryContorller::class, "store"]);
    Route::patch("/category/medication/{id}", [
        CategoryContorller::class,
        "update",
    ]);
    Route::delete("/category/medication/{id}", [
        CategoryContorller::class,
        "destroy",
    ]);

    //medication
    Route::get("/medication", [MedicationController::class, "index"]);
    Route::get("/medication/{id}", [MedicationController::class, "show"]);
    Route::post("/medication", [MedicationController::class, "store"]);
    Route::patch("/medication/{id}", [MedicationController::class, "update"]);
    Route::delete("/medication/{id}", [MedicationController::class, "destroy"]);

    //Prescription
    Route::get("/prescription", [PrescriptionController::class, "index"]);
    Route::get("/prescription/{id}", [PrescriptionController::class, "show"]);
    Route::post("/prescription", [PrescriptionController::class, "store"]);
    Route::patch("/prescription/{id}", [
        PrescriptionController::class,
        "update",
    ]);
    Route::delete("/prescription/{id}", [
        PrescriptionController::class,
        "destroy",
    ]);

    // Prescription Detail
    Route::get("/detail/prescription", [
        PrescriptionDetailController::class,
        "index",
    ]);
    Route::get("/detail/prescription/{id}", [
        PrescriptionDetailController::class,
        "show",
    ]);
    Route::post("/detail/prescription", [
        PrescriptionDetailController::class,
        "store",
    ]);
    Route::patch("/detail/prescription/{id}", [
        PrescriptionDetailController::class,
        "update",
    ]);
    Route::delete("/detail/prescription/{id}", [
        PrescriptionDetailController::class,
        "destroy",
    ]);

    // Lab Test
    Route::get("/labtest", [LabTestController::class, "index"]);
    Route::get("/labtest/{id}", [LabTestController::class, "show"]);
    Route::post("/labtest", [LabTestController::class, "store"]);
    Route::patch("/labtest/{id}", [LabTestController::class, "update"]);
    Route::delete("/labtest/{id}", [LabTestController::class, "destroy"]);

    // Lab Order
    Route::get("/laborder", [LabOrderController::class, "index"]);
    Route::get("/laborder/{id}", [LabOrderController::class, "show"]);
    Route::post("/laborder", [LabOrderController::class, "store"]);
    Route::patch("/laborder/{id}", [LabOrderController::class, "update"]);
    Route::delete("/laborder/{id}", [LabOrderController::class, "destroy"]);

    // Lab Order Detail
    Route::get("/detail/laborder", [LabOrderDetailController::class, "index"]);
    Route::get("/detail/laborder/{id}", [
        LabOrderDetailController::class,
        "show",
    ]);
    Route::post("/detail/laborder", [LabOrderDetailController::class, "store"]);
    Route::patch("/detail/laborder/{id}", [
        LabOrderDetailController::class,
        "update",
    ]);
    Route::delete("/detail/laborder/{id}", [
        LabOrderDetailController::class,
        "delete",
    ]);

    //Bill
    Route::get("/bill", [BillController::class, "index"]);
    Route::get("/bill/{id}", [BillController::class, "show"]);
    Route::post("/bill", [BillController::class, "store"]);
    Route::patch("/bill/{id}", [BillController::class, "update"]);
    Route::delete("/bill/{id}", [BillController::class, "destroy"]);

    // Bill Item
    Route::get("/item/bill", [BillItemController::class, "index"]);
    Route::get("/item/bill/{id}", [BillItemController::class, "show"]);
    Route::post("/item/bill", [BillItemController::class, "store"]);
    Route::patch("/item/bill/{id}", [BillItemController::class, "update"]);
    Route::delete("/item/bill/{id}", [BillItemController::class, "destroy"]);
});

//Oauth login
Route::get("/auth/google/redirect", [GoogleController::class, "redirect"]);
Route::get("/auth/google/callback", [GoogleController::class, "callback"]);
