<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login(Request $request, Admin $admin)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        if($validator->fails())
        {
            return redirect()->route('error', $validator->errors());
        }

        if(Auth::guard('admin')->attempt($request->only(['name','password'])))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success','Login Successfully');
        }
        else
        {
            return redirect()->route('login')->with('error','Admin not found');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
