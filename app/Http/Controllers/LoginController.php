<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ( Auth::attempt( ['email' => $request->email, 'password' => $request->password] ) ) {
            $user = Auth::user();
            $token = $user->createToken('JWT');
            return response()->json($token, 200);
        }
        
        return response()->json('Authentication failed', 401);
    }
}
