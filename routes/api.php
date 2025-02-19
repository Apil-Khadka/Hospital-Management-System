<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/sanctum/user", function (Request $request) {
    return $request->user()->with("roles", "roles.permissions")->first();
})->middleware("auth:sanctum");

Route::post("/login", [UserController::class, "login"])->name("user.login");

Route::middleware("auth:sanctum")->group(function () {
    Route::get("/user/{user}", [UserController::class, "show"])->name(
        "user.show"
    );
    Route::post("/user", [UserController::class, "store"])->name("user.store");

    Route::patch("/user/{id}", [UserController::class, "update"])->name(
        "user.update"
    );
    Route::delete("/user/{id}", [UserController::class, "destroy"])->name(
        "user.destroy"
    );
});
