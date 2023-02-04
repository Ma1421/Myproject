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
        <div class="footer">
            <a href="/">戻る</a>
</x-app-layout>
