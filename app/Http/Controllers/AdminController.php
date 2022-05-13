<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function onAdminLogin(Request $request)
    {
        // dd($request);
        Auth::guard('authAdmin')->attempt(['name' => $request->name, 'password' => $request->password]);
        $admin = Admin::where('name', $request->name)->get()->first();
        dd(Auth::guard('authAdmin')->user());
        if (Auth::guard('authAdmin')->check()) {
            return view('stores.store', [
                'AdminData' => $admin
            ]);
        } else {
            return response()->json([
                'message' => "error Not found"
            ], 404);
        }
        
    }

    public function onCreateAdmin(Request $request)
    {
       
        $admin = Admin::insert([
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
