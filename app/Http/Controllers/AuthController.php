<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\UserRequest;
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

    public function getAuthUser()
    {
        return ResponseFormatter::success(
            401,
            "Success Get Auth User",
            auth()->user()
        );
    }

    public function updateProfile(UserRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update($request->validated());

        return ResponseFormatter::success(
            200,
            'Success Update Profile',
            $user
        );
    }
}
