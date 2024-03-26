<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesLessonsFormRequest;
use App\Models\CoursesLessons;
use App\Models\CoursesModules;
use App\Models\Courses;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CoursesLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Assigning a value to $controller in the constructor
        $this->controller = "courseslessons.index";
    }

    public function index()
    {
        $message = session('message');

        $data = DB::table('courseslessons as cl')
            ->join('coursesmodules as m', 'm.id', '=', 'cl.id_module')
            ->select('cl.*', 'm.module as module')
            ->orderBy('cl.id', 'desc')
            ->get();

        return view('apps.courseslessons.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coursesLessons = new CoursesLessons;

        $modulesandcourses = DB::table('coursesmodules as cm')
            ->join('courses as c', 'c.id', '=', 'cm.id_course')
            ->select('cm.*', 'c.course as coursename')
            ->orderBy('c.id', 'desc')
            ->get();

        return view('apps.courseslessons.create')->with([
            'coursesLessons' => $coursesLessons, 'controller' => $this->controller,
            'modulesandcourses' => $modulesandcourses, 'action' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursesLessonsFormRequest  $request)
    {

        // function getYouTubeEmbedCode($url)
        // {
        //     $video_id = '';
        //     $parsed_url = parse_url($url);

        //     if (isset($parsed_url['query'])) {
        //         parse_str($parsed_url['query'], $query_params);

        //         if (isset($query_params['v'])) {
        //             $video_id = $query_params['v'];
        //         }
        //     }

        //     if ($video_id) {
        //         return "$video_id";
        //     } else {
        //         return "O URL do vídeo do YouTube é inválido.";
        //     }
        // }

        $embed = $this->getYouTubeEmbedCode($request->link);

        try {
            $coursesLessons = CoursesLessons::create(
                [
                    'id_module' => $request->id_module,
                    'lesson' => $request->lesson,
                    'description' => $request->description,
                    'lessonnumber' => $request->lessonnumber,
                    'author' => $request->author,
                    'materials' => $request->materials,
                    'duration' => $request->duration,
                    'link' => $embed,
                ]
            );
        } catch (Exception $e) {
            $errorInfo = $e->getMessage();
            return to_route($this->controller)->with('message', $errorInfo);
        }

        return to_route($this->controller)->with('message', "Dados registrados com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coursesLessons = CoursesLessons::find($id);
        $modulesandcourses = DB::table('coursesmodules as cm')
            ->join('courses as c', 'c.id', '=', 'cm.id_course')
            ->select('cm.*', 'c.course as coursename')
            ->orderBy('c.id', 'desc')
            ->get();

            return view('apps.courseslessons.show')->with([
            'data' => $coursesLessons, 'controller' => $this->controller,
            'modulesandcourses' => $modulesandcourses,  'action' => 'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coursesLessons = CoursesLessons::find($id);
        $modulesandcourses = DB::table('coursesmodules as cm')
            ->join('courses as c', 'c.id', '=', 'cm.id_course')
            ->select('cm.*', 'c.course as coursename')
            ->orderBy('c.id', 'desc')
            ->get();

        return view('apps.courseslessons.edit')->with([
            'data' => $coursesLessons, 'controller' => $this->controller,
            'modulesandcourses' => $modulesandcourses,  'action' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursesLessonsFormRequest $request, $id)
    {
        $coursesLessons = CoursesLessons::find($id);

        if ($coursesLessons === null) {
            return to_route('coursesLessons.index')->with('message', "Dados inválidos");
        }

        $coursesLessons->fill($request->all());

        // function getYouTubeEmbedCode($url)
        // {
        //     $video_id = '';
        //     $parsed_url = parse_url($url);

        //     if (isset($parsed_url['query'])) {
        //         parse_str($parsed_url['query'], $query_params);

        //         if (isset($query_params['v'])) {
        //             $video_id = $query_params['v'];
        //         }
        //     }

        //     if ($video_id) {
        //         return "$video_id";
        //     } else {
        //         return "O URL do vídeo do YouTube é inválido.";
        //     }
        // }

        $coursesLessons->link = $this->getYouTubeEmbedCode($request->link);

        try {
            $coursesLessons->save();
        } catch (Exception $e) {
            $errorInfo = $e->getMessage();
            return to_route($this->controller)->with('message', $errorInfo);
        }

        return to_route($this->controller)->with('message', "Dados registrados com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coursesLessons = CoursesLessons::find($id);
        if ($coursesLessons === null) {
            return to_route($this->controller)
                ->with('message', "Dados inválidos");
        }
        try {
            $coursesLessons->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route($this->controller)->with('message', $errorInfo);
        }

        return to_route($this->controller)->with('message', "'{$coursesLessons->name}' deleted");
    }

     function getYouTubeEmbedCode($url)
    {
        $video_id = '';
        $parsed_url = parse_url($url);

        if (isset($parsed_url['query'])) {
            parse_str($parsed_url['query'], $query_params);

            if (isset($query_params['v'])) {
                $video_id = $query_params['v'];
            }
        }

        if ($video_id) {
            return "$video_id";
        } else {
            return "O URL do vídeo do YouTube é inválido.";
        }
    }
}
