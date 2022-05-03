<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function onLogin(Request $request)
    {
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (Auth::check()) {
            return response()->json([
                'message' => "it's ok"
            ], 202);
        } else {
            return response()->json([
                'message' => 'error Not found'
            ], 404);
        }
    }
    public function onCreateUser(Request $request)
    {
        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }



    public function onLogout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'loged out'
        ], 202);
    }
}
