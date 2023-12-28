<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('laravel_token')->plainTextToken;
            $sessionKey = 'user_data_' . $user->email;


            session([$sessionKey => [
                'user_id' => $user->id,
                'name' => $user->name,
                
            ]]);
            $users = $request->user();
            $request->session()->put('user',$users->email);
            return redirect('')->with('success', 'Registration successful. Please log in.');

        }

        // Authentication failed...
        return response()->json(['error' => 'Invalid credentials.'], 401);

        // Alternatively, you can redirect back with an error message
        // return redirect()->route('login.form')->with('error', 'Invalid credentials.');
    }
    public function logout(Request $request)
    {
        // Get the user $user = $request->user();
    
        // Revoke all tokens for the authenticated user
        if ($request->user()) {
            $user = $request->user();
    
            // Revoke all tokens for the authenticated user
            $user->tokens()->delete();
    
            // Perform the standard Laravel logout
            Auth::logout();
            
            $user = $this->getCurrentUser();
            
            if ($user) {
                $storageKey = 'user_cart_' . $user->id;
                // Use JavaScript to remove the item from local storage
                localStorage.removeItem($storageKey);
            }
    
            // Clear the session
            $request->session()->flush();
            return redirect('login')->with('success', 'Please log in.');
        }
    }
    
    function getCurrentUser() {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Return the authenticated user
            return Auth::user();
        }
    
        // Return null or handle the case when the user is not authenticated
        return null;
    }
    

}
