<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seat;

use App\User;

use App\Number;

use App\Game;

use Input;

use DB;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.index', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function numbers($id)
    {
        $user = User::find($id);
        
        $number=Input::get('number');                                               
        $number=htmlspecialchars($number);
        
        $number = rand(1,6);
        
        $data = [
            'number' => $number,
            'user' => $user,
        ];
        

        DB::insert('insert into zing.numbers (number) values (?)',[intval($number)]);
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['user_id_score' => $number]);
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        DB::table('users')->where ('id',intval($team_id))->update(['notification' => 1]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 100]);
        
        return view('games.numbers',$data);                                
        
    }
    
    public function wait($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
  
        ];
        
        if (\Auth::check()) {
            
            return view ('games.wait', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function confirm($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', $id)->update(['notification' => 0]);
        
        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.confirm', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function defence($id)
    {
        $user = User::find($id);
        
        $number=Input::get('number');                                               
        $number=htmlspecialchars($number);          
        
        $number = rand(1,6);
        
        $data = [
            'number' => $number,
            'user' => $user,
        ];

        DB::insert('insert into zing.numbers (number) values (?)',[intval($number)]); 
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['team_id_score' => $number]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 2]);
        
        return view('games.defence',$data);                                
        
    }
    
    public function result($id)
    {
        $user = User::find($id);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.result', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function result_after($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', "=", $id)->update(['notification' => 0]);
        
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.result_after', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function tetoris($id)
    {
        $user = User::find($id);
    
        $data = [
            'user' => $user,
        ];
        
        return view('games.tetoris',$data);                                
        
    }
    
    public function tetoris_result(Request $request) {
        
        $tetoris_score = $request;
        $tetoris_score = $tetoris_score->point;
        
        DB::insert('insert into zing.tetoris (tetoris) values (?)',[intval($tetoris_score)]);

        return $tetoris_score;
        
    }
    
    public function tetoris_wait($id) {
        
        $user = User::find($id);
        
        $tetoris_score = DB::table('tetoris')->orderby('id', 'desc')->select('tetoris.tetoris')->first();
        $tetoris_score = $tetoris_score->tetoris;
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['user_id_score' => $tetoris_score]);
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        DB::table('users')->where ('id',intval($team_id))->update(['notification' => 3]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 100]);
        
        $data = [
            'user' => $user,
            'tetoris_score' => $tetoris_score,
        ];
        
        return view ('games.tetoris_wait', $data);
        
    }
    
    public function tetoris_confirm($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', $id)->update(['notification' => 0]);
        
        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.tetoris_confirm', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function tetoris_defence($id)
    {
        $user = User::find($id);
    
        $data = [
            'user' => $user,
        ];
        
        return view('games.tetoris_defence',$data);                                
        
    }
    
    public function tetoris_game_result($id)
    {
        $user = User::find($id);
        
        $tetoris_score = DB::table('tetoris')->orderby('id', 'desc')->select('tetoris.tetoris')->first();
        $tetoris_score = $tetoris_score->tetoris;
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['team_id_score' => $tetoris_score]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 4]);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.tetoris_result', $data);
        }
        else {
            return redirect('welcome');  
        }
    }

    public function tetoris_result_after($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', "=", $id)->update(['notification' => 0]);
        
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.tetoris_result_after', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
}