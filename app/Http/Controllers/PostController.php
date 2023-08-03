<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

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
		return view('posts/index')->with(['posts' => $post->getPaginateByLimit(5)]);
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
	public function create(Category $category)
	{
		return view('posts.create')->with(['categories' => $category->get()]);
	}
	
	/* Request $request
	|ユーザからのリクエストに含まれるデータを扱う場合、Requestインスタンスを利用できる
	|コントローラがデフォルトでuseしている[*Illuminate\Http\Request]を引数に記載することで利用する
	| Post $post
	|今回はユーザの入力データをDBのpostsテーブルにアクセスし保存する必要があるため、空のPostインスタンスを利用する
	*/
	public function store(PostRequest $request, Post $post)
	{
		// $request['post']: postをキーにもつリクエストパラメータを取得することができる
		// データ構造: $input=['title'->'タイトル', 'body'->'本文']
		$input = $request['post'];
		$post->fill($input)->save();
		return redirect('/posts/' . $post->id);
	}
	
	public function edit(Post $post)
	{
		return view('posts/edit')->with(['post' => $post]);
	}
	
	public function update(PostRequest $request, Post $post)
	{
		$input_post = $request['post'];
		$post->fill($input_post)->save();
		return redirect('/posts/' . $post->id);
	}
	
	public function delete(Post $post)
	{
		// このままだと物理削除になる、論理削除にしたい！->ユーザーの履歴を残す、復旧作業を楽にする
		$post->delete();
		return redirect('/');
	}
}

