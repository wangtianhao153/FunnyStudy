<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeacherDisplayController extends Controller
{
    public function listDisplay(){

        $users = DB::table('users')->where('role','=', 1)->paginate(10);
        return view('TeacherDisplay/listDisplay')->with('users',$users);

    }
    public function information($id)
    {   //老师信息
        $info=DB::table('users')->select('name','introduce','picture','sentence')->where('id',$id)->get();
        //老师粉丝数量
        $students=DB::table('student_teachers')->where('teacherID',$id)->count();
        //老师课程数
        $coursecount=DB::table('course')->where('teacherID',$id)->count();
        //老师课程信息
        $course=DB::table('course')->where('teacherID',$id)->get();
        //老师粉丝信息
        $fanss=DB::table('users')
            ->join('student_teachers', 'student_teachers.studentID', '=', 'users.id')
            ->select('users.name','users.picture')
            ->where('student_teachers.teacherID','=',$id)
            ->paginate(10);
       return view('TeacherDisplay/information')->with('info',$info[0])
           ->with('students',$students)
           ->with('course',$course)
           ->with('coursecount',$coursecount)
           ->with('fanss',$fanss);

    }
}
