<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
//        教师课程管理部分
        'teacher/listdelete/*',
        'teacher/createfirst',
        'teacher/createsecond',
        'teacher/createthird',
        'teacher/editthumb',
        'teacher/editCourseInfo',
        'teacher/videoDelete/*',
        'teacher/chapterDelete/*',
        'teacher/reorder',
        'teacher/editHead',
        'teacher/editUser',
        'teacher/editPassword',
        'teacherdisplay/teacherLogin',
        'teacherdisplay/studentsteachers',
        'teacherdisplay/teachersstudents'
    ];
}
