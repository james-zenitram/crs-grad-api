<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email or password is incorrect',
                'user' => null
            ]);
        }

        $user = $request->user();
        $token = $user->createToken('api_db_testing_token')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'user' => Auth::user(),
            'token' => $token,
            'type' => Auth::user()->type // Include user type in the response
        ]);
    }

    public function register(Request $request)
    {
        $data = User::create($request->only('name', 'email', 'type') + [
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $data
        ], 200);
    }
}
