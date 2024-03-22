<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveRoom;

class LiveRoomController extends Controller
{
    public function index() {
        $rooms = LiveRoom::all();
        return view('apps.rooms.index', compact('rooms'));
    }
    
    public function show(LiveRoom $room) {
        return view('apps.rooms.show', compact('room'));
    }
}
