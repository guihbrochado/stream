<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BlogImage;
use App\Http\Requests\BlogimageFormRequest;

class BlogImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Assigning a value to $controller in the constructor
        $this->controller = "blogimage.index";
    }

    public function index()
    {
        $data = Blogimage::all();
        $message = session('message');

        return view('apps.blogimage.index', ['data' => $data, 'controller' => $this->controller, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogimage = new Blogimage;
        
        return view('apps.blogimage.create')->with(['blogimage' => $blogimage, 'controller' => $this->controller,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogimageFormRequest  $request)
    {
    
        try {
            $blogimage = Blogimage::create($request->all());

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
        $data = Blogimage::find($id);
      
        return view('apps.blogimage.show')->with(['data' => $data, 'controller' => $this->controller, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Blogimage::find($id);
     
        return view('apps.blogimage.edit')->with(['data' => $data, 'controller' => $this->controller, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogimageFormRequest $request, $id)
    {
        $blogimage = Blogimage::find($id);
        if ($blogimage === null) {
            return to_route('blogimage.index')->with('message', "Dados inválidos");
        }
        $blogimage->fill($request->all());

        $fileName = '';
        $folder = public_path('images/blogimage');

        if ($request->hasFile('imgcapa') && $request->file('imgcapa')->isValid()) {
            $file = $request->file('imgcapa');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);        
            $blogimage->imgcapa = $fileName;

        }

        try {
            $blogimage->save();
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
        $blogimage = Blogimage::find($id);
        if ($blogimage === null) {
            return to_route($this->controller)
                ->with('message', "Dados inválidos");
        }
        try {
            $blogimage->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('blogimage.index')->with('message', $errorInfo);
        }

        return to_route('blogimage.index')
            ->with('message', "'{$blogimage->name}' deleted");
    }
}