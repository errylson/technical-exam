<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::user()) {
            return redirect('/companies');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            return redirect('/companies');
            
        } else {
            return back()->withErrors('Invalid credentials')->withInput($request->all);
        }
    }

    public function logout()
    {
        if(Auth::user()) {
            Auth::logout();
        }

        return back();
    }
}
