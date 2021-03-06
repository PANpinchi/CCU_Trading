<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login_account;
use App\Models\Admin_account;
use App\Models\Message;
use App\Models\Post;
use App\Models\Report;

session_start();

/* 設定時區 */
date_default_timezone_set('Asia/Taipei');

class PostController extends BaseController
{
    /* 全部商品頁面 */
	public function post()
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model1 = new Login_account();
		$model2 = new Post();
		$model3 = new Message();
		$model4 = new Admin_account();
		
		$users = $model1->findAll(); //取得資料
		$posts = $model2->findAll();
		$talks = $model3->findAll();
		$admin = $model4->findAll();

		/* 計算聊過天的人數 */
		$counts = 0;
		$chat_people = array();
		for($i = 0; isset($talks[$i]); $i++){}
		$i--;
		while($i >= 0)
		{
			$check = 0;
			if($talks[$i]['name_from'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $talks[$i]['name_to']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $talks[$i]['name_to']);
					$counts++;
				}
			}
			else if($talks[$i]['name_to'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $talks[$i]['name_from']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $talks[$i]['name_from']);
					$counts++;
				}
			}
			$i--;
		}

		/* 聊過天的帳號轉換名稱 */
		$chat_name = array();
		$chat_header = array();
		for($i = 0; isset($chat_people[$i]); $i++){
			/* 檢查使用者名稱 */
			for($j = 0; isset($users[$j]); $j++){
				if($users[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, $users[$j]['name2']);
					array_push($chat_header, $users[$j]['header']);
					break;
				}
			}

			/* 檢查管理員名稱 */
			for($j = 0; isset($admin[$j]); $j++){
				if($admin[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, '管理員大大');
					array_push($chat_header, NULL);
					break;
				}
			}
		}

		$data = [
			'chat_people' => $chat_people,
			'chat_name' => $chat_name,
			'chat_header' => $chat_header,
			'counts' => $counts
		];
		
		$time = date('Y/m/d H:i:s'); // 取得日期與時間

		for($i = 0; isset($posts[$i]); $i++)
		{
			$data['id'][$i] = $posts[$i]['id'];
			$data['seller'][$i] = $posts[$i]['seller'];
			$data['seller_account'][$i] = $posts[$i]['seller_account'];
			$data['way'][$i] = $posts[$i]['way'];
			$data['name'][$i] = $posts[$i]['name'];
			$data['price'][$i] = $posts[$i]['price'];
			$data['number'][$i] = $posts[$i]['number'];
			$data['time'][$i] = $posts[$i]['time'];
			$data['place'][$i] = $posts[$i]['place'];
			$data['type'][$i] = $posts[$i]['type'];
			$data['image'][$i] = $posts[$i]['image'];
			$data['describe'][$i] = $posts[$i]['item_describe'];

			for($j = 0; isset($users[$j]); $j++){
				if($users[$j]['account'] == $posts[$i]['seller_account']){
					$data['header'][$i] = $users[$j]['header'];
					break;
				}
			}

			/* 處理時間 */
			$diff_day = abs(strtotime($time) - strtotime($posts[$i]['post_time'])) / 86400;
			if($diff_day >= 1){
				$diff_day = floor($diff_day);
				$data['post_time'][$i] = $diff_day;
				$data['post_time_type'][$i] = 0; // 天
			}
			else{
				$diff_time = abs(strtotime($time) - strtotime($posts[$i]['post_time']));
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

	/* 特定類別商品頁面 */
	public function post_type($item)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model1 = new Login_account();
		$model2 = new Post();
		$model3 = new Message();
		$model4 = new Admin_account();
		
		$users = $model1->findAll(); //取得資料
		$posts = $model2->where('type', $item)->findAll();
		$talks = $model3->findAll();
		$admin = $model4->findAll();

		/* 計算聊過天的人數 */
		$counts = 0;
		$chat_people = array();
		for($i = 0; isset($talks[$i]); $i++){}
		$i--;
		while($i >= 0)
		{
			$check = 0;
			if($talks[$i]['name_from'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $talks[$i]['name_to']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $talks[$i]['name_to']);
					$counts++;
				}
			}
			else if($talks[$i]['name_to'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $talks[$i]['name_from']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $talks[$i]['name_from']);
					$counts++;
				}
			}
			$i--;
		}

		/* 聊過天的帳號轉換名稱 */
		$chat_name = array();
		$chat_header = array();
		for($i = 0; isset($chat_people[$i]); $i++){
			/* 檢查使用者名稱 */
			for($j = 0; isset($users[$j]); $j++){
				if($users[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, $users[$j]['name2']);
					array_push($chat_header, $users[$j]['header']);
					break;
				}
			}

			/* 檢查管理員名稱 */
			for($j = 0; isset($admin[$j]); $j++){
				if($admin[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, '管理員大大');
					array_push($chat_header, NULL);
					break;
				}
			}
		}

		$data = [
			'chat_people' => $chat_people,
			'chat_name' => $chat_name,
			'chat_header' => $chat_header,
			'counts' => $counts
		];
		
		$time = date('Y/m/d H:i:s'); // 取得日期與時間

		for($i = 0; isset($posts[$i]); $i++)
		{
			$data['id'][$i] = $posts[$i]['id'];
			$data['seller'][$i] = $posts[$i]['seller'];
			$data['seller_account'][$i] = $posts[$i]['seller_account'];
			$data['way'][$i] = $posts[$i]['way'];
			$data['name'][$i] = $posts[$i]['name'];
			$data['price'][$i] = $posts[$i]['price'];
			$data['number'][$i] = $posts[$i]['number'];
			$data['time'][$i] = $posts[$i]['time'];
			$data['place'][$i] = $posts[$i]['place'];
			$data['type'][$i] = $posts[$i]['type'];
			$data['image'][$i] = $posts[$i]['image'];
			$data['describe'][$i] = $posts[$i]['item_describe'];

			for($j = 0; isset($users[$j]); $j++){
				if($users[$j]['account'] == $posts[$i]['seller_account']){
					$data['header'][$i] = $users[$j]['header'];
					break;
				}
			}

			/* 處理時間 */
			$diff_day = abs(strtotime($time) - strtotime($posts[$i]['post_time'])) / 86400;
			if($diff_day >= 1){
				$diff_day = floor($diff_day);
				$data['post_time'][$i] = $diff_day;
				$data['post_time_type'][$i] = 0; // 天
			}
			else{
				$diff_time = abs(strtotime($time) - strtotime($posts[$i]['post_time']));
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

	/* 發文頁面-商品類型 */
	public function create_type()
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

        return view('posts/create_type');
	}

	/* 發文頁面 */
	public function create($type)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$data['type'] = $type;
        return view('posts/create', $data);
	}

	/* 修改商品資料頁面 */
	public function modify_item($id)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model = new Post();
		$data = [
			'post' => $model->find($id)
		];

		/* 找圖片 */
		$data['img'][0] = '?';
		$data['img'][1] = '?';
		$data['img'][2] = '?';
		$t = 0;
		$count = 0;
		for($j = 0; isset($data['post']['image'][$j]); $j++){
			if($data['post']['image'][$j] == ':'){
				if($data['post']['image'][$j+1] == ' '){
					continue;
				}
				else{
					for($k = $j+1; isset($data['post']['image'][$k]); $k++){
						if($data['post']['image'][$k] != ' '){
							$data['img'][$t][$k-($j+1)] = $data['post']['image'][$k];
						}
						else{
							$t++;
							$count++;
							break;
						}
					}

					if(!isset($data['post']['image'][$k])){
						$count++;
					}
				}
			}
		}
		
        return view('posts/modify_item', $data);
	}

	/* 單一商品頁面 */
	public function item($id)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model1 = new Login_account();
		$model2 = new Post();

		$time = date('Y/m/d H:i:s'); // 取得日期與時間

		$users = $model1->findAll();
		$data = [
			'post' => $model2->find($id)
		];

		for($i = 0; isset($users[$i]); $i++){
			if($data['post']['seller_account'] == $users[$i]['account']){
				$data['header'] = $users[$i]['header'];
			}
		}

		/* 處理時間 */
		$diff_day = abs(strtotime($time) - strtotime($data['post']['post_time'])) / 86400;
		if($diff_day >= 1){
			$diff_day = floor($diff_day);
			$data['post']['post_time'] = $diff_day;
			$data['post_time_type'] = 0; // 天
		}
		else{
			$diff_time = abs(strtotime($time) - strtotime($data['post']['post_time']));
			if ($diff_time < 60) {
				$data['post']['post_time'] = $diff_time;
				$data['post_time_type'] = 1; // 秒
			}
			else {
				if ($diff_time < 3600) {
					$data['post']['post_time'] = floor($diff_time / 60);
					$data['post_time_type'] = 2; // 分
				}
				else {
					$data['post']['post_time'] = floor($diff_time / 3600);
					$data['post_time_type'] = 3; // 小時
				}
			}
		}

        return view('posts/item', $data);
	}


	/* 我的帳號頁面 */
	public function myaccount()
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model = new Login_account();
		$model2 = new Post();
		$users = $model->findAll(); //取得資料
		$posts = $model2->findAll();

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
					'sex' => $users[$i]['sex'],
					'header' => $_SESSION['header']
				];
				break;
			}
		}

		for($i = 0, $j = 0; isset($posts[$i]); $i++){
			if($posts[$i]['seller_account'] == $_SESSION['account']){
				$data['post'][$j++] = $posts[$i];
			}
		}

		$data['count'] = $j;
        return view('posts/myaccount', $data);
	}

	/* 修改我的帳號頁面 */
	public function change_account()
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model = new Login_account();
		$model2 = new Post();
		$users = $model->findAll(); //取得資料
		$posts = $model2->findAll();

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
					'sex' => $users[$i]['sex'],
					'header' => $_SESSION['header']
				];
				break;
			}
		}

		for($i = 0, $j = 0; isset($posts[$i]); $i++){
			if($posts[$i]['seller_account'] == $_SESSION['account']){
				$data['post'][$j++] = $posts[$i];
			}
		}

		$data['count'] = $j;
        return view('posts/change_account', $data);
	}

	/* 帳號頁面 */
	public function account($seller_account)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model1 = new Login_account();
		$model2 = new Post();

		$users = $model1->findAll();
		$posts = $model2->findAll();

		for($i = 0; isset($users[$i]); $i++){
			if($users[$i]['account'] == $seller_account){
				$data['user'] = $users[$i];
			}
		}

		for($i = 0, $j = 0; isset($posts[$i]); $i++){
			if($posts[$i]['seller_account'] == $seller_account){
				$data['post'][$j++] = $posts[$i];
			}
		}

		$data['count'] = $j;
        return view('posts/account', $data);
	}

	/* 檢舉商品 */
	public function report($id)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model1 = new Post();
		$model2 = new Report();

		$post = $model1->find($id);
		$report = $model2->find($id);

		$reason = $this->request->getVar('reason');

		$post['reason'] = $reason;

		if(!$report){
			$model2->insert($post);
		}

		echo '<script>alert("已向網站管理員檢舉！")</script>';
		echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/item/".$id."'>";
		return ;
	}

	/* 搜尋商品或使用者 */
	public function search_item()
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model1 = new Login_account();
		$model2 = new Post();
		$model3 = new Message();
		$model4 = new Admin_account();

		$users = $model1->findAll();
		$posts = $model2->findAll();
		$talks = $model3->findAll();
		$admin = $model4->findAll();

		$search = $this->request->getVar('search');

		$search_users = array();
		$search_posts = array();

		/* 計算聊過天的人數 */
		$counts = 0;
		$chat_people = array();
		for($i = 0; isset($talks[$i]); $i++){}
		$i--;
		while($i >= 0)
		{
			$check = 0;
			if($talks[$i]['name_from'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $talks[$i]['name_to']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $talks[$i]['name_to']);
					$counts++;
				}
			}
			else if($talks[$i]['name_to'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $talks[$i]['name_from']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $talks[$i]['name_from']);
					$counts++;
				}
			}
			$i--;
		}

		/* 聊過天的帳號轉換名稱 */
		$chat_name = array();
		$chat_header = array();
		for($i = 0; isset($chat_people[$i]); $i++){
			/* 檢查使用者名稱 */
			for($j = 0; isset($users[$j]); $j++){
				if($users[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, $users[$j]['name2']);
					array_push($chat_header, $users[$j]['header']);
					break;
				}
			}

			/* 檢查管理員名稱 */
			for($j = 0; isset($admin[$j]); $j++){
				if($admin[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, '管理員大大');
					array_push($chat_header, NULL);
					break;
				}
			}
		}

		/* 搜尋管理員 */
		if($search == '管理員大大' || strpos('管理員', $search) !== false){
			$search_admin = [
				'name' => '管理員大大',
				'account' => $admin[0]['account']
			];
		}
		else{
			$search_admin = NULL;
		}

		/* 搜尋使用者及商品 */
		$users_num = 0;
		$items_num = 0;
		for($i = 0; isset($users[$i]) || isset($posts[$i]); $i++){
			if(isset($users[$i]) && $users_num < 10){
				if($search == $users[$i]['name']){
					for($j=0; isset($search_users[$j]); $j++){
						if($search_users[$j]['name'] == $users[$i]['name']){
							break;
						}
					}
					if(!isset($search_users[$j])){
						array_push($search_users, $users[$i]);
						$users_num++;
					}
				}
				else if($search == $users[$i]['name2']){
					for($j=0; isset($search_users[$j]); $j++){
						if($search_users[$j]['name2'] == $users[$i]['name2']){
							break;
						}
					}
					if(!isset($search_users[$j])){
						array_push($search_users, $users[$i]);
						$users_num++;
					}
				}
			}

			if(isset($posts[$i])  && $items_num < 10){
				if($search == $posts[$i]['seller']){
					for($j=0; isset($search_posts[$j]); $j++){
						if($search_posts[$j]['seller'] == $posts[$i]['seller']){
							break;
						}
					}
					if(!isset($search_posts[$j])){
						array_push($search_posts, $posts[$i]);
						$items_num++;
					}
				}
				else if($search == $posts[$i]['name']){
					for($j=0; isset($search_posts[$j]); $j++){
						if($search_posts[$j]['name'] == $posts[$i]['name']){
							break;
						}
					}
					if(!isset($search_posts[$j])){
						array_push($search_posts, $posts[$i]);
						$items_num++;
					}
				}
			}
		}

		for($i = 0; isset($users[$i]) || isset($posts[$i]); $i++){
			if(isset($users[$i]) && $users_num < 10){
				if($search != $users[$i]['name'] && $search != $users[$i]['name2']){
					$len = strlen($search);
					for($j=0; $j<$len; $j++){
						$substr = '';
						for($k=0; $k<$len-$j; $k++){
							$substr = $substr.$search[$k];
							if(strpos($users[$i]['name'],$substr) !== false){
								for($l=0; isset($search_users[$l]); $l++){
									if($search_users[$l]['name'] == $users[$i]['name']){
										break;
									}
								}
								if(!isset($search_users[$l])){
									array_push($search_users, $users[$i]);
									$users_num++;
								}
							}
							else if(strpos($users[$i]['name2'],$substr) !== false){
								for($l=0; isset($search_users[$l]); $l++){
									if($search_users[$l]['name2'] == $users[$i]['name2']){
										break;
									}
								}
								if(!isset($search_users[$l])){
									array_push($search_users, $users[$i]);
									$users_num++;
								}
							}
						}
					}
				}
			}

			if(isset($posts[$i]) && $items_num < 10){
				if($search != $posts[$i]['seller'] && $search != $posts[$i]['name']){
					$len = strlen($search);
					for($j=0; $j<$len; $j++){
						$substr = '';
						for($k=0; $k<$len-$j; $k++){
							$substr = $substr.$search[$k];
							if(strpos($posts[$i]['seller'],$substr) !== false){
								for($l=0; isset($search_posts[$l]); $l++){
									if($search_posts[$l]['seller'] == $posts[$i]['seller']){
										break;
									}
								}
								if(!isset($search_posts[$l])){
									array_push($search_posts, $posts[$i]);
									$items_num++;
								}
							}
							else if(strpos($posts[$i]['name'],$substr) !== false){
								for($l=0; isset($search_posts[$l]); $l++){
									if($search_posts[$l]['name'] == $posts[$i]['name']){
										break;
									}
								}
								if(!isset($search_posts[$l])){
									array_push($search_posts, $posts[$i]);
									$items_num++;
								}
							}
						}
					}
				}
			}
		}

		$data = [
			'chat_people' => $chat_people,
			'chat_name' => $chat_name,
			'chat_header' => $chat_header,
			'counts' => $counts,
			'search_users' => $search_users,
			'search_posts' => $search_posts,
			'search_admin' => $search_admin
		];

		return view('posts/search', $data);
	}

	/* 修改帳號 */
	public function change_acc()
	{
		$model = new Login_account();

		/* 檢查暱稱長度 */
		$name2_len = strlen($this->request->getVar('name2'));
		if($name2_len > 7){
			echo '<script>alert("暱稱太長，請重新輸入！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/change_account'>";
			return ;
		}

		/* 檢查密碼長度 */
		$password_len = strlen($this->request->getVar('password'));
		if($password_len < 6){
			echo '<script>alert("密碼太短，請重新輸入！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/change_account'>";
			return ;
		}
		else if($password_len > 15){
			echo '<script>alert("密碼太長，請重新輸入！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/change_account'>";
			return ;
		}

		$_SESSION['name2'] = $this->request->getVar('name2');
		$_SESSION['department'] = $this->request->getVar('department');
		$_SESSION['password'] = $this->request->getVar('password');
		$_SESSION['phone'] = $this->request->getVar('phone');
		$_SESSION['sex'] = $this->request->getVar('sex');

		$data = [
			'id' => $_SESSION['id'],
			'name' => $_SESSION['name'],
			'name2' => $_SESSION['name2'],
			'department' => $_SESSION['department'],
			'account' => $_SESSION['account'],
			'password' => $_SESSION['password'],
			'phone' => $_SESSION['phone'],
        	'birthday' => $_SESSION['birthday'],
        	'sex' => $_SESSION['sex']
		];

		$model->save($data);
		return redirect('PostController/myaccount');
	}

	/* 發布商品 */
	public function post_item($type)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

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
			'seller_account' => $_SESSION['account'],
			'way' => $this->request->getVar('way'),
			'name' => $this->request->getVar('name'),
			'price' => $this->request->getVar('price'),
			'number' => $this->request->getVar('number'),
			'time' => $this->request->getVar('time'),
			'place' => $this->request->getVar('place'),
			'type' => $type,
			'image' => $ServerFilename,
			'item_describe' => $this->request->getVar('describe'),
			'post_time' => $time
		];

		$model->save($data);
        echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/post'>";
	}

	/* 刪除商品資料 */
	public function delete_item($id)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model = new Post();
		$post = $model->find($id); //取得資料

		/* 找圖片名稱 */
		$img[0] = '?';
		$img[1] = '?';
		$img[2] = '?';
		$t = 0;
		for($j = 0; isset($post['image'][$j]); $j++){
			if($post['image'][$j] == ':'){
				if($post['image'][$j+1] == ' '){
					continue;
				}
				else{
					for($k = $j+1; isset($post['image'][$k]); $k++){
						if($post['image'][$k] != ' '){
							$img[$t][$k-($j+1)] = $post['image'][$k];
						}
						else{
							$t++;
							break;
						}
					}
				}
			}
		}

		if($img[0][0] != '?'){
			unlink('./item_images/'.$img[0]);
		}
		if($img[1][0] != '?'){
			unlink('./item_images/'.$img[1]);
		}
		if($img[2][0] != '?'){
			unlink('./item_images/'.$img[2]);
		}
		
		$model->where('id', $id)->delete();
        echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/post'>";
	}

	/* 修改商品資料 */
	public function modify($id)
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model = new Post();
		$users = $model->find($id); //取得資料

		// 取得日期與時間
		$time = date('Y/m/d H:i:s');

		$data = [
			'id' => $id,
			'seller' => $_SESSION['name2'],
			'seller_account' => $_SESSION['account'],
			'way' => $this->request->getVar('way'),
			'name' => $this->request->getVar('name'),
			'price' => $this->request->getVar('price'),
			'number' => $this->request->getVar('number'),
			'time' => $this->request->getVar('time'),
			'place' => $this->request->getVar('place'),
			'item_describe' => $this->request->getVar('describe'),
		];

		$model->save($data);
        echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/post'>";
	}

	/* 修改使用者頭貼 */
	public function change_header()
	{
		if(!isset($_SESSION['login'])){
			return redirect('LoginController/login');
		}

		$model = new Login_account();
		$users = $model->findAll();

		if(isset($_SESSION['header'])){
			unlink('./header/'.$_SESSION['header']);
		}

		$ServerFilename = ' ';
		if(is_uploaded_file($_FILES['header']['tmp_name'])){
			$File_Extension = explode(".", $_FILES['header']['name']);
			$File_Extension = $File_Extension[count($File_Extension)-1];
			$ServerFilename = date("YmdHis").'.'.$File_Extension;
			move_uploaded_file($_FILES['header']['tmp_name'], 'header/'.$ServerFilename);
		}

		$_SESSION['header'] = $ServerFilename;

		$data = [
			'header' => $ServerFilename
		];

		$model->update($_SESSION['id'], $data);

		echo '<script>alert("修改成功！")</script>';
		echo "<meta http-equiv='Refresh' content='0 ;URL=/PostController/myaccount'>";
		return ;
	}
}
