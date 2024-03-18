<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Exception;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;

use PgSql\Lob;
use Whoops\Run;

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

        $message = session('message');

        $data = Courses::orderBy('created_at', 'desc')->take(3)->get();

        //
        // $data = DB::table('coursesmodules as cm')
        //     ->where('cp.id_course', $idcourse)
        //     ->orderBy('c.id', 'desc');

        // $data = DB::table('courses as c')
        //     ->where('cp.id_user', $iduser)
        //     ->where('cp.id_course', $idcourse)
        //     ->orderBy('c.id', 'desc')
        //     ->first();

        // $modules = DB::table('coursesmodules as cm')
        //     ->select('cm.*')
        //     ->where('cm.id_course', $idcourse)
        //     ->orderBy('cm.id', 'asc')
        //     ->get();

        // foreach ($modules as $row) {
        //     $row->lessons = array();

        //     $courseslessons = DB::table('courseslessons as cl')
        //         ->select('cl.*')
        //         ->where('cl.id_module', $row->id)
        //         ->orderBy('cl.lessonnumber', 'asc')
        //         ->get();

        //     foreach ($courseslessons as $aula) {
        //         array_push($row->lessons, $aula);
        //     }
        // }

        // dump($data);
        //

        return view('apps.course.index', ['data' => $data]);
    }

    function ajaxCoursesModules($idcourse)
    {
        $data = DB::select("select * from coursesmodules c where id_course = $idcourse;");
        $count = count($data);

        $options = '<select id="selectmodules' . $idcourse . '" class="form-control season-select select2-basic-single js-states">';


        for ($i = 0; $i < $count; $i++) {
            $selected = ($i == 0) ? 'selected' : '';
            $options .= "<option value='{$data[$i]->id}' $selected>{$data[$i]->module}</option>";
        }

        $options .= '</select>';

        return $options;
    }

    function ajaxCoursesLessons($idcourse, $idmodule)
    {
        $data = DB::select("select cl.* from courseslessons cl 
        inner join coursesmodules cm on cl.id_module = cm.id  
        inner join courses c on cm.id_course = c.id
        where c.id = $idcourse and cm.id = $idmodule;");
        
        // dump($data);
        return $data;

        

        // $options = '<select id="selectmodules' . $idcourse . '" class="form-control season-select select2-basic-single js-states">';

        // for ($i = 0; $i < $count; $i++) {
        //     $selected = ($i == 0) ? 'selected' : '';
        //     $options .= "<option value='{$data[$i]->id}' $selected>{$data[$i]->module}</option>";
        // }

        // $options .= '</select>';

        // return $options;
    }
}
