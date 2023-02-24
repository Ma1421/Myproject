<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view ('auth.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [UserController::class, 'index']);//ユーザー一覧表示
    Route::get('/users/{user}', [UserController::class, 'show']);//{user}例えば１なら１のユーザーのデータが表示できる
    Route::post("/follow/{user}", [UserController::class, "follow"])->name("follow");
    Route::post("/unfollow/{user}", [UserController::class, "unfollow"])->name("unfollow");
});



Route::get('/posts/create', [PostController::class, 'create']);//投稿フォームの表示
Route::post('/posts', [PostController::class, 'store']);//画像を含めた投稿の保存処理
Route::get('/posts/{post}', [PostController::class, 'show']);//投稿詳細画面の表示

Route::delete('/posts/{post}', [PostController::class,'delete']);

Route::post('/comments/{post}', [CommentsController::class, 'store']);

//コメント投稿処理
Route::post('/articles/{comment_id}/comments','CommentsController@store');
//コメント取消処理
Route::get('/comments/{comment_id}', 'CommentsController@destroy');

Route::post('/like/{postId}',[LikeController::class,'store']);
Route::post('/unlike/{postId}',[LikeController::class,'destroy']);





require __DIR__.'/auth.php';

?>
