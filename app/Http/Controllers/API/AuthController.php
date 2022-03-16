<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function register(RegisterRequest $registerRequest){
        $fields = $registerRequest->validated();
        $user = User::create([
            'name' => $fields['name'],
            'Prenom' => $fields['prenom'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return [
            'message' => 'Déconnecté'
        ];
    }

    public function login(LoginRequest $request){
        $request->authenticate();

        $user = User::where('email',$request['email'])->first();

        $token = $user->createToken('myAppToken')->plainTextToken;


        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        return response($response, 201);

    }

}