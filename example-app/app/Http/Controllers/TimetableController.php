<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $classes_timetable = DB::table("get_classes")->get();
        return view('timetable')->with('classes_timetable', $classes_timetable);    
    }
}
