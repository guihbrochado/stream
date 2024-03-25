<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;


class CourseController extends Controller
{
    public function detail($id) {
        $data = Courses::find($id);

        return view('apps.course.detail')->with('data', $data);
    }
    
    public function lesson() {
        return view('apps.course.lesson');
    }
    
}
