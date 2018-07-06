@extends('layouts.app')

@section('content')
<div class = "game_show">
<h1>game</h1>
<div>
<?php
 
$title = 'TWICEで沖縄出身はだれ？';
 
$question = array(); //この変数は配列ですよという宣言
$question = array('さき','こうせい','ことね','てらだ',"やぎ"); //5択の選択肢を設定
 
$answer = $question[2]; //正解の問題を設定
 
shuffle($question); //配列の中身をシャッフル 
 

?>


 
<h2><?php echo $title ?></h2>
 {!! Form::open(['route' => 'game.store']) !!}
<form method="POST" action="show.blade.php">
<?php foreach($question as $q) {?>
   <input type="radio" name="question" value="<?php echo $q; ?>" /> <?php echo $q; ?><br>
   <?php } ?>
   <input type="hidden" name="answer" value="<?php echo $answer ?>">
   <input type="submit" value="回答する">
</form>
 {!! Form::submit('Post', ['class' => 'btn btn-primary']) !!}
 {!! Form::close() !!}
 
<h2>クイズの結果</h2>

       
    </div>
            <a href="{{ route('game.result') }}" class="btn btn-default btn-ghost btn-lg">対戦結果をみる</a>
    </div>
    
@endsection