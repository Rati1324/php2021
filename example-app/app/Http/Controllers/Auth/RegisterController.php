<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){
        
        $rules = [
            'email' => 'email',
            'password' => 'min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'password_confirmation' => 'same:password',
            'phone' => 'digits:9'
        ];
        
        $messages = [
            'email' => "This is not a valid email",
            'password.min' => "Length must be minimum 8",
            'password.regex' => "Password too weak. Try adding atleast one uppercase letter and number",
            'password_confirmation.same' => "Passwords don't match",
            'phone.digits' => "This is not a valid Phone number"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->messages());
        }
        
        Student::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date of birth' => $request->dob,
            'first_name' => $request->f_name,
            'last_name' => $request->l_name,
            'phone' => $request->phone,
        ]);
        
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('home');
    }
    
}

