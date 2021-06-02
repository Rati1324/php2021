<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function rowspans($classes_timetable)
    {
        
        $rowspans = [1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1, 7 => 1];
        $prev = -1;
        foreach ($classes_timetable as $c){
            $cur_day = $c->day;
            if ($cur_day == $prev)
                $rowspans[$cur_day]++;
            $prev = $cur_day;
        }
        return $rowspans;
    }
    public function index()
    {
        $stud_id = auth()->user()->id;
        $classes = DB::table("classes")->orderBy('day')->get();
        $classes_timetable = $classes->where('user_id', $stud_id);
        $rowspans = $this->rowspans($classes_timetable);
        return view('timetable', compact('classes_timetable', 'rowspans'));    
    }
}
