<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

define('CONSTRENT', 'required|string');
class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $field = $request->validate([
            'name' => CONSTRENT,
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);
        $users = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password']),
        ]);

        $token = $users->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $users,
            'token' => $token,
        ];

        return Response($response, 201);
    }

    public function login(Request $request)
    {
        $field = $request->validate([
            'email' => CONSTRENT,
            'password' => CONSTRENT,
        ]);

        $user =  User::where(['email' => $field['email']])->first();
        if (!$user || Hash::check($field['password'], $user->password)) {
            return Response([
                'message' => 'Bad request'
            ], 401);
        }
        $token = $user->createToken('ahmad')->plainTextToken;

        $response = [
            'uesr' => $user,
            'token' => $token,
        ];
        return Response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return
            [
                'message' => 'you make logout sucesseful',
            ];
    }
}
