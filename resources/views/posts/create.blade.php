<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create</title>
    </head>
    <body>
        <form action="/posts" method="POST">
            @csrf
            <div class="body">
                <h2>Create post</h2>
                <textarea name="post[body]" placeholder="留学の思い出、お役立ち情報など"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>