<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsagePolicyFormRequest;
use App\Models\UsagePolicy;
use App\Models\UsagePolicyCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsagePolicyController extends Controller
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

        $data = DB::table('usage_policies as f')
            ->join('usage_policy_categories as fc', 'fc.id', '=', 'f.usage_policy_category_id')
            ->select('f.*')
            ->orderBy('fc.order', 'asc')
            ->orderBy('fc.title', 'asc')
            ->orderBy('f.question', 'asc')
            ->get();

        $grouped = $data->groupBy('usage_policy_category_id');
        $grouped->all();
        //$grouped->dd();

        $usage_policy_categories = UsagePolicyCategory::orderBy('title')->get();
        $usage_policy_categories = $usage_policy_categories->groupBy('id');
        $usage_policy_categories->all();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('web.pages.usage_policy')->with(['data' => $grouped, 'usage_policy_categories' => $usage_policy_categories, 'message' => $message]);
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

        $data = DB::table('usage_policies as f')
            ->join('usage_policy_categories as fc', 'fc.id', '=', 'f.usage_policy_category_id')
            ->select('f.*', 'fc.title')
            ->orderBy('fc.title', 'asc')
            ->orderBy('f.question', 'asc')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.usage_policy.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usage_policy = new UsagePolicy();
        $usage_policy_categories = UsagePolicyCategory::orderBy('title')->get();

        return view('apps.usage_policy.form')->with(['usage_policy' => $usage_policy, 'usage_policy_categories' => $usage_policy_categories, 'action' => 'create']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usage_policy = UsagePolicy::find($id);
        if ($usage_policy === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $usage_policy_categories = UsagePolicyCategory::orderBy('title')->get();

        return view('apps.usage_policy.form')->with(['usage_policy' => $usage_policy, 'usage_policy_categories' => $usage_policy_categories, 'action' => 'edit']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsagePolicyFormRequest $request)
    {
        //$request->validate($this->conta->rules(), $this->conta->feedback());
        try {
            $usage_policy = UsagePolicy::create(
                [
                    'usage_policy_category_id' => $request->usage_policy_category_id,
                    'icon' => $request->icon,
                    'question' => $request->question,
                    'answer' => $request->answer
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('usage_policy.index_admin')->with('message', $errorInfo);
        }

        return to_route('usage_policy.index_admin')->with('message', "Registrado '{$usage_policy->id}' usage_policy");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usage_policy = UsagePolicy::find($id);
        if ($usage_policy === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $usage_policy_categories = UsagePolicyCategory::orderBy('title')->get();

        return view('apps.usage_policy.form')->with(['usage_policy' => $usage_policy, 'usage_policy_categories' => $usage_policy_categories, 'action' => 'show']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsagePolicyFormRequest $request, $id)
    {
        $usage_policy = UsagePolicy::find($id);
        if ($usage_policy === null) {
            return to_route('usage_policy.index_admin')
                ->with('message', "Invalid data");
        }

        $usage_policy->fill($request->all());
        $usage_policy->save();

        return to_route('usage_policy.index_admin')
            ->with('message', "'{$usage_policy->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usage_policy = UsagePolicy::find($id);
        if ($usage_policy === null) {
            return to_route('usage_policy.index_admin')
                ->with('message', "Invalid data");
        }
        $usage_policy->delete();

        return to_route('usage_policy.index_admin')
            ->with('message', "'{$usage_policy->id}' deleted");
    }
}
