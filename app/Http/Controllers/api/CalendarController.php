<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarFormRequest;
use App\Models\Calendar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Calendar::select('id', 'title', 'start', 'end', 'all_day as allDay', 'class_name as className')->get();

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(CalendarFormRequest $request)
    {
        //Log::info($request);
        try {
            $calendar = Calendar::create(
                [
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'all_day' => $request->all_day,
                    'class_name' => $request->class_name
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('page.calendar.index')->with('message', $errorInfo);
        }
        return $calendar->id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CalendarFormRequest $request, $id)
    {
        //Log::info($id);
        //Log::info($request);
        $calendar = Calendar::find($id);
        if ($calendar === null) {
            return to_route('page.calendar.index')
                ->with('message', "Dados inválidos");
        }

        $calendar->fill($request->all());
        if ($request->all_day === null) {
            $calendar->all_day = 0;
        }
        try {
            $calendar->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('page.calendar.index')->with('message', $errorInfo);
        }

        //return to_route('page.calendar.index')->with('message', "'{$calendar->title}' atualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = Calendar::find($id);
        if ($calendar === null) {
            return to_route('page.calendar.index')
                ->with('message', "Dados inválidos");
        }
        try {
            $calendar->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('cpage.calendar.index')->with('message', 'Não foi possível excluir este registro');
        }

        //return to_route('page.calendar.index')->with('message', "'{$calendar->title}' excluído");
    }
}
