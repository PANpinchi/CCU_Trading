<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login_account;

session_start();

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

	/* 帳號頁面 */
	public function account()
	{
		$model = new Login_account();
		$users = $model->findAll(); //取得資料

		/* 尋找帳號 */
		for($i = 0; isset($users[$i]); $i++)
		{
			$name = strcmp($_SESSION['name'], $users[$i]['name']);
			$account = strcmp($_SESSION['account'], $users[$i]['account']);
			$password = strcmp($_SESSION['password'], $users[$i]['password']);

			if($name == 0 && $account == 0 && $password == 0){
				$data = [
					'name' => $users[$i]['name'],
					'department' => $users[$i]['department'],
					'account' => $users[$i]['account'],
					'password' => $users[$i]['password']
				];
				break;
			}
		}
        return view('posts/account', $data);
	}
}
