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
        $stud_email = auth()->user()->value('email');
        $classes = DB::table('classes')->get();
        $groups = DB::table("groups")->get()->toArray();
        $student_atten_ids = DB::table('student_classes')->where('email', $stud_email)->pluck('atten_id')->toArray();

        return view('classes', compact('classes', 'groups', 'student_atten_ids'));
    }    

    public function enroll(Request $data)
    {
        if ($data->action == "Enroll"){
            DB::table('student_atten')->insert([
                'attendance_id' => $data->atten,
                'student_id' => $data->student,
            ]);
        }
        else{
            DB::table('student_atten')->where([
                ['attendance_id', '=', $data->atten],
                ['student_id', '=', $data->student],
            ])->delete();
        }
    }

}