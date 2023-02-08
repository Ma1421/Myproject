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
        <x-app-layout>
        <h1>Timeline</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                 <div class='post'>
                    <a href="/posts/{{ $post ->id }}">
                    <h3 class='body'>{{ $post->body }}</h3>
                    </a>
                    <p>{{$post->user->name}}</p>
                    @if($post->user_id == Auth::user()->id)
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                    @endif
                </div>
            @endforeach
        </div>
        <a href='/posts/create'>create</a><script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </x-app-layout>
    </body>
</html>