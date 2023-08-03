<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/posts', [PostController::class, 'index']);

// Route::get('/', function() {
//     return view('posts/index');
// });

// '/'に対してPostControllerのindexメソッドを返すように！
Route::get('/', [PostController::class, 'index']);
// 投稿作成画面を表示するためのコードは以下
// GETリクエストの/posts/createで新規作成画面に遷移
Route::get('/posts/create', [PostController::class, 'create']);

// 8-3のコードを追加
// '/posts/{対象のID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('/posts', [PostController::class, 'store']);

// {post}にはidが入る
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('posts/{post}', [PostController::class, 'update']);

Route::delete('/posts/{post}', [PostController::class, 'delete']);
Route::get('/categories/{category}', [CategoryController::class, 'index']);
