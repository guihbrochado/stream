<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BlogCategory;
use App\Http\Requests\BlogCategoryFormRequest;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Assigning a value to $controller in the constructor
        $this->controller = "blogcategory.index";
    }

    public function index()
    {
        $data = BlogCategory::all();
        $message = session('message');

        return view('apps.blogcategory.index', ['data' => $data, 'controller' => $this->controller, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogcategory = new BlogCategory;
        
        return view('apps.blogcategory.create')->with(['blogcategory' => $blogcategory, 'controller' => $this->controller,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryFormRequest  $request)
    {
    
        try {
            $blogcategory = BlogCategory::create($request->all());

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
        $data = BlogCategory::find($id);
      
        return view('apps.blogcategory.show')->with(['data' => $data, 'controller' => $this->controller, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = BlogCategory::find($id);
     
        return view('apps.blogcategory.edit')->with(['data' => $data, 'controller' => $this->controller, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryFormRequest $request, $id)
    {
        $blogcategory = BlogCategory::find($id);
        if ($blogcategory === null) {
            return to_route('blogcategory.index')->with('message', "Dados inválidos");
        }
        $blogcategory->fill($request->all());

        $fileName = '';
        $folder = public_path('images/blogcategory');

        if ($request->hasFile('imgcapa') && $request->file('imgcapa')->isValid()) {
            $file = $request->file('imgcapa');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);        
            $blogcategory->imgcapa = $fileName;

        }

        try {
            $blogcategory->save();
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
        $blogcategory = BlogCategory::find($id);
        if ($blogcategory === null) {
            return to_route($this->controller)
                ->with('message', "Dados inválidos");
        }
        try {
            $blogcategory->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('blogcategory.index')->with('message', $errorInfo);
        }

        return to_route('blogcategory.index')
            ->with('message', "'{$blogcategory->name}' deleted");
    }
}