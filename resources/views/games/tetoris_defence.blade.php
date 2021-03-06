@extends('layouts.app')

@section('content')
    <div class="cover">
        <div class = "aside">
            <h2>Time:</h2><h2 id ="time"></h2>
            <h2>Score:</h2><h2 id="score"></h2>
        </div>
        <div id="wrapper">
            <div id = "speedup"></div>
            <canvas id="canvas"></canvas>
        </div>
        <div class="tetoris_buttons">
            <input class = "tetoris_btn tetoris_turn" type="button" value="turn" onclick="myfunc1()">
            <input class = "tetoris_btn tetoris_left" type="button" value="left" onclick="myfunc2()">
            <input class = "tetoris_btn tetoris_right" type="button" value="right" onclick="myfunc3()">
            <input class = "tetoris_btn tetoris_down" type="button" value="down" onclick="myfunc4()">
        </div>
        <script type = "text/javascript" src="/js/game.js">
        </script>
        <a href="{{ route('tetoris.game_result', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Send this result</a>
        <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
        <h3 class="information">ハイスコアを獲得して相手から席を守るのじゃ！<br>ゲームが終了したら結果を送信するのじゃ！</h3>
    </div>
@endsection