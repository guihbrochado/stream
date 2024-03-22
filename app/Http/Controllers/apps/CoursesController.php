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
    public function index()
    {
        $data = Courses::all();
        $message = session('message');
        
        return view('apps.courses.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = new Courses;

        return view('apps.courses.form')->with(['courses' => $courses, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursesFormRequest  $request)
    {
        $fileName = '';
        $folder = public_path('images/courses');

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file = $request->file('cover');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
        }

        $price = str_replace(',', '.', $request->price);

        try {
            $courses = Courses::create(
                [
                    'course' => $request->course,
                    'description' => $request->description,
                    'cover' => $fileName,
                    'courselevel' => $request->courselevel,
                    'duration' => $request->duration,
                    'expiration' => $request->expiration,
                    'price' => $price,
                    'certification' => $request->certification,
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('courses.index')->with('message', $errorInfo);
        }

        return to_route('courses.index')->with('message', "Registered '{$courses->name}' courses");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $courses = Courses::find($id);
        if ($courses === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.courses.form')->with(['courses' => $courses, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courses = Courses::find($id);
        if ($courses === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.courses.form')->with(['courses' => $courses, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursesFormRequest $request, $id)
    {
        $courses = Courses::find($id);
        if ($courses === null) {
            return to_route('courses.index')
                ->with('message', "Dados inválidos");
        }
        // $courses->fill($request->all());
        // dd($courses);

        $fileName = '';
        // $folder = env('APP_PUBLIC_DIR') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'products';
        $folder = public_path('images/courses');

        $price = str_replace(',', '.', $request->price);


        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file = $request->file('cover');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);

            $courses->cover = $fileName;
            $courses->price = $price;
        }
        // var_dump($courses);
        try {
            $courses->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            // return to_route('courses.index')->with('message', $errorInfo);
        }

        // return to_route('courses.index')->with('message', "Registro Atualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courses = Courses::find($id);
        if ($courses === null) {
            return to_route('courses.index')
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
