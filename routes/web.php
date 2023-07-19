<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


/*
|ちなみに！
|アプリを起動して一番最初にブラウザから送られてくるリクエストが'/'(スラッシュ)
|だからトップページを表示するときの引数に'/'を指定することは言わずもがな
*/
