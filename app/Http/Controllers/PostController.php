<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Post $post)//インスタンス化Postモデル（設計図）を$postとしてインスタンス化
    {
       $id = Auth::id();// 今ログインしているユーザーのIDをとってくる処理

        
        return view('posts/index')->with(['posts' => $post->get()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
       //$post->geet()で、データベースのpostsテーブルからすべてのデータをとってくる→bladeファイルを表示させる
       
    }
    
}
?>