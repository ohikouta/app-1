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
		return view('posts/show')->with(['post' => $post]);
		// 'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス
	}
	
	// 以下にcreateメソッドを定する
	public function create()
	{
		return view('posts/create');
	}
	
	/* Request $request
	|ユーザからのリクエストに含まれるデータを扱う場合、Requestインスタンスを利用できる
	|コントローラがデフォルトでuseしている[*Illuminate\Http\Request]を引数に記載することで利用する
	| Post $post
	|今回はユーザの入力データをDBのpostsテーブルにアクセスし保存する必要があるため、空のPostインスタンスを利用する
	*/
	public function store(Request $request, Post $post)
	{
		// $request['post']: postをキーにもつリクエストパラメータを取得することができる
		// データ構造: $input=['title'->'タイトル', 'body'->'本文']
		$input = $request['post'];
		$post->fill($input)->save();
		return redirect('posts/' . $post->id);
	}
}

