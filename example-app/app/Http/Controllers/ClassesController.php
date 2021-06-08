<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $stud_id = auth()->user()->id;
        $classes = DB::table('classes_enroll')->groupBy('c_name')->get();

        $groups = DB::table("groups")->get()->toArray();
        $student_atten_ids = DB::table('classes')->where('user_id', $stud_id)->pluck('atten_id')->toArray();

        return view('classes', compact('classes', 'groups', 'student_atten_ids'));
    }    

    public function enroll(Request $data)
    {
        $student = auth()->user()->id;
        if ($data->action == "Enroll"){
            DB::table('student_atten')->insert([
                'attendance_id' => $data->atten,
                'student_id' => $student
            ]);
        }
        else{
            DB::table('student_atten')->where([
                ['attendance_id', '=', $data->atten],
                ['student_id', '=', $student],
            ])->delete();
        }
    }
}