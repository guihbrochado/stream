<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\CoursesLessons;
use App\Models\CoursesModules;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function detail($id)
    {
        $data = Courses::find($id);

        $modules = DB::Select("
        SELECT cm.module, cm.id
        FROM coursesmodules cm
        inner join courses c on cm.id_course = c.id
        where cm.id_course = $data->id
        order by cm.modulenumber ASC
        ");

        $coursesTop10 = DB::Select("
        SELECT c.id, c.course, c.cover, SUM(ce.rate) AS total_rate
        FROM coursesevaluation ce
        inner join courses c on ce.idcourse = c.id
        GROUP BY (ce.idcourse)
        order by total_rate DESC
        limit 10;");

        $allCourses = Courses::get();

        return view('apps.course.detail')->with(['data' => $data, 'modules' => $modules, 'coursesTop10' => $coursesTop10, 'allCourses' => $allCourses]);
    }

    public function lesson($id)
    {
        $data = CoursesLessons::find($id);

        $coursesTop10 = DB::Select("
        SELECT c.id, c.duration, c.course, c.cover, SUM(ce.rate) AS total_rate
        FROM coursesevaluation ce
        inner join courses c on ce.idcourse = c.id
        GROUP BY (ce.idcourse)
        order by total_rate DESC
        limit 10;");

        $searchIdCourse = DB::Select("        
        select distinct cm.id_course
        from courseslessons cl
        inner join coursesmodules cm on cl.id_module = cl.id
        where cl.id = 1"
        );
        $idcourse = $searchIdCourse[0]->id_course;

        $modules = CoursesModules::where('id_course', '=', $idcourse)->get();

        for ($i = 0; $i < count($modules); $i++) {
            $moduleId = $modules[$i]->id;
            $lessons = DB::Select("select distinct * from courseslessons where id_module = $moduleId");
            $modules[$i]['lessons'] = $lessons;
        }

        return view('apps.course.lesson')->with(['data' => $data, 'modules' => $modules, 'coursesTop10' => $coursesTop10]);
    }

    function ajaxCoursesLessons($idcourse, $idmodule)
    {
        $data = DB::select("select cl.*, cm.*, cl.updated_at as clupdated_at from courseslessons cl 
        inner join coursesmodules cm on cl.id_module = cm.id  
        inner join courses c on cm.id_course = c.id
        where c.id = $idcourse and cm.id = $idmodule;");

        // dump($data);

        return view('apps.course.courseslessonsajax', ['data' => $data]);
    }
}
