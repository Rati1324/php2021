<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class SearchController extends Controller
{
    public function search()
    {
        $stud_id = auth()->user()->value('id');
        $class_id = DB::table('class')->where('name', Request::input('keyword'))->value('id');
        
        $classes = DB::table('classes_enroll')->where('class_id', $class_id)->groupBy('c_name')->get();
        $groups = DB::table("groups")->where('class_id', $class_id)->get()->toArray();
        $student_atten_ids = DB::table('classes')->where('user_id', $stud_id)->pluck('atten_id')->toArray();
        
        return view('classes', compact('classes', 'groups', 'student_atten_ids'));
    }
}