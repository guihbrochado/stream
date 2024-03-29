<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesFormRequest;
use App\Models\Courses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Assigning a value to $controller in the constructor
        $this->controller = "courses.index";
    }

    public function index()
    {
        $data = Courses::all();
        $message = session('message');


        return view('apps.courses.index', ['data' => $data, 'controller' => $this->controller, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = new Courses;

        return view('apps.courses.create')->with(['courses' => $courses, 'controller' => $this->controller,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursesFormRequest  $request)
    {
        // dd($request);

        $fileName = '';
        $folder = public_path('images/courses');

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file = $request->file('cover');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
        }

        $price = str_replace(',', '.', $request->price);    

        $request->certification === null ? $request->certification = 0 : '';
        $request->isfree === null ? $request->isfree = 0 : '';
       
        try {
            $courses = Courses::create(
                [
                    'course' => $request->course,
                    'description' => $request->description,
                    'cover' => $fileName,
                    'courselevel' => $request->courselevel,
                    'duration' => $request->duration,
                    'expiration' => $request->expiration,
                    'isfree' => $request->isfree,
                    'price' => $price,
                    'certification' => $request->certification,
                ]
            );

        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            echo $errorInfo;
            
            return to_route($this->controller)->with('message', $errorInfo);
        }

        return to_route($this->controller)->with('message', "Dados registrados com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Courses::find($id);
      
        return view('apps.courses.show')->with(['data' => $data, 'controller' => $this->controller, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Courses::find($id);
     
        return view('apps.courses.edit')->with(['data' => $data, 'controller' => $this->controller, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursesFormRequest $request, $id)
    {
        $courses = Courses::find($id);
        if ($courses === null) {
            return to_route('courses.index')->with('message', "Dados inválidos");
        }
        $courses->fill($request->all());

        $fileName = '';
        $folder = public_path('images/courses');

        $price = str_replace(',', '.', $request->price);
        $request->certification === null ? $request->certification = 0 : '';
        $request->isfree === null ? $request->isfree = 0 : '';

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file = $request->file('cover');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
            $courses->cover = $fileName;
            $courses->price = $price;

        }

        dump($courses);
        try {
            $courses->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            echo $errorInfo;
            // return to_route($this->controller)->with('message', $errorInfo);
        }

        // return to_route($this->controller)->with('message', "Registro Atualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courses = Courses::find($id);
        if ($courses === null) {
            return to_route($this->controller)
                ->with('message', "Dados inválidos");
        }
        try {
            $courses->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses.index')->with('message', $errorInfo);
        }

        return to_route('courses.index')
            ->with('message', "'{$courses->name}' deleted");
    }
}
