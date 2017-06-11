<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register/register');
    }
    public function register(Request $request){
        $username = $request->get('email');
        $username = (string)$username;
        $password = $request->get('password');
        $password = md5($password);
        $name = $request->get('name');
        $name = (string)$name;
        $role = $request->get('role');
//        dd($username,$password,$name);
        $result = DB::table('users')->where('username',$username)->get();
        $num = count($result);
        if($num == 1){
            return redirect('register')->with('message', '邮箱已存在，请换一个邮箱进行注册');
            exit;
        }
        $result = DB::table('users')->where('name',$name)->get();
        $num = count($result);
        if($num == 1){
            return redirect('register')->with('message', '用户名已存在，请换一个用户名进行注册');
            exit;
        }
        $username = (string)$username;
        DB::table("users")->insert(['name'=>$name,'username'=>$username,'password'=>$password,'role'=>$role]);
        return redirect('login')->with('message', '注册成功，请登录');

    }
}