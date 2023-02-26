<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create</title>
    </head>
    <body>
        <x-app-layout>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            <!--enctype=ファイルを送信する際にデータの形式を決めるもの
            様々なファイルを添付することができるmultipart/form-data-->
            @csrf
            <div class="body">
                <h2>Create post</h2>
                <br>
                <textarea name="post[body]" placeholder="留学の思い出、お役立ち情報など"></textarea>
            </div>
            <br>
            <div class="image">
                <input type="file" name="image">
                <!--type属性=file...ファイルをアップロード-->
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
</html>