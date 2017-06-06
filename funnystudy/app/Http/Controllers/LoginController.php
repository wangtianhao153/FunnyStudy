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
        $username = (string)$username;
        $password = $request->get('password');
        $password = md5($password);
        $psd = DB::table('users')->where('username',$username)->value('password');
        $num = count($psd);
//        $arr['flag']=1;
        if($num == 1){
            if($password == $psd){
//                $arr['flag']=0;
//                $this->ajaxReturn($arr,json);
                $name = DB::table('users')->where('username',$username)->value('name');
                $id = DB::table('users')->where('username',$username)->value('id');
                $request->session()->put('username',$name);
                $request->session()->put('id',$id);
//                dd(session('username'));
                return view('index/index');
            }else{
//                $this->ajaxReturn($arr,json);
                return redirect('login')->with('message', '用户名或密码错误');
            }
        }else{
                return redirect('login')->with('message', '用户名或密码错误');
//            $this->ajaxReturn($arr,json);
        }

    }
    public function exits(Request $request){
        $request->session()->put('username',NULL);
        $request->session()->put('id',NULL);
        return view('index/index');
    }
}