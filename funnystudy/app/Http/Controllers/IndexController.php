<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    Public function index(){
        $news=DB::table('news')->select('id','title','picture','time')->limit(6)->get();
        $course=DB::table('course')->limit(12)->get();
        $users=DB::table('users')->where('role',1)->limit(4)->get();
        return view('Index/index')
                ->with('news',$news)
                ->with('course',$course)
                ->with('users',$users);
    }


}
