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

        $Top6 = Courses::orderBy('created_at', 'desc')->take(6)->get();
        // $LikeOrder = Courses::orderBy('created_at', 'desc')->take(3)->get();
        $dateOrder = Courses::orderBy('created_at', 'desc')->take(6)->get();

        return view('apps.course.index', ['data' => $data, 'dateOrder' => $dateOrder]);
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