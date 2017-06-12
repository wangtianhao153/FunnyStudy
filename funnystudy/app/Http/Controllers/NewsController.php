<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $news=DB::table('news')->paginate(10);
        return view('News/index')->with('news',$news);
    }

    public function newscontent($id){
        $new=DB::table('news')->where('id',$id)->get();
        return view('News/newscontent')->with('new',$new[0]);
    }
}
