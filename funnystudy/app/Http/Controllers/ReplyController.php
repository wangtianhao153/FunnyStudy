<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReplyController extends Controller
{
    public function index(Request $request)
    {
//        $id = $request->session()->get('id');
        $id = 1;
        $data = DB::table('comment')->join('video','video.id','=','comment.videoID')->where('userID',$id)->paginate(10);
//        dd($data);
        return view('person/reply')->with('data',$data);
    }
}