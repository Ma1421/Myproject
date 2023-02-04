<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Timeline</title>
        <!-- Fonts 
        -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Timeline</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                 <div class='post'>
                    <a href="/posts/{{ $post ->id }}">
                    <p class='body'>{{ $post->body }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <a href='/posts/create'>create</a>
    </body>
</html>