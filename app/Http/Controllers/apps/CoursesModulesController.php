<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesModulesFormRequest;
use App\Models\CoursesModules;
use App\Models\Courses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CoursesModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = CoursesModules::all();
        $message = session('message');

        
        $data = DB::table('coursesmodules as cm')
        ->join('courses as c', 'c.id', '=', 'cm.id_course')
        ->select('cm.*', 'c.course as coursename' )
        ->orderBy('c.id', 'desc')
        ->get();

        // dd($data);

        return view('apps.courses_modules.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coursesModules = new CoursesModules;
        $courses = Courses::all();


        return view('apps.courses_modules.form')->with(['coursesModules' => $coursesModules, 'courses' => $courses, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursesModulesFormRequest  $request)
    {
        try {
            $coursesModules = CoursesModules::create(
                [
                    'module' => $request->module,
                    'id_course' => $request->id_course,
                    'modulenumber' => $request->modulenumber,
                ]
            );

        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses_modules.index')->with('message', $errorInfo);
        }

        return to_route('courses_modules.index')->with('message', "Registered '{$coursesModules->name}' coursesModules");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coursesModules = CoursesModules::find($id);
        $courses = Courses::all();

        if ($coursesModules === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.courses_modules.form')->with(['coursesModules' => $coursesModules, 'courses' => $courses, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coursesModules = CoursesModules::find($id);
        $courses = Courses::all();
     
        return view('apps.courses_modules.form')->with(['coursesModules' => $coursesModules, 'courses' => $courses, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursesModulesFormRequest $request, $id)
    {
        $coursesModules = CoursesModules::find($id);
        if ($coursesModules === null) {
            return to_route('coursesModules.index')
                ->with('message', "Dados inválidos");
        }
        $coursesModules->fill($request->all());

        try {
            $coursesModules->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses_modules.index')->with('message', $errorInfo);
        }

        return to_route('courses_modules.index')
            ->with('message', "'{$coursesModules->title}' updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coursesModules = CoursesModules::find($id);
        if ($coursesModules === null) {
            return to_route('courses_modules.index')
                ->with('message', "Dados inválidos");
        }
        try {
            $coursesModules->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses_modules.index')->with('message', $errorInfo);
        }

        return to_route('courses_modules.index')
            ->with('message', "'{$coursesModules->name}' deleted");
    }
}
