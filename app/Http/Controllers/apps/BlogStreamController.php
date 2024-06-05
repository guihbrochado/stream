<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogstreamFormRequest;
use App\Models\BlogCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\BlogStream;

class BlogStreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Assigning a value to $controller in the constructor
        $this->controller = "blogstream.index";
    }

    public function index()
    {
        $data = Blogstream::all();
        $message = session('message');

        return view('apps.blogstream.index', ['data' => $data, 'controller' => $this->controller, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogstream = new Blogstream;

        $blogcategories = BlogCategory::where('status', 1)->get();

        return view('apps.blogstream.create')->with(['blogstream' => $blogstream, 'blogcategories' => $blogcategories, 'controller' => $this->controller,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogstreamFormRequest  $request)
    {
        // dd($request);

        $fileName = '';
        $audioFileName = '';
        $folder = public_path('images/blogstream');
        $audioFolder = public_path('audios/blogstream');

        if ($request->hasFile('imgcapa') && $request->file('imgcapa')->isValid()) {
            $file = $request->file('imgcapa');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
        }

        if ($request->hasFile('audiofile') && $request->file('audiofile')->isValid()) {
            $audioFile = $request->file('audiofile');
            $extension = $audioFile->extension();
            $audioFileName = md5($audioFile->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $audioFile->move($audioFolder, $audioFileName);
        }

        try {
            $blogstream = Blogstream::create($request->all());
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
        $data = Blogstream::find($id);
        $blogcategories = BlogCategory::where('status', 1)->get();

        return view('apps.blogstream.show')->with(['data' => $data, 'blogcategories' => $blogcategories, 'controller' => $this->controller,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Blogstream::find($id);
        $blogcategories = BlogCategory::where('status', 1)->get();

        return view('apps.blogstream.edit')->with(['data' => $data, 'blogcategories' => $blogcategories, 'controller' => $this->controller, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogstreamFormRequest $request, $id)
    {
        $blogstream = Blogstream::find($id);
        if ($blogstream === null) {
            return to_route('blogstream.index')->with('message', "Dados inválidos");
        }
        $blogstream->fill($request->all());

        $fileName = '';
        $folder = public_path('images/blogstream');
        $audioFileName = '';
        $audioFolder = public_path('audios/blogstream');


        if ($request->hasFile('imgcapa') && $request->file('imgcapa')->isValid()) {
            $file = $request->file('imgcapa');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
            $blogstream->imgcapa = $fileName;
        }

        if ($request->hasFile('audiofile') && $request->file('audiofile')->isValid()) {
            $audioFile = $request->file('audiofile');
            $extension = $audioFile->extension();
            $audioFileName = md5($audioFile->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $audioFile->move($audioFolder, $audioFileName);
            $blogstream->audiofile = $audioFileName;
        }

        try {
            $blogstream->save();
        } catch (Exception $e) {
            $errorInfo = $e->getMessage();
            echo $errorInfo;
            return to_route($this->controller)->with('message', $errorInfo);
        }

        return to_route($this->controller)->with('message', "Registro Atualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blogstream = Blogstream::find($id);
        if ($blogstream === null) {
            return to_route($this->controller)
                ->with('message', "Dados inválidos");
        }
        try {
            $blogstream->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('blogstream.index')->with('message', $errorInfo);
        }

        return to_route('blogstream.index')
            ->with('message', "'{$blogstream->name}' deleted");
    }
}
