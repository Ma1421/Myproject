<!DOCTYPE html><!--一覧ページ-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Timeline</title>
        <!-- Fonts 
        -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/timeline.css') }}" >
    </head>
    <body>
        <x-app-layout>
            <br>
        <div class='posts'>
            @foreach ($posts as $post)
                 <div class='post'>
                    <a href="/posts/{{ $post ->id }}">
                    <h3 class='body'>{{ $post->body }}</h3>
                    </a>
                    <a href="/users/{{$post->user->id}}">
                    <p>{{$post->user->name}}</p><!--投稿者の名前を推したら上のURLに飛ぶ-->
                    </a>
                    
                    @if($post->user_id == Auth::user()->id)<!--投稿した人とログインした人が一緒の場合以下の処理を行う-->
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                    @endif
                    
                    @if(Auth::user()->isLike($post->id))<!--今ログインしているユーザーがLikeしているか-->
                    
                    <button onclick="unlike({{$post->id}})">いいね解除</button>
                    @else
                    <button onclick="like({{$post->id}})">いいね</button><!--いいねボタン-->
                    @endif
                </div>
                <br>
            @endforeach
            
        </div>
        <script>
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