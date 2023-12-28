<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{

    public function logout(Request $request)
    {
        
        $user = Auth::user();
        $sessionKey = 'user_data_' . $user->email;
        session()->forget($sessionKey);

        $user->tokens()->delete();
    
        
        return redirect('/login')->with('success', 'Logged out successfully');
        
    }


}
