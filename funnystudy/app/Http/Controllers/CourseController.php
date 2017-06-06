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
    public function index(){
        $course = DB::table('course')->select('id','name','brief','URL')->orderBy('Creationtime', 'desc')->get();
        $page = DB::table('course')->select('id','name','brief','URL')->orderBy('Creationtime', 'desc')->paginate(12);
        $subject = DB::table('subjects')->select('name','id')->get();
        $grade = DB::table('grade')->select('name','id')->get();
        return view('Course.list')
            ->with("courselist",$course)
            ->with('subject',$subject)
            ->with("grade",$grade)
            ->with('page',$page);
    }
    public function gradesearch(Request $request){
        $id = $request->route('id');
        $course = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('gradeID','=',$id)
            ->orderBy('creationtime','desc')
            ->get();
        $page = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('gradeID','=',$id)
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
    public function subjectserch(Request $request){
        $id = $request->route('id');
        $course = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('subjectID','=',$id)
            ->orderBy('creationtime','desc')
            ->get();
        $page = DB::table('course')
            ->select('id','name','brief','URL')
            ->where('subjectID','=',$id)
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
    public function coursedetails(Request $request){
        $id = $request->route('id');

    }
    public function courseplay($id){
        $videourl = DB::table('video')->where('chapterID','=',$id)->select('URL')->get();
        return view('Course.play')->with("videoUrl",$videourl);
    }
}