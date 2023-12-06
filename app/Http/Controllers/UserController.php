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
        $parameters = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($parameters)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'auth' => true,
                'message' => 'Success',
                'user' => $user,
                'token' => $token, // Include user type in the response
            ]);
        } else {
            return response()->json([
                'auth' => false,
                'message' => 'Email or password is incorrect',
                'user' => null
            ]);
        }

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
