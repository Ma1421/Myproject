<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Top page</title>
        <link rel="stylesheet" href="{{ asset('/css/top.css')  }}" ><!--assetはpublicフォルダー-->
        
    </head>
    <body>
        <div class="container">
        <h1>MY JOURNY .COM</h1></h1>
        
        <button onclick="location.href='{{route('login')}}'" class="button">Login</button>
        <!--名前付きルート　auth.phpに書いてる-->
        
        <button onclick="location.href='{{route('register')}}'" class="button">Register</button>
        </div>
        
        
    </body>
</html>

<!--ここにログイン、新規登録画面HTML-->


