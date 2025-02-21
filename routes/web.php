<?php
// use App\Http\Controllers\Hospital\AppointmentController;
use App\Http\Controllers\Hospital\BillController;
// use App\Http\Controllers\Hospital\DepartmentController;
use App\Http\Controllers\Hospital\LabOrderController;
use App\Http\Controllers\Hospital\LabTestController;
// use App\Http\Controllers\Hospital\PatientController;
use App\Http\Controllers\Hospital\PrescriptionController;
// use App\Http\Controllers\Hospital\StaffController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});
