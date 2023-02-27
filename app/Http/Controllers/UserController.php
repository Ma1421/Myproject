<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users/index')->with(['users'=>$user->get()]);//モデルクラスからuser.phpのgetメゾットを呼び出す、=>代入
    }
    
    public function show(User $user)//Userクラスを＄userという名前でインスタンス化
    {
        return view('users/show')->with(['user'=>$user]);
    }
    //$userに'user'と名前を付けて（代入）bladeファイル内で使えるようにする
    
    
    public function follow(User $user)
    {
        auth()->user()->follows()->attach($user);//中間テーブルのデータ保存
        return redirect("/users");
    }

    public function unfollow(User $user)
    {
        auth()->user()->follows()->detach($user);//中間テーブルデータ削除
        return redirect("/users");
    }
    
    
    
    
}
//user.phpを使ってusersテーブルを扱うウェイター=コントローラー

