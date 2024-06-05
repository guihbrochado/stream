<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarFormRequest;
use App\Models\LiveRoom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoomApiController extends Controller
{
    public function apiRooms()
    {
        $rooms = LiveRoom::orderBy('created_at', 'desc')->get();

        return response()->json($rooms);
    }

}
