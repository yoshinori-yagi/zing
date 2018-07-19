@extends('layouts.app')

@section('content')
    <div class="cover">
        <div id="wrapper">
            <div id = "speedup"></div>
            <canvas id="canvas"></canvas>
            <div id="score"></div>
            <div id ="time"></div>
        </div>
        <script type = "text/javascript" src="/js/game.js">
        </script>
        <a href="{{ route('tetoris.game_result', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Send this result</a>
        <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
        <h3 class="information">explanation</h3>
    </div>
@endsection