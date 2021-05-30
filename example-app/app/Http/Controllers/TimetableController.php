<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{
    public function index()
    {

        $classes = DB::table("get_classes")->get();
        $stud_id = auth()->user()->id;
        $classes_timetable = $classes->where('user_id', $stud_id);
        return view('timetable')->with('classes_timetable', $classes_timetable);    
    }
}
