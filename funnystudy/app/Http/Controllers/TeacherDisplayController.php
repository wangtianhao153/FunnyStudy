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
        $info=DB::table('users')->select('name','introduce','picture','sentence','id')->where('id',$id)->get();
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

    public function teacherLogin(Request $request){
        $username = $request->get('email');
        $password = $request->get('password');
        $password = md5($password);
        $psd = DB::table('users')->select('password')->where('username',$username)->get();
        if($psd[0] != $password){
            $name = DB::table('users')->where('username',$username)->value('name');
            $id = DB::table('users')->where('username',$username)->value('id');
            $request->session()->put('username',$name);
            $request->session()->put('id',$id);
            return 1;
        }
        else
        {
            return 0;
        }

    }

    public function studentsteachers(Request $request){
        $studentID = Session('id');
        $teacherID=$request->get('name');
        $teacherID=(int)$teacherID;
        $resu=DB::table('student_teachers')->where('studentID',$studentID)->where('teacherID',$teacherID)->get();
        if(!$resu){
            $results=DB::table('student_teachers')->insert(
                ['studentID' => $studentID, 'teacherID' =>$teacherID]
            );

        }

    }


    public function teachersstudents(Request $request){
        $studentID = Session('id');
        $teacherID=$request->get('name');
        $teacherID=(int)$teacherID;
        $results=DB::table('student_teachers')->where('studentID',$studentID)->where('teacherID',$teacherID)->delete();
        if($results){
            return 5;
        }

    }
}
