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
}

