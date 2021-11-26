<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    /* 商品頁面 */
	public function post()
	{
        return view('posts/post');
	}

	/* 發文頁面 */
	public function create()
	{
        return view('posts/create');
	}
}
