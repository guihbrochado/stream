<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $data = Courses::all();
        $message = session('message');

        return view('apps.course.index')->with('data', $data)->with('message', $message);
    }
    
    public function detail() {
        return view('apps.course.detail');
    }
    
    public function lesson() {
        return view('apps.course.lesson');
    }
}
