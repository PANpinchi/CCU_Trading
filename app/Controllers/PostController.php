<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login_account;
use App\Models\Post;

session_start();

class PostController extends BaseController
{
    /* 商品頁面 */
	public function post()
	{
		$model = new Post();
		$users = $model->findAll(); //取得資料
		
        return view('posts/post');
	}

	/* 發文頁面 */
	public function create()
	{
        return view('posts/create');
	}

	/* 我的帳號頁面 */
	public function myaccount()
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
					'name2' => $users[$i]['name2'],
					'department' => $users[$i]['department'],
					'account' => $users[$i]['account'],
					'password' => $users[$i]['password'],
					'phone' => $users[$i]['phone'],
					'birthday' => $users[$i]['birthday'],
					'sex' => $users[$i]['sex']
				];
				break;
			}
		}
        return view('posts/myaccount', $data);
	}

	/* 發布商品 */
	public function post_item()
	{
		$model = new Post();
		$users = $model->findAll(); //取得資料

		if(is_uploaded_file($_FILES['img']['tmp_name'])){
			$File_Extension = explode(".", $_FILES['img']['name']);
			$File_Extension = $File_Extension[count($File_Extension)-1];
			$ServerFilename = date("YmdHis").".".$File_Extension;
			move_uploaded_file($_FILES['img']['tmp_name'], 'item_images/'.$ServerFilename);
		}

		$data = [
			'name' => $this->request->getVar('name'),
			'price' => $this->request->getVar('price'),
			'number' => $this->request->getVar('number'),
			'time' => $this->request->getVar('time'),
			'place' => $this->request->getVar('place'),
			'type' => $this->request->getVar('type'),
			'image' => $ServerFilename,
			'describe' => $this->request->getVar('describe')
		];

		$model->save($data);
        return view('posts/post');
	}
}
