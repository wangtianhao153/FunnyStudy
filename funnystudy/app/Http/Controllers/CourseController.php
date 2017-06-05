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
        $course = DB::table('course')->select('id','name','brief','URL')->get();
        return view('Course.list')->with("courselist",$course);
    }
    public function search(){

    }
    public function courseplay($id){
        $videourl = DB::table('video')->where('chapterID','=',$id)->select('URL')->get();
        return view('Course.play')->with("videoUrl",$videourl);
    }
}