<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validation logic here...

        // Create user
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create($validatedData);

   
        $token = $user->createToken('laravel_token')->plainTextToken;
        $sessionKey = 'user_data_' . $user->email;

        // Store user-specific data in the session
        session([$sessionKey => [
            'user_id' => $user->id,
            'name' => $user->name,
          
        ]]);

        // Redirect or respond as needed
        return redirect('login')->with('success', 'Registration successful. Please log in.');
    }
}
