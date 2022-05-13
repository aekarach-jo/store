<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function onLogin(Request $request)
    {
        Auth::attempt(['name' => $request->name, 'password' => $request->password]);

        $user = User::where('name', $request->name)->get()->first();
        $permission = $this->CheckPermission($user);
        // dd($permission);
        if (Auth::check()) {
            return response()->json([
                'message' => "it's ok",
                'data' => $permission
            ], 202);
        } else {
            return response()->json([
                'message' => 'error Not found'
            ], 404);
        }
    }
    public function CheckPermission($user)
    {
        $case = [];
        $permission = explode(",", $user->permission);
        foreach ($permission as $a) {
            $case[$a] = $a;
        }

        return $case;
      
        // if ((array_key_exists("05", $case))) {
        //     return $case;;
        // } else if ((array_key_exists("06", $case))) {
        //     return $case;
        // } else {
        //     return $case;
        // }
    }
    public function onCreateUser(Request $request)
    {
        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $request->permission
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'loged out'
        ], 202);
    }
}
