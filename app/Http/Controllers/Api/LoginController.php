<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token-name');
            return response()->json([
                'message' => 'Login success',
                'status' => true,
                'token' => $token->plainTextToken
            ]);
        } else {
            return response()->json([
                'message' => 'Login failed',
                'status' => false,
            ]);
        }
    }
}
