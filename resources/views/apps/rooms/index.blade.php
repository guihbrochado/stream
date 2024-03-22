@extends('layouts.master-without-nav')

@section('content')
<div class="container">
    <h2>Salas Ao Vivo Disponíveis</h2>
    <ul>
        @foreach ($rooms as $room)
            <li><a href="{{ route('rooms.show', $room->id) }}">{{ $room->title }}</a></li>
        @endforeach
    </ul>
</div>


<script src="{{ asset('assets/js/webrtc.js') }}"></script>
@endsection