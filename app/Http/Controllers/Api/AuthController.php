<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function register(){
        $user = User::create([
            'name' => 'Patrick Telnoni',
            'email' => 'patrick@example.com',
            'password' => bcrypt('password'),
            'role' => 'dosen'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken; 
    }

    public function login(Request $request){
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }   
}
