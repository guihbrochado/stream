<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Calendar;

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
        $message = session('message');

        return view('web.pages.calendar')->with('data', $data)->with('message', $message);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_admin()
    {
        $data = Calendar::select('id', 'title', 'start', 'end', 'all_day as allDay', 'class_name as className')->get();
        $message = session('message');

        return view('apps.calendar.index')->with('data', $data)->with('message', $message);
    }
}
