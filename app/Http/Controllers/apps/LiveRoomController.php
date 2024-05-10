<?php

namespace App\Http\Controllers\apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LiveRoom;
use App\Models\LiveRoomTag;
use App\Models\LiveRoomRating;
use Illuminate\Support\Facades\Auth;
use Exception;

class LiveRoomController extends Controller {

    //Método para retornar todas as salas disponíveis para o usuário.
    public function index() {
        $rooms = LiveRoom::all();
        return view('apps.rooms.index', compact('rooms'));
    }

    //Método para o manager ver todos os usuários no dashboard
    public function all() {
        $rooms = LiveRoom::all();
        return view('apps.rooms.all', compact('rooms'));
    }

    Public function create() {
        $rooms = new LiveRoom();
        return view('apps.rooms.form')->with(['rooms' => $rooms, 'action' => 'create']);
    }

    public function store(Request $request) {
        $fileName = '';
        $folder = public_path('assets/images/rooms');

        $authId = Auth::id();
        $authName = urlencode(Auth::user()->name);
        $title = urlencode($request->title);

        // Salva a imagem de capa se ela estiver presente e for válida
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $file = $request->file('cover');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
        }

        // Cria URLs corretamente codificadas para admin e cliente
        $api_url = env('API_VIDEO_ROOM');
        $adminVideoUrl = "$api_url/?username=$authName&room=$title&admin=1";
        $clientVideoUrl = "$api_url/?username=$authName&room=$title&admin=0";

        // Tenta salvar os dados e as tags relacionadas
        try {
            $room = LiveRoom::create([
                        'title' => $request->title,
                        'cover' => $fileName,
                        'description' => $request->description,
                        'is_free' => $request->is_free,
                        'price' => str_replace(',', '.', $request->price),
                        'link_admin' => $adminVideoUrl,
                        'link_client' => $clientVideoUrl,
            ]);

            // Processa as tags
            $tagNames = $request->input('tags');
            if ($tagNames) {
                if (is_string($tagNames)) {
                    $tagNames = explode(',', $tagNames);
                }

                $tagIds = [];
                foreach ($tagNames as $tagName) {
                    $tagName = trim($tagName);
                    $tag = LiveRoomTag::firstOrCreate(['tag_name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
                $room->tags()->sync($tagIds);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('rooms.all')->with('message', "Sala '{$room->title}' criada com sucesso.");
    }

    public function detail($id) {
        $data = LiveRoom::with('tags')->find($id);

        $otherRooms = LiveRoom::where('id', '!=', $id)->get();

        $api_url = env('API_VIDEO_ROOM');
        $authName = Auth::user()->name;

        $room = $otherRooms[0]->title;

        $clientVideoUrl = "$api_url/?username=$authName&room=$room&admin=0";

        return view('apps.rooms.detail', compact('data', 'otherRooms', 'clientVideoUrl'));
    }

    public function show(LiveRoom $room) {

        $otherRooms = LiveRoom::all();
        $room->load('tags');

        return view('apps.rooms.show', compact('room', 'otherRooms'));
    }
}
