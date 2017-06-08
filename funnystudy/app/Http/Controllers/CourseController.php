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
    //课程详情页
    public function coursedetails(Request $request){
        $id = $request->route('id');

    }
    //视频播放页
    public function courseplay(Request $request){
        $videourl = DB::table('video')->where('chapterID','=',$request->route('id'))->select('URL')->get();
        $info = DB::table('video')
            ->join('chapter','chapter.id','=','video.chapterID')
            ->join('course','course.id','=','chapter.courseID')
            ->select('video.name as videoname','chapter.name as chaptername','course.name as coursename')
            ->get();
        return view('Course.play')->with("videoUrl",$videourl)->with('videoinfo',$info);
    }
}