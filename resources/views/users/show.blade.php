@extends('layouts.app')

@section('content')
    <div class = "cover">
         <div class="row">
            <aside class="col-xs-4">
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">Seat number</h3>
                    </div>
                    <div class="profile_body">
                        <h2><a href="{{ route('seat', ['id' => $user->id])}}"><span class="profile_link">{{ $user_id_seat }}</span></a></h2>
                    </div>
                </div>
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">Points</h3>
                    </div>
                    <div class="profile_body">
                        <h3><a href="{{ route('users.buy', ['id' => $user->id])}}"><span class="profile_link">{{ $user->points }} points</span></a></h3>
                    </div>
                </div>
            </aside>
            
            <div class="col-xs-8">
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">Team Name</h3>
                    </div>
                    <div class="profile_body">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>
                
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">Notification</h3>
                    </div>
                    <div class="profile_body">
                        @if($notification == 0)
                        <br>
                        @elseif($notification == 1)
                        <h3>You are under attack.
                        <a href="{{ route('game.confirm', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">Start numbers game</a>
                        </h3>
                        @elseif($notification == 2)
                        <h3>Game finished.
                        <a href="{{ route('game.result_after', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">See result</a>
                        </h3>
                        @elseif($notification == 3)
                        <h3>You are under attack.
                        <a href="{{ route('tetoris.confirm', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">Start tetoris game</a>
                        </h3>
                        @elseif($notification == 4)
                        <h3>Game finished.
                        <a href="{{ route('tetoris.result_after', ['id' => $user->id])}}" class="btn btn-ghost btn-lg profile_btn">See result</a>
                        </h3>
                        @elseif($notification == 5)
                        <h3>You are under attack.
                        <a href="{{ route('block.confirm', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">Start block game</a>
                        </h3>
                        @elseif($notification == 6)
                        <h3>Game finished.
                        <a href="{{ route('block.result_after', ['id' => $user->id])}}" class="btn btn-ghost btn-lg profile_btn">See result</a>
                        </h3>
                        @elseif($notification == 10)
                        <h3>Your attack refused. 
                        <a href="{{ route('refused', ['id' => $user->id])}}" class="btn btn-ghost btn-lg profile_btn">Go</a>
                        </h3>
                        @else($notification == 100)
                        <h3>Game haven't finished. (vs {{ $team_name }})</h3>
                        <h3>Wait for a moment.</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
            <a href = "{{ route('seat', ['id' => $user->id]) }}"><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
            <h3 class="information">explanation</h3>
    </div>
@endsection