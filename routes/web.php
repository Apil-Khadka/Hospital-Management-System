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
// Login request handle
// Route::post("/login", [UserController::class, "login"])->name("user.login");

Route::apiResource("patients", PatientController::class);
Route::apiResource("prescriptions", PrescriptionController::class);
Route::apiResource("appointments", AppointmentController::class);
Route::apiResource("bills", BillController::class);
Route::apiResource("departments", DepartmentController::class);
Route::apiResource("lab-orders", LabOrderController::class);
Route::apiResource("lab-tests", LabTestController::class);
Route::apiResource("staff", StaffController::class);
// Route::apiResource("users", UserController::class);
