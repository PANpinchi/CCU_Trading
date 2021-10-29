<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    /* 發文頁面 */
	public function post()
	{
        return view('posts/post');
	}
}
