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
        $stud_id = auth()->user()->id;
        $student = DB::table('student')->where('id', $stud_id);
        $school = DB::table('student')->join('school', 'student.school_id', '=', 'school.id')->value('school.name');
        $classes = DB::table('classes')->select('class_name', 'lecturer_name', 'credit', 'code')->where('user_id', $stud_id)->get();

        return view('home')->with(compact('student', 'classes', 'school'));
    }
}
