<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;
use App\Models\LiveRoom;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $iduser = Auth::user()->id;

        $data = Courses::orderBy('created_at', 'desc')->get();
        
        $rooms = LiveRoom::orderBy('created_at', 'desc')->get();

        $coursesTop10 = DB::Select("
        SELECT c.id, c.course, c.cover, SUM(ce.rate) AS total_rate
        FROM coursesevaluation ce
        inner join courses c on ce.idcourse = c.id
        GROUP BY (ce.idcourse)
        order by total_rate DESC
        limit 10;");
        
        $dateOrder = Courses::orderBy('created_at', 'desc')->get();

        $lastLessons = DB::Select("Select ulo.*, cl.id as idlesson, cl.link as link, cl.lesson from userlessonsopeneds as ulo
        inner join courseslessons cl on ulo.id_lesson = cl.id
        where ulo.id_user = $iduser and ulo.id_order < 7 order by ulo.id_order asc");
      
        return view('apps.course.index', ['data' => $data, 'lastLessons' => $lastLessons, 'coursesTop10' => $coursesTop10, 'rooms' => $rooms,'dateOrder' => $dateOrder]);
    }

    public function apiRooms()
    {
        $rooms = LiveRoom::orderBy('created_at', 'desc')->get();

        return response()->json($rooms);
    }

    function ajaxCoursesModules($idcourse)
    {
        $data = DB::select("select * from coursesmodules c where id_course = $idcourse;");
        $count = count($data);

        // $options = '<select id="selectmodules' . $idcourse . '" class="form-control season-select select2-basic-single js-states">';

        // for ($i = 0; $i < $count; $i++) {
        //     $selected = ($i == 0) ? 'selected' : '';
        //     $options .= "<option value='{$data[$i]->id}' $selected>{$data[$i]->module}</option>";
        // }

        // $options .= '</select>';

        // return $options;

        return view('apps.course.divmodules', ['data' => $data, 'count' => $count, 'idcourse' => $idcourse]);

    }

    function ajaxCoursesLessons($idcourse, $idmodule)
    {
        $data = DB::select("select cl.*, cm.*, cl.updated_at as clupdated_at from courseslessons cl 
        inner join coursesmodules cm on cl.id_module = cm.id  
        inner join courses c on cm.id_course = c.id
        where c.id = $idcourse and cm.id = $idmodule;");
        
        // dump($data);

        return view('apps.course.divlessons', ['data' => $data]);
        

    }
}
