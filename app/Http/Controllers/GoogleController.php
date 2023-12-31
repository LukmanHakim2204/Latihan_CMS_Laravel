<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();


        $existingUser = User::where('google_id', $user->id)->first();

        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $password = Str::random(12);
            $newUser->password = bcrypt($password);
            $newUser->role = 'user';
            $newUser->google_id = $user->id;
            $newUser->save();
            auth()->login($newUser);
        }

        return redirect()->route('home');
    }


    public function redirectToGoogleSignup()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleSignupCallback()
    {
        $user = Socialite::driver('google')->user();

        // Check if the user with Google ID exists in your database.
        $existingUser = User::where('google_id', $user->id)->first();

        if ($existingUser) {
            // Log in the existing user
            auth()->login($existingUser);
        } else {
            // Create a new user for signup
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $password = Str::random(12);
            $newUser->password = bcrypt($password); // Generate a random password
            $newUser->role = 'user';
            $newUser->google_id = $user->id;
            $newUser->save();
            auth()->login($newUser);
        }

        return redirect()->route('home');
    }
}
