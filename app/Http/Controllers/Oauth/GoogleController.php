<?php

namespace App\Http\Controllers\Oauth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirect()
    {
        // Use stateless() for API based authentication
        return Socialite::driver("google")->stateless()->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function callback(Request $request)
    {
        try {
            // Retrieve the user from Google using a stateless request
            $googleUser = Socialite::driver("google")->stateless()->user();
        } catch (\Exception $e) {
            // Log the error if needed
            \Log::error("Google OAuth callback error: " . $e->getMessage());
            return response()->json(
                [
                    "error" =>
                        "Unable to authenticate with Google. Please try again later.",
                ],
                422
            );
        }

        // Extract first name and last name from the Google user data.
        // Socialite returns additional user details in the 'user' attribute.
        $firstName = $googleUser->user["given_name"] ?? null;
        $lastName = $googleUser->user["family_name"] ?? null;

        if (!$firstName || !$lastName) {
            return response()->json(
                [
                    "error" =>
                        "Required name information is missing from the Google account.",
                ],
                422
            );
        }

        // Create a password using the Google user ID (hashed with bcrypt)
        $password = bcrypt($googleUser->getId());

        // Find the user by email or create a new one.
        // Here we update the record if the user already exists.
        $user = User::updateOrCreate(
            ["email" => $googleUser->getEmail()],
            [
                "firstname" => $firstName,
                "lastname" => $lastName,
                "password" => $password,
            ]
        );

        //give patient role to user
        $user->assignRole("patient");
        // Create a Sanctum token for API authentication
        $token = $user->createToken("Google Login")->plainTextToken;

        // Return a successful JSON response with the token and user info
        return view('oauth-callback', compact('token'));
    }
}
