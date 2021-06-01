<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $student = DB::table('student')->where('id', auth()->user()->value('id'));
        $classes = DB::table('student_classes')->where('email', auth()->user()->value('email'))->get();
        $school = DB::table('student')->join('school', 'student.school_id', '=', 'school.id')->value('school.name');
        return view('home')->with(compact('student', 'classes', 'school'));
    }
}
