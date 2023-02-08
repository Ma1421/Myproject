<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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



require __DIR__.'/auth.php';

?>
