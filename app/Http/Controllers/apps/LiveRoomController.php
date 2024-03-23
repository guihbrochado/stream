<?php

namespace App\Http\Controllers\apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LiveRoom;
use Exception;

class LiveRoomController extends Controller {

    public function index() {
        $rooms = LiveRoom::all();
        return view('apps.rooms.index', compact('rooms'));
    }

    Public function create() {
        $rooms = new LiveRoom();
        return view('apps.rooms.form')->with(['rooms' => $rooms, 'action' => 'create']);
    }

    public function store(Request $request) {
        $fileName = '';
        $folder = public_path('assets/images/rooms');

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file = $request->file('cover');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
        }

        $price = str_replace(',', '.', $request->price);

        try {
            $room = LiveRoom::create([
                        'title' => $request->title,
                        'cover' => $fileName,
                        'description' => $request->description,
                        'is_free' => $request->is_free,
                        'price' => $price,
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('apps.rooms.index')->with('message', "Sala '{$room->title}' criada com sucesso.");
    }

    public function show(LiveRoom $room) {
        return view('apps.rooms.show', compact('room'));
    }
}
