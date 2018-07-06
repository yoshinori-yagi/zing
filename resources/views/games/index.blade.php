@extends('layouts.app')

@section('content')
    <div class = "game_index">
            <h1>gameを選ぶ！！</h1>
            <div>
              <a href="{{ route('game.show') }}"><img src="{{ secure_asset("css/images/qa.jpg") }}" alt=""></a>
              
              
                
                
            </div>
            <a href="" class="btn btn-default btn-ghost btn-lg game_start">Gameをはじめる</a>
    </div>
    
@endsection