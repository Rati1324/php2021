<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class SearchController extends Controller
{
    public function search()
    {
        $stud_email = auth()->user()->value('email');
        $class_id = DB::table('class')->where('name', Request::input('keyword'))->value('id');
        
        $classes = DB::table('classes')->where('class_id', $class_id)->get();
        $groups = DB::table("groups")->where('class_id', $class_id)->get()->toArray();
        $student_atten_ids = DB::table('student_classes')->where('email', $stud_email)->pluck('atten_id')->toArray();
        
        return view('classes', compact('classes', 'groups', 'student_atten_ids'));
    }
}