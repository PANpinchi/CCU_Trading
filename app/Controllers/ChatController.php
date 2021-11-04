<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ChatController extends BaseController
{
	/* 聊天頁面 */
	public function chat()
	{
        return view('chat/chat');
	}

	/* 接收訊息 */
	public function message()
	{

        return view('chat/chat');
	}
	
}
