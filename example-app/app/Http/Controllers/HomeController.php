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
        $school = DB::table('student')->join('school', 'student.school_id', '=', 'school.id')->value('school.name');
        $classes = DB::table('classes')->select('class_name', 'lecturer_name', 'credit', 'code')->where('user_id', auth()->user()->value('id'))->get();
        return view('home')->with(compact('student', 'classes', 'school'));
    }
}
