<?php

use App\Http\Controllers\Hospital\DepartmentController;
use App\Http\Controllers\Hospital\StaffController;
use App\Http\Controllers\UserController;
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
});
