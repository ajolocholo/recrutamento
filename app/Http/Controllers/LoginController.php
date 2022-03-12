<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    
     public function index(){
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);
        //  $validator = Validator::make($request->all(), [
        //     'login' => 'required',
        //     'password' => 'required',
        // ]);
//   if (Auth::attempt($credentials)) {
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
}
