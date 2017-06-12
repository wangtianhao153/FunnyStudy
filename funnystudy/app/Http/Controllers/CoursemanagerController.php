<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;


class CoursemanagerController extends Controller
{
//    进行所有操作之前的    登录验证
    public function __construct()
    {
        if (!session('username')||!session('id')){
            return redirect("index");
        }
    }

//页面显示
    /**
     * 显示个人中心
     */
    public function index()
    {
//        获取用户ID
        $ID = session()->get('id');
        $data = DB::table('users')->select('name','username','introduce','sentence','picture','age')->where('id',$ID)->get();
        return view('Coursemanager.index')->with('user',$data[0]);
    }
    public function password()
    {
        return view('Coursemanager.editpswd');
    }
    /**
     * @return $this 显示教师课程管理首页
     */
    public function courselistdisplay()
    {
//        获取登录用户的ID
        $userID = session('id');
//        从数据库获取视图所需数据
//        根据$userID查询课程表course,查询字段id,name,URL,cost
        $courses = DB::table('course')->select('id','name','URL','brief')->where('delete_at',0)->where('teacherID',$userID)->get();
//        将数据传入视图
//        显示视图
        return view('Coursemanager/list')->with('courses',$courses);
    }

    /**
     * @param $id 课程ID
     * @return $this 课程详情页面
     */
    public function courseinfodisplay($id)
    {
//        从数据库获取视图所需数据
//        根据$id查询课程表course,章节表chapter,查询字段course.id,course.name,course.URL,course.cost,chapter.id,chapter.name
        $courseinfo = DB::table('course')->select('id','name','URL','brief')->where('id',$id)->get();
        $chapterinfo = DB::table('chapter')->select('id','name')->where('courseID',$id)->orderBy('order', 'asc')->get();
        $videoinfo = DB::table('video')
            ->join('chapter','video.chapterid','=','chapter.id')
            ->select('chapter.id as c_id','video.id','video.name')
            ->where('chapter.courseID',$id)
            ->orderBy('video.order', 'asc')
            ->get();
//        将数据传入视图
//        显示视图
        return view('Coursemanager/info')->with('course',$courseinfo[0])->with('chapters',$chapterinfo)->with('videos',$videoinfo);
    }

    /**
     * @return 课程创建页面
     */
    public function createCourse()
    {
//        查询grade表和subjects表,获取全部数据
        $grades = DB::table('grade')->get();
        $subjects = DB::table('subjects')->get();
//        显示视图
        return view('Coursemanager/createcr')->with('grades',$grades)->with('subjects',$subjects);
    }

    /**
     * @return 章节创建页面
     */
    public function createChapter()
    {
//        显示视图
        return view('Coursemanager/createch');
    }

    /**
     * @param $id 课程ID
     * @return $this 上传视频页
     */
    public function uploaddisplay($id)
    {
//        查询该课程有哪些章节
        $chapters =  DB::table('chapter')->where('courseID',$id)->select('id','name')->orderBy('order', 'asc')->get();
//        显示视图
        return view('Coursemanager/uploadview')->with('chapters',$chapters);
    }


//    功能实现
    /**
     * 列表页删除课程
     */
    public function listDelete($id)
    {
//        dump($request);
//        使用软删除方式删除该课程
        DB::table('course')->where('id',$id)->update(['delete_at'=>1]);
//        无返回值
    }

    /**
     * 第一步
     * 创建课程
     */
    public function createfirst(Request $request)
    {
//        获取用户ID
        $userID = session('id');

        $gradeID = $request->get('gradeID');
        $name = $request->get('courseName');
        $brief = $request->get('briefCourse');
        $subjectID = $request->get('subjectID');
        $URL = $request->file('file')->store('public/thumb');
        $URL = Storage::url($URL);
//        数据插入
        $id = DB::table('course')->insertGetId([
            'gradeID'   =>  $gradeID,
            'name'      =>  $name,
            'brief'     =>   $brief,
            'subjectID' =>  $subjectID,
            'URL'       =>  $URL,
            'teacherID' => $userID,
        ]);
//        将课程ID存入session
        session()->put('courseID',$id);
    }

    /**
     * 第二步
     * 创建章节
     */
    public function createsecond(Request $request)
    {
//        获取课程ID
        $courseID = session('courseID');
//        获取表单传输的数据
        $datas = $request->get('chapterName');
//        循环遍历插入数据库
        foreach ($datas as $k => $v)
        {
            DB::table('chapter')->insert([
                'name'  =>  $v,
                'courseID'  =>  $courseID,
                'order' =>  $k,
            ]);
        }
//        页面跳转
        return redirect("teacher/uploadvideo/$courseID");
    }

    /**
     * 第三步
     * 上传视频
     */
    public function createthird(Request $request)
    {
//        视频上传
        $path = $request->file('file')->store('public/video');
        $URL = Storage::url($path);
//        视频上传的参数
        $chapterID = $request->get('chapterID');
        $videoName = $request->get('videoName');
//        插入数据库
        $id = DB::table('video')->insertGetId([
            'name'  =>  $videoName,
            'chapterID' =>  $chapterID,
            'URL'   =>  $URL,
        ]);
        DB::table('video')->where('id',$id)->update(['order'=>$id]);
    }
//    更改课程图片
    public function editthumb(Request $request)
    {
//        获取课程ID
        $courseID = $request->get('courseID');
//        上传图片
        $URL = $request->file('file')->store('public/thumb');
        $URL = Storage::url($URL);
//        获取原图片路径
        $oldPath = DB::table('course')->where('id',$courseID)->value('URL');
//        删除原图片
        Storage::delete($oldPath);
//        更改数据库图片路径
        DB::table('course')->where('id',$courseID)->update([
            'URL'   =>  $URL,
        ]);
    }

    /**
     * 更改课程信息
     */
    public function editCourseInfo(Request $request)
    {
        $type = $request->get('type');
        $ID = $request->get('id');
        $editDate = $request->get('editval');
        switch ($type){
            case 'h1':
                DB::table('course')->where('id',$ID)->update(['name'=>$editDate]);
                break;
            case 'p':
                DB::table('course')->where('id',$ID)->update(['brief'=>$editDate]);
                break;
            case 'h3':
                DB::table('chapter')->where('id',$ID)->update(['name'=>$editDate]);
                break;
            case 'h4':
                DB::table('video')->where('id',$ID)->update(['name'=>$editDate]);
                break;
            case 'newChapter':
                $id = DB::table('chapter')->insertGetId([
                    'name'  =>  $editDate,
                    'courseID'  =>  $ID,
                ]);
                DB::table('chapter')->where('id',$id)->update(['order'=>$id]);
                echo $id;
                break;
        }
    }

    /**
     * 删除视频
     */
    public function videoDelete($id)
    {
//        从数据库查询视频地址
        $path = DB::table('video')->select('URL')->where('id',$id)->get();
//        删除视频
        if(Storage::delete($path)) {
//        删除数据库数据
            DB::table('video')->where('id',$id)->delete();
        }
    }
    public function chapterDelete($id)
    {
//        查询章节下视频
        $videos = DB::table('video')->select('id')->where('chapterID',$id)->get();
//        删除视频记录
        foreach ($videos as $video)
        {
            $this::videoDelete($video->id);
        }
//        删除章节
        DB::table('chapter')->where('id',$id)->delete();
    }

    /**
     * 排序
     */
    public function reorder(Request $request)
    {
        $type = $request->get('type');
        $firstID = $request->get('firstID');
        $secondID = $request->get('secondID');
        switch ($type)
        {
            case 1:
                $table = 'video';
                break;
            case 2:
                $table = 'chapter';
                break;
        }
        $second = DB::table($table)->select('order')->where('id',$secondID)->get();
        $first = DB::table($table)->select('order')->where('id',$firstID)->get();
        $firstOrder =$first[0]->order;
        $secondOrder = $second[0]->order;
        DB::table($table)->where('id',$firstID)->update(['order'=>$secondOrder]);
        DB::table($table)->where('id',$secondID)->update(['order'=>$firstOrder]);
    }
    public function editUserHead(Request $request)
    {
//        获取用户ID
        $ID = session('id');
//        上传图片
        $URL = $request->file('file')->store('public/image');
        $URL = Storage::url($URL);
//        获取原图片路径
        $oldPath = DB::table('users')->select('picture')->where('id',$ID)->get();
//        删除原图片
        if (($oldPath=$oldPath[0]->picture) != 'image/althead.jpg')
        {
            $oldPath = str_replace('/storage','public',$oldPath);
            Storage::delete($oldPath);
        }
//        更改数据库图片路径
        DB::table('users')->where('id',$ID)->update([
            'picture'   =>  $URL,
        ]);
    }
    public function editUserInfo(Request $request)
    {
        $ID = session('id');
        $field = $request->get('field');
        $val = $request->get('val');
        DB::table('users')->where('id',$ID)->update([$field=>$val]);
    }
    public function editPassword(Request $request)
    {
        $ID = session('id');
        $oldPassword = md5($request->get('oldpswd'));
        $newPassword = md5($request->get('newpswd'));
        $Password = DB::table('users')->where('id',$ID)->value('password');
        if ($oldPassword == $Password) {
            DB::table('users')->where('id', $ID)->update(['password' => $newPassword]);
            return 1;
        }else{
            return 0;
        }
    }
}
