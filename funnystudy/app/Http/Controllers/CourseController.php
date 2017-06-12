<?php
/**
 * Created by PhpStorm.
 * User: 天昊
 * Date: 2017/6/1
 * Time: 14:27
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    //列表页显示
    public function index(){
        $course = DB::table('course')->select('id','name','brief','URL')->where('delete_at',0)->orderBy('Creationtime', 'desc')->get();
        $page = DB::table('course')->select('id','name','brief','URL')->where('delete_at',0)->orderBy('Creationtime', 'desc')->paginate(12);
        $subject = DB::table('subjects')->select('name','id')->get();
        $grade = DB::table('grade')->select('name','id')->get();
        return view('Course.list')
            ->with("courselist",$course)
            ->with('subject',$subject)
            ->with("grade",$grade)
            ->with('page',$page);
    }
    //根据年级查询
    public function gradesearch(Request $request){
        $id = $request->route('id');
        $course = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('gradeID','=',$id)
            ->where('delete_at',0)
            ->orderBy('creationtime','desc')
            ->get();
        $page = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('gradeID','=',$id)
            ->where('delete_at',0)
            ->orderBy('creationtime','desc')
            ->paginate(12);
        $subject = DB::table('subjects')->select('name','id')->get();
        $grade = DB::table('grade')->select('name','id')->get();
        return view('Course.list')
            ->with("courselist",$course)
            ->with('subject',$subject)
            ->with("grade",$grade)
            ->with('page',$page);
    }
    //根据课程查询
    public function subjectserch(Request $request){
        $id = $request->route('id');
        $course = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('subjectID','=',$id)
            ->where('delete_at',0)
            ->orderBy('creationtime','desc')
            ->get();
        $page = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('subjectID','=',$id)
            ->where('delete_at',0)
            ->orderBy('creationtime','desc')
            ->paginate(12);
        $subject = DB::table('subjects')->select('name','id')->get();
        $grade = DB::table('grade')->select('name','id')->get();
        return view('Course.list')
            ->with("courselist",$course)
            ->with('subject',$subject)
            ->with("grade",$grade)
            ->with('page',$page);
    }
    //视频播放页
    public function courseplay($id){
        $courseinfo = DB::table('course')
            ->join('users','course.teacherID','=','users.id')
            ->select('course.name','course.brief','users.name as teacherName','users.introduce as teacherIntroduce','users.picture')
            ->where('course.delete_at',0)
            ->where('course.id',$id)
            ->get();
        $chapterinfo = DB::table('chapter')->select('id','name')->where('courseID',$id)->orderBy('order', 'asc')->get();
        $videoinfo = DB::table('video')
            ->join('chapter','video.chapterID','=','chapter.id')
            ->select('chapter.id as c_id','video.id','video.name')
            ->where('chapter.courseID',$id)
            ->orderBy('video.order', 'asc')
            ->get();
        $students = DB::table('course_students')
            ->join('users','course_students.studentID','=','users.id')
            ->select('users.name','users.picture')
            ->where('course_students.courseID',$id)
            ->get();
        return view('Course.play')->with('course',$courseinfo[0])->with('chapters',$chapterinfo)->with('videos',$videoinfo)->with('students',$students);
    }
    public function videoPlay($id){
        $result = DB::table('video')->where('id',$id)->select('URL')->get();
        $URL = $result[0]->URL;
        return view('Course.videoPlay')->with('URL',$URL);
    }
}