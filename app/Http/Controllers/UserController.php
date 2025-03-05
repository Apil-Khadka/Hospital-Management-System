<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
    public function index(): string|JsonResponse
    {
        $user = User::with(['roles', 'roles.permissions'])->get();
        return json_encode($user);
    }

    public function listDoctor()
    {
        $doctors = User::role('doctor')->get();

        return UserResource::collection($doctors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        // Generate a Sanctum token
        $token = $user->createToken($request->device)->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'user_id' => $user->id,
            'user_role' => $user->roles->first()->name,
            'token_type' => 'Bearer',
        ]);
    }

    public function storePatient(
        Request $request
    ): string|false|UserResource|JsonResponse {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:7',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $user->assignRole('patient');
        if (!$user) {
            return response()->json(
                [
                    'message' => 'User creation failed',
                ],
                500
            );
        }
        $user->assignRole('patient');
        $token = $user->createToken('signup_token')->plainTextToken;
        return response()->json([
            'user' => new UserResource($user),
            'user_role' => 'patient',
            'token' => $token,
        ]);
    }

    public function checkAuth(): JsonResponse
    {
        $user = auth()->user();
        if ($user) {
            return response()->json([
                'user' => new UserResource($user)
            ]);
        }

        return response()->json(['error' => 'Not authenticated'], 401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreUserRequest $request
    ): string|false|UserResource|JsonResponse {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        if (!$user) {
            return response()->json(
                [
                    'message' => 'User creation failed',
                ],
                500
            );
        }
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): UserResource|JsonResponse
    {
        $user = User::with('roles', 'roles.permissions')->find($id);
        if (!$user) {
            throw ValidationException::withMessages([
                'id' => ['The provided id is invalid.'],
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
                'id' => ['The provided id is invalid.'],
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
        if ($user && $user->hasRole('admin')) {
            $userToDelete = User::find($id);
            if ($userToDelete) {
                $userToDelete->delete();
                return response()->json([
                    'message' => 'User deleted successfully',
                ]);
            }
            return response()->json(
                [
                    'message' => 'User not found',
                ],
                404
            );
        }
        return response()->json(
            [
                'message' => 'Unauthorized',
            ],
            401
        );
    }
}
