<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return ResponseFormatter::error(
                401,
                "Login Failed",
            );
        }

        $user = User::where('email', $request->email)->first();
        $user['token'] = $user->createToken('authToken')->plainTextToken;

        return ResponseFormatter::success(
            401,
            "Login Success",
            $user
        );
    }
}
