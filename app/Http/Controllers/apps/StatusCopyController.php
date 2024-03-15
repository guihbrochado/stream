<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;

class StatusCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('apps.status-copy.index');
    }
}
