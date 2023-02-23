<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserControl extends Controller
{
    

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $token = $request->user()->createToken("kliens oldali token", ['*'], now()->addMinutes(config('sanctum.expiration')));
            return ['token' => $token->plainTextToken];
        }

        return response("Error", 515);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
    }


    public function dashboard()
    {
        $s = "asdasd";
        return ["valasz" => $s];
    }
    

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
    }
}
