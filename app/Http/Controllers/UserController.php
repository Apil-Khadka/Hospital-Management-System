<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): string|false
    {
        $user = User::with(["roles", "roles.permissions"])->get();
        return json_encode($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "device" => "required|string",
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                "email" => ["The provided credentials are incorrect."],
            ]);
        }
        // Generate a Sanctum token
        $token = $user->createToken($request->device)->plainTextToken;
        return response()->json([
            "access_token" => $token,
            "token_type" => "Bearer",
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreUserRequest $request
    ): string|false|UserResource|JsonResponse {
        $validatedData = $request->validated();
        $validatedData["password"] = Hash::make($validatedData["password"]);
        $user = User::create($validatedData);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): UserResource|JsonResponse
    {
        $user = User::with("roles", "roles.permissions")->find($id);
        if (!$user) {
            throw ValidationException::withMessages([
                "id" => ["The provided id is invalid."],
            ]);
        }
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, int $id): UserResource
    {
        $validatedData = $request->validated();
        $user = User::find($id);
        if (!$user) {
            throw ValidationException::withMessages([
                "id" => ["The provided id is invalid."],
            ]);
        }
        $user->update($validatedData);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $user = auth()->user();
        if ($user && $user->hasRole("admin")) {
            $userToDelete = User::find($id);
            if ($userToDelete) {
                $userToDelete->delete();
                return response()->json([
                    "message" => "User deleted successfully",
                ]);
            }
            return response()->json(
                [
                    "message" => "User not found",
                ],
                404
            );
        }
        return response()->json(
            [
                "message" => "Unauthorized",
            ],
            401
        );
    }
}
