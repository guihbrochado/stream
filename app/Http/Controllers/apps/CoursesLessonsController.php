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
    public function index()
    {
        $message = session('message');
        // $data = CoursesLessons::all();

        $data = DB::table('courseslessons as cl')
            ->join('coursesmodules as m', 'm.id', '=', 'cl.id_module')
            ->select('cl.*', 'm.module as module')
            ->orderBy('cl.id', 'desc')
            ->get();

            // dd($data);

        return view('apps.courseslessons.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coursesLessons = new CoursesLessons;
        // $courses = Courses::all();

        $modulesandcourses = DB::table('coursesmodules as cm')
            ->join('courses as c', 'c.id', '=', 'cm.id_course')
            ->select('cm.*', 'c.course as coursename')
            ->orderBy('c.id', 'desc')
            ->get();

        return view('apps.courseslessons.create')->with(['coursesLessons' => $coursesLessons, 'modulesandcourses' => $modulesandcourses, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursesLessonsFormRequest  $request)
    {

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

        $embed = getYouTubeEmbedCode($request->link);

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
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses_lessons.index')->with('message', $errorInfo);
        }

        return to_route('courses_lessons.index')->with('message', "Registrado com sucesso!");
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
        if ($coursesLessons === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.courseslessons.form')->with(['coursesLessons' => $coursesLessons,  'modulesandcourses' => $modulesandcourses,  'action' => 'show']);
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
        return view('apps.courseslessons.form')->with(['coursesLessons' => $coursesLessons,  'modulesandcourses' => $modulesandcourses,  'action' => 'edit']);
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

        // Apply the getYouTubeEmbedCode function to the link attribute
        $coursesLessons->link = getYouTubeEmbedCode($request->link);

        try {
            $coursesLessons->save();
        } catch (Exception $e) {
            // You can check the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses_lessons.index')->with('message', $errorInfo);
        }

        return to_route('courses_lessons.index')->with('message', "'{$coursesLessons->title}' updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coursesLessons = CoursesLessons::find($id);
        if ($coursesLessons === null) {
            return to_route('courses_lessons.index')
                ->with('message', "Dados inválidos");
        }
        try {
            $coursesLessons->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses_lessons.index')->with('message', $errorInfo);
        }

        return to_route('courses_lessons.index')
            ->with('message', "'{$coursesLessons->name}' deleted");
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
