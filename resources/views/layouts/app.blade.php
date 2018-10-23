<!DOCTYPE html>
<html>
    <head>
        <title>Microposts</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="Microposts〜 Twitterライクなアプリケーション" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://herokumicroposts2018.herokuapp.com/" />
        <meta property="og:image" content="http://herokumicroposts2018.herokuapp.com/storage/app/public/ogp/Microposts.png" />
        <meta property="og:site_name" content="Microposts" />
        <meta property="og:description" content="フレームワークLaravelではじめてのWebサービス作りをしました。" />

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        @include('commons.navbar')

        <div class="container">
            @include('commons.error_messages')

            @yield('content')
        </div>
    </body>
</html>