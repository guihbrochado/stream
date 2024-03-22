<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function detail() {
        return view('apps.course.detail');
    }
    
    public function lesson() {
        return view('apps.course.lesson');
    }
}
