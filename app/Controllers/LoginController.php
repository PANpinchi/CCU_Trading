<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    /* 登入頁面 */
	public function login()
	{
        return view('login/login');
	}

    /* 註冊頁面 */
	public function signup()
	{
        return view('login/signup');
	}

    public function compare_account()
	{
        return ;
	}
    
}
