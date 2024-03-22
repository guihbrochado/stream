@extends('layouts.master-without-nav')

@section('content')
<div class="container">
    <h2>{{ $room->title }}</h2>
    <div id="video-container">
        <video id="localVideo" autoplay muted></video>
        <video id="remoteVideo" autoplay></video>
    </div>
    <button id="startButton">Iniciar Vídeo</button>
</div>

<script src="{{ asset('assets/js/webrtc.js') }}"></script>
@endsection