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
        
        // Default login
        dd(auth()->user());
        if (!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', "Student not found");
        }
        return redirect()->route('home');
        
        
        // Custom login
        // $student = DB::table('student')->get()->where('email', $request->only('email')['email']);
        // $hashed_pw = $student->pluck('pw')[0];
        // $input_pw = $request->password;
        // $email = $request->email;

        // echo $hashed_pw . "<br>" . $input_pw . "<br>  " . $email;
        // if (Hash::check($input_pw, $hashed_pw)){
        //     auth()->attempt(['email' => $email, 'password' => $input_pw]);
            
        //     if (auth()->attempt(['email' => $email, 'password' => $input_pw]))
        //         return redirect()->route('home');
        //     else 
        //          return redirect()->route('login');
        // }
    }
}
