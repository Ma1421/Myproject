<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    //
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    public function store(Request $request,$post_id)
   {
       $comment = new Comment();//インスタンス化
       $comment->comment = $request->comment;
       $comment->user_id = \Auth::user()->id;//::user()=今ログインしているユーザーのIDをcommentsテーブルに入れるための処理
       $comment->post_id = $post_id;
       $comment->save();//保存

       return redirect('/');
   }

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
