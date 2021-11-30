<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login_account;
use App\Models\Post;

session_start();

/* 設定時區 */
date_default_timezone_set('Asia/Taipei');

class PostController extends BaseController
{
    /* 商品頁面 */
	public function post()
	{
		$model = new Post();
		$users = $model->findAll(); //取得資料
		$time = date('Y/m/d H:i:s'); // 取得日期與時間

		for($i = 0; isset($users[$i]); $i++)
		{
			$data['seller'][$i] = $users[$i]['seller'];
			$data['name'][$i] = $users[$i]['name'];
			$data['price'][$i] = $users[$i]['price'];
			$data['number'][$i] = $users[$i]['number'];
			$data['time'][$i] = $users[$i]['time'];
			$data['place'][$i] = $users[$i]['place'];
			$data['type'][$i] = $users[$i]['type'];
			$data['image'][$i] = $users[$i]['image'];
			$data['describe'][$i] = $users[$i]['describe'];

			/* 處理時間 */
			$diff_day = abs(strtotime($time) - strtotime($users[$i]['post_time'])) / 86400;
			if($diff_day >= 1){
				$data['post_time'][$i] = $diff_day;
				$data['post_time_type'][$i] = 0; // 天
			}
			else{
				$diff_time = abs(strtotime($time) - strtotime($users[$i]['post_time']));
				if ($diff_time < 60) {
					$data['post_time'][$i] = $diff_time;
					$data['post_time_type'][$i] = 1; // 秒
				}
				else {
					if ($diff_time < 3600) {
						$data['post_time'][$i] = floor($diff_time / 60);
						$data['post_time_type'][$i] = 2; // 分
					}
					else {
						$data['post_time'][$i] = floor($diff_time / 3600);
						$data['post_time_type'][$i] = 3; // 小時
					}
				}
			}
		}
		$data['count'] = $i - 1;
        return view('posts/post', $data);
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

		$ServerFilename1 = ' ';
		if(is_uploaded_file($_FILES['img01']['tmp_name'])){
			$File_Extension = explode(".", $_FILES['img01']['name']);
			$File_Extension = $File_Extension[count($File_Extension)-1];
			$ServerFilename1 = date("YmdHis")."_1.".$File_Extension;
			move_uploaded_file($_FILES['img01']['tmp_name'], 'item_images/'.$ServerFilename1);
		}
		$ServerFilename2 = ' ';
		if(is_uploaded_file($_FILES['img02']['tmp_name'])){
			$File_Extension = explode(".", $_FILES['img02']['name']);
			$File_Extension = $File_Extension[count($File_Extension)-1];
			$ServerFilename2 = date("YmdHis")."_2.".$File_Extension;
			move_uploaded_file($_FILES['img02']['tmp_name'], 'item_images/'.$ServerFilename2);
		}
		$ServerFilename3 = ' ';
		if(is_uploaded_file($_FILES['img03']['tmp_name'])){
			$File_Extension = explode(".", $_FILES['img03']['name']);
			$File_Extension = $File_Extension[count($File_Extension)-1];
			$ServerFilename3 = date("YmdHis")."_3.".$File_Extension;
			move_uploaded_file($_FILES['img03']['tmp_name'], 'item_images/'.$ServerFilename3);
		}

		$ServerFilename = 'a:'.$ServerFilename1.' b:'.$ServerFilename2.' c:'.$ServerFilename3;

		// 取得日期與時間
		$time = date('Y/m/d H:i:s');

		$data = [
			'seller' => $_SESSION['name2'],
			'name' => $this->request->getVar('name'),
			'price' => $this->request->getVar('price'),
			'number' => $this->request->getVar('number'),
			'time' => $this->request->getVar('time'),
			'place' => $this->request->getVar('place'),
			'type' => $this->request->getVar('type'),
			'image' => $ServerFilename,
			'describe' => $this->request->getVar('describe'),
			'post_time' => $time
		];

		$model->save($data);
        echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/post'>";
	}
}
