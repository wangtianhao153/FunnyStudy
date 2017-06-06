<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;


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
        $chapterinfo = DB::table('chapter')->select('id','name')->where('courseID',$id)->get();
        $videoinfo = DB::table('video')
            ->join('chapter','video.chapterid','=','chapter.id')
            ->select('chapter.id as c_id','video.id','video.name')
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
        $chapters =  DB::table('chapter')->where('courseID',$id)->select('id','name')->get();
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
    public function createfirst(Request $request)
    {
//        获取用户ID
        $userID = 1;

        $gradeID = $request->get('gradeID');
        $name = $request->get('courseName');
        $brief = $request->get('briefCourse');
        $subjectID = $request->get('subjectID');
        $URL = $request->file('file')->store('uploads/thumb');
        $id = DB::table('course')->insertGetId([
            'gradeID'   =>  $gradeID,
            'name'      =>  $name,
            'brief'     =>   $brief,
            'subjectID' =>  $subjectID,
            'URL'       =>  $URL,
            'teacherID' => $userID,
        ]);
        session()->put('courseID',$id);
    }
}
