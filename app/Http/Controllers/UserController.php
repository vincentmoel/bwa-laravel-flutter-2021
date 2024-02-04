<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        $user['token'] = $user->createToken('authToken')->plainTextToken;

        return ResponseFormatter::success(
            200,
            'Success Store User',
            $user
        );
    }
}
