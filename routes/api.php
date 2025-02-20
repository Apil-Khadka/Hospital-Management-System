<?php

use App\Http\Controllers\Hospital\AppointmentController;
use App\Http\Controllers\Hospital\CategoryContorller;
use App\Http\Controllers\Hospital\DepartmentController;
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
});

//Oauth login
Route::get("/auth/google/redirect", [GoogleController::class, "redirect"]);
Route::get("/auth/google/callback", [GoogleController::class, "callback"]);
