<?php

namespace App\Http\Controllers\Auth;
use Illuminate\support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $x = DB::table('student')->get()->where('email', $request->only('email')['email']);
        $hashed_pw = $x->pluck('pw')[0];
        $input_pw = $request->only('password')['password'];
        $email = $request->only('email')['email'];
        $x = $x->first();
        echo $hashed_pw . "<br>" . $input_pw . "<br>  " . $email;
        /*
        if (Hash::check($input_pw, $hashed_pw)){

            auth()->Auth::attempt(['email' => $email, 'password' => $password]);
            dd($request->only('email'));
            
            if (!auth()->attempt([
                'email' => $request->only('email'),
                'password' => $input_hashed
            ])){
                dd("asd");
                return back()->with('status', 'Student not found');
            };
            return redirect()->route('home');
        }
        */
    }
}
