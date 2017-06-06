<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index(){
        return view('login/login');
    }
    public function validation(Request $request){
        $username = $request->get('email');
        $password = $request->get('password');
        $psd = DB::table('users')->where('username',$username)->value('password');
        $num = count($psd);
//        $arr['flag']=1;
        if($num == 1){
            if($password == $psd){
//                $arr['flag']=0;
//                $this->ajaxReturn($arr,json);
                $name = DB::table('users')->where('username',$username)->value('name');
                $id = DB::table('users')->where('username',$username)->value('id');
                $request->Msession()->put('username',$name);
                $request->session()->put('id',$id);
                return view('login/login');
            }else{
//                $this->ajaxReturn($arr,json);
            }
        }else{
//            $this->ajaxReturn($arr,json);
        }

    }
    public function exits(Request $request){
        $request->session()->put('username',NULL);
        $request->session()->put('id',NULL);
        return view('index/index');
    }
}