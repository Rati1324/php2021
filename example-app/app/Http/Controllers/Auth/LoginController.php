<?php



namespace App\Http\Controllers\Auth;
use Illuminate\support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        auth()->attempt($request->only('email', 'password'));
        return view('auth.login');
        // if (!auth()->attempt($request->only('email', 'password'))){
        //     return back()->with('status', "Student not found");
        // }
        // return redirect()->route('home');
    }
}
