<x-app-layout>
    <x-slot name="header">
        　Show
    </x-slot>
        <div class='content'>
            <div class="content_post">
                <h3>本文</h3>
                <p class="body">{{ $post->body }}</p>
                
            </div>
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit">edit</a>
            </div>
        </div>  
        
        <div>
            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
        </div>
            
        <form action="/comments/{{$post->id}}" method="POST">
            <!--enctype=ファイルを送信する際にデータの形式を決めるもの
            様々なファイルを添付することができるmultipart/form-data-->
            @csrf
            <div class="body">
                <h2>Create comment</h2>
                <textarea name="comment" placeholder="コメントを入力してください"></textarea>
            </div>
            
            <input type="submit" value="store"/>
        </form>
        <div>
            @foreach($comments as $comment)
                <p>{{$comment->comment}}</p>
            @endforeach
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
</x-app-layout>
