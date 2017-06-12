<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class StudentController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('id');
        if($id == null){
            return view('login/login');
        }
//        $id = 1;
        $course = DB::table('course_students')->join('course','course.id','=','course_students.courseID')->where('studentID',$id)->paginate(9);
//        dd($course);
        return view('person/course')->with('data',$course);

    }
}