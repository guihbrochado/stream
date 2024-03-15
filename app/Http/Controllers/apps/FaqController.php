<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqFormRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //DB::enableQueryLog();
        //Log::info($request->broker);

        $data = DB::table('faqs as f')
            ->join('faq_categories as fc', 'fc.id', '=', 'f.faq_categories_id')
            ->select('f.*')
            ->orderBy('fc.order', 'asc')
            ->orderBy('fc.title', 'asc')
            ->orderBy('f.question', 'asc')
            ->get();

        $grouped = $data->groupBy('faq_categories_id');
        $grouped->all();
        //$grouped->dd();

        $faq_categories = FaqCategory::orderBy('title')->get();
        $faq_categories = $faq_categories->groupBy('id');
        $faq_categories->all();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('web.pages.faq')->with(['data' => $grouped, 'faq_categories' => $faq_categories, 'message' => $message]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_admin(Request $request)
    {

        //DB::enableQueryLog();
        //Log::info($request->broker);

        $data = DB::table('faqs as f')
            ->join('faq_categories as fc', 'fc.id', '=', 'f.faq_categories_id')
            ->select('f.*', 'fc.title')
            ->orderBy('fc.title', 'asc')
            ->orderBy('f.question', 'asc')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.faq.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faq = new Faq();
        $faq_categories = FaqCategory::orderBy('title')->get();

        return view('apps.faq.form')->with(['faq' => $faq, 'faq_categories' => $faq_categories, 'action' => 'create']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        if ($faq === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $faq_categories = FaqCategory::orderBy('title')->get();

        return view('apps.faq.form')->with(['faq' => $faq, 'faq_categories' => $faq_categories, 'action' => 'edit']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqFormRequest $request)
    {
        //$request->validate($this->conta->rules(), $this->conta->feedback());
        try {
            $faq = Faq::create(
                [
                    'faq_categories_id' => $request->faq_categories_id,
                    'icon' => $request->icon,
                    'question' => $request->question,
                    'answer' => $request->answer
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('faq.index_admin')->with('message', $errorInfo);
        }

        return to_route('faq.index_admin')->with('message', "Registrado '{$faq->id}' faq");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);
        if ($faq === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $faq_categories = FaqCategory::orderBy('title')->get();

        return view('apps.faq.form')->with(['faq' => $faq, 'faq_categories' => $faq_categories, 'action' => 'show']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqFormRequest $request, $id)
    {
        $faq = Faq::find($id);
        if ($faq === null) {
            return to_route('faq.index_admin')
                ->with('message', "Invalid data");
        }

        $faq->fill($request->all());
        $faq->save();

        return to_route('faq.index_admin')
            ->with('message', "'{$faq->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        if ($faq === null) {
            return to_route('faq.index_admin')
                ->with('message', "Invalid data");
        }
        $faq->delete();

        return to_route('faq.index_admin')
            ->with('message', "'{$faq->id}' deleted");
    }
}
