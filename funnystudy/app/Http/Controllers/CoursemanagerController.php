<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;


class CoursemanagerController extends Controller
{
//    进行所有操作之前的    登录验证

//页面显示
    /**
     * @return $this 显示教师课程管理首页
     */
    public function courselistdisplay()
    {
//        获取登录用户的ID
        $userID = 1;
//        从数据库获取视图所需数据
//        根据$userID查询课程表course,查询字段id,name,URL,cost
        $courses = DB::table('course')->select('id','name','URL','brief')->where('delete_at',0)->where('teacherID',$userID)->get();
//        将数据传入视图
//        显示视图
        return view('Coursemanager/index')->with('courses',$courses);
    }

    /**
     * @param $id 课程ID
     * @return $this 课程详情页面
     */
    public function courseinfodisplay($id)
    {
//        从数据库获取视图所需数据
//        根据$id查询课程表course,章节表chapter,查询字段course.id,course.name,course.URL,course.cost,chapter.id,chapter.name
        $courseinfo = DB::table('course')->select('id','name','URL','brief')->where('delete_at',0)->where('id',$id)->get();
        $chapterinfo = DB::table('chapter')->select('id','name')->where('courseID',$id)->orderBy('id', 'asc')->get();
        $videoinfo = DB::table('video')
            ->join('chapter','video.chapterid','=','chapter.id')
            ->select('chapter.id as c_id','video.id','video.name')
            ->orderBy('id', 'asc')
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
        $chapters =  DB::table('chapter')->where('courseID',$id)->select('id','name')->orderBy('id', 'asc')->get();
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
        $userID = 1;

        $gradeID = $request->get('gradeID');
        $name = $request->get('courseName');
        $brief = $request->get('briefCourse');
        $subjectID = $request->get('subjectID');
        $URL = $request->file('file')->store('public/thumb');
        $URL = Storage::url('app/'.$URL);
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
//        $courseID = session('courseID');
        $courseID = 1;
//        获取表单传输的数据
        $datas = $request->get('chapterName');
//        循环遍历插入数据库
        foreach ($datas as $k => $v)
        {
            DB::table('chapter')->insert([
                'name'  =>  $v,
                'courseID'  =>  $courseID,
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
        $path = $request->file('file')->store('uploads');
//        视频上传的参数
        $chapterID = $request->get('chapterID');
        $videoName = $request->get('videoName');
//        插入数据库
        DB::table('video')->insert([
            'name'  =>  $videoName,
            'chapterID' =>  $chapterID,
            'URL'   =>  $path,
        ]);
    }
//    更改课程图片
    public function editthumb(Request $request)
    {
//        获取课程ID
        $courseID = $request->get('courseID');
        dump($courseID);
//        上传图片
        $URL = $request->file('file')->store('public/thumb');
        $URL = Storage::url('app/'.$URL);
//        获取原图片路径
        $oldPath = DB::table('course')->select('URL')->where('id',$courseID)->get();
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
                echo $id;
                break;
        }
    }
}
