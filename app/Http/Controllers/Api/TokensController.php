<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokensController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $tokens = $user->tokens;
        return $tokens;
    }
}
