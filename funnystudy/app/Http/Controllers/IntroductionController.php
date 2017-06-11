<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;



class IntroductionController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('id');
//        $id = 1;
        $name = DB::table('users')->where('id', $id)->value('name');
        $age = DB::table('users')->where('id', $id)->value('age');
        $contact = DB::table('users')->where('id', $id)->value('contact_qq');
        $text = DB::table('users')->where('id', $id)->value('introduct');
        $pic = DB::table('users')->where('id', $id)->value('picture');
        $data = array('name'=>$name,'age'=>$age,'contact'=>$contact,'text'=>$text,'pic'=>$pic);
       return View::make('person/introduction',$data);
    }
    public function updata(Request $request){
        $id = $request->session()->get('id');
//        $id = 1;
        $age = $request->get('age');
        $age = (int)$age;
        $contact = $request->get('contact_qq');
        $contact = (int)$contact;
        $text = $request->get('introduce');
        $text = (string)$text;
        $file = $request->file('picture');
//        $a = $request->hasFile('picture');

//        dd($age,$contact,$text,$file,$a);
//        文件上传

            // 获取文件相关信息
        if($file -> isValid()) {
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
//            dd($bool);
        }
        $filename = '/uploads/'.$filename;
//        dd($pic);

//        存入数据库
        DB::table("users")->where('id', $id)->update(['age'=>$age,'contact_qq'=>$contact,'introduct'=>$text,'picture'=>$filename]);
        return redirect('introduction');
    }
}