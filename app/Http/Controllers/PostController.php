<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
	/*
	以下のコメントアウトした以前のコードは、
	poststableから取得した全データをそのままリターンしていた、
	*/
	// public function index(Post $post)
	// {
	// 	return $post->get();
	// }
	public function index(Post $post)
	{
		return view('posts/index')->with(['posts' => $post->getPaginateByLimit(1)]);
	}
	/*
	* 特定IDのpostを表示する
	*
	*@params Object Post // 引数の$postはid=1のPostインスタンス
	*@return Reponse not 
	*
	*/
	public function show(Post $post)
	{
		return view('posts.show')->with(['post' => $post]);
		// 'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス
	}
}

