<?php

use App\Http\Controllers\Hospital\AppointmentController;
use App\Http\Controllers\Hospital\BillController;
use App\Http\Controllers\Hospital\DepartmentController;
use App\Http\Controllers\Hospital\LabOrderController;
use App\Http\Controllers\Hospital\LabTestController;
use App\Http\Controllers\Hospital\PatientController;
use App\Http\Controllers\Hospital\PrescriptionController;
use App\Http\Controllers\Hospital\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

Route::middleware(["role:admin"])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get("/users", "index")->name(user . index);
        Route::post("/users", "store")->name(user . create);
        Route::delete("/users/{user}", "destroy")->name(user . destroy);
    });
});
Route::apiResource("users", UserController::class);
Route::apiResource("patients", PatientController::class);
Route::apiResource("prescriptions", PrescriptionController::class);
Route::apiResource("appointments", AppointmentController::class);
Route::apiResource("bills", BillController::class);
Route::apiResource("departments", DepartmentController::class);
Route::apiResource("lab-orders", LabOrderController::class);
Route::apiResource("lab-tests", LabTestController::class);
Route::apiResource("staff", StaffController::class);
