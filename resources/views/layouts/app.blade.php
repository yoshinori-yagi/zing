<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zing</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/game.css') }}">
        
        <script type="text/javascript" src="js/test.js"></script>
        <script type = "text/javascript" src="/js/game.js"></script>
        
    </head>
    <body>
        @include('commons.navbar3')

        @yield('cover')

        <div class="container">
            @include('commons.error_messages')
            @yield('content')
        </div>

        
    </body>
</html>