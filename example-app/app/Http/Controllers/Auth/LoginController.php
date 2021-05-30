<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['guest']);
    // }
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', "Student not found");
        }
		dd(auth()->user()->email);
        return redirect()->route('home');
    }
        
}
