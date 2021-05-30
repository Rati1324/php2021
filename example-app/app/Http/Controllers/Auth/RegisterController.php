<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){
        
        // $rules = [
        //     'email' => 'email',
        //     'password' => 'min:6|regex:"^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$"',
        //     'password_confirmation' => 'same:password',
        //     'phone' => 'digits:9'
        // ];
        
        // $messages = [
        //     'email' => "This is not a valid email",
        //     'password.min' => "Lenght must be minimum 6",
        //     'password.regex' => "Password too weak. Try adding uppercase letters and numbers",
        //     'password_confirmation.same' => "Passwords don't match",
        //     'phone.digits' => "This is not a valid Phone number"
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()){
        //     return back()->withInput()->withErrors($validator->messages());
        // }
        
        Student::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'date of birth' => $request->dob,
            // 'first_name' => $request->f_name,
            // 'last_name' => $request->l_name,
            // 'phone' => $request->phone,
            // 'school_id' => 1
        ]);
        
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('home');
    }
    
}

