<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('id');
        if($id == null){
            return view('login/login');
        }
//        $id = 1;
        $data = DB::table('users_course')->join('course','course.id','=','users_course.courseID')->where('userID',$id)->paginate(9);
//        dd($data);
        return view('person/collection')->with('data',$data);

    }
}