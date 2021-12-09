<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin_account;
use App\Models\Login_account;
use App\Models\Message;
use App\Models\Post;
use PHPMailer\PHPMailer\PHPMailer;

session_start();

class AdminController extends BaseController
{
    /* 管理員登入頁面 */
    public function admin_login()
    {
        if(isset($_SESSION['login'])){
            return redirect('PostController/post');
        }

        return view('admin/admin_login');
    }

    /* 管理員身份辨識頁面 */
    public function face_recognition()
    {
        if(isset($_SESSION['login'])){
            return redirect('PostController/post');
        }

        return view('admin/face_recognition');
    }

    /* 管理貼文頁面 */
    public function post_manager()
    {
        if(isset($_SESSION['login'])){
            return redirect('PostController/post');
        }

        $model1 = new Login_account();
		$model2 = new Post();
		$model3 = new Message();
		
		$users = $model1->findAll(); //取得資料
		$posts = $model2->findAll();
		$talks = $model3->findAll();
		
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

        return view('admin/post_manager', $data);
    }

	/* 特定類別商品頁面 */
	public function admin_post_type($item)
	{
		if(isset($_SESSION['login'])){
            return redirect('PostController/post');
        }

		$model1 = new Login_account();
		$model2 = new Post();
		$model3 = new Message();
		
		$users = $model1->findAll(); //取得資料
		$posts = $model2->where('type', $item)->findAll();
		$talks = $model3->findAll();

		/* 計算聊過天的人數 */
		/*$counts = 0;
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
		/*$chat_name = array();
		$chat_header = array();
		for($i = 0; isset($chat_people[$i]); $i++){
			for($j = 0; isset($users[$j]); $j++){
				if($users[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, $users[$j]['name2']);
					array_push($chat_header, $users[$j]['header']);
					break;
				}
			}
		}

		$data = [
			'chat_people' => $chat_people,
			'chat_name' => $chat_name,
			'chat_header' => $chat_header,
			'counts' => $counts
		];*/
		
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
        return view('admin/post_manager', $data);
	}

	/* 單一商品頁面 */
	public function item_manager($id)
	{
		if(isset($_SESSION['login'])){
            return redirect('PostController/post');
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

        return view('admin/item_manager', $data);
	}

	/* 帳號頁面 */
	public function admin_account($seller_account)
	{
		if(isset($_SESSION['login'])){
            return redirect('PostController/post');
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
        return view('admin/admin_account', $data);
	}


	/* 刪除商品資料 */
	public function delete_item($id)
	{
		if(isset($_SESSION['login'])){
            return redirect('PostController/post');
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

		/* 寄送刪除商品提醒Email */
		$name = "=?UTF-8?B?".base64_encode('中正大學買賣交流')."?=";
		$email = "ccutrading@gmail.com";
		$subject = "=?UTF-8?B?".base64_encode('刪除商品通知(請勿直接回覆)')."?=";
		$body = "請注意:此系統由郵件自動發送，請勿直接回覆此信<br><br>
				".$post['seller']." 先生/小姐 您好，<br><br>
				您的商品【".$post['name']."】因不符合本網站規範，<br><br>
				已被網站管理員移除，<br><br>
				若有疑慮請儘快聯繫網站管理員。";

		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";

		$mail = new PHPMailer();

		//smtp settings
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "ccutrading@gmail.com"; //寄件人
		$mail->Password = "27105081";
		$mail->Port = 465;
		$mail->SMTPSecure = "ssl";

		//email settings
		$mail->isHTML(true);
		$mail->setFrom($email, $name);
		$mail->addAddress($post['seller_account']); //收件人
		$mail->Subject = ("$subject"); //標題
		$mail->Body = $body; //內文

		if($mail->send()){
			echo '<script>alert("已刪除此商品並寄信告知賣家！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/AdminController/post_manager'>";
			return ;
		}
		else{
			echo '<script>alert("已刪除此商品，尚未提醒賣家！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/AdminController/post_manager'>";
			return ;
		}
	}

	/* 警告商品規範 */
	public function warning($id)
	{
		if(isset($_SESSION['login'])){
            return redirect('PostController/post');
        }

		$model = new Post();
		$post = $model->find($id); //取得資料

		/* 寄送警告商品規範Email */
		$name = "=?UTF-8?B?".base64_encode('中正大學買賣交流')."?=";
		$email = "ccutrading@gmail.com";
		$subject = "=?UTF-8?B?".base64_encode('商品警告通知(請勿直接回覆)')."?=";
		$body = "請注意:此系統由郵件自動發送，請勿直接回覆此信<br><br>
				".$post['seller']." 先生/小姐 您好，<br><br>
				您的商品【".$post['name']."】不符合本網站規範，<br><br>
				請您盡快修改商品資料，<br><br>
				屢勸不聽者會導致您的帳戶受到限制，<br><br>
				若有疑慮請儘快聯繫網站管理員。";

		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";

		$mail = new PHPMailer();

		//smtp settings
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "ccutrading@gmail.com"; //寄件人
		$mail->Password = "27105081";
		$mail->Port = 465;
		$mail->SMTPSecure = "ssl";

		//email settings
		$mail->isHTML(true);
		$mail->setFrom($email, $name);
		$mail->addAddress($post['seller_account']); //收件人
		$mail->Subject = ("$subject"); //標題
		$mail->Body = $body; //內文

		if($mail->send()){
			echo '<script>alert("已寄信告知賣家！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/AdminController/post_manager'>";
			return ;
		}
		else{
			echo '<script>alert("信件發送失敗！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/AdminController/post_manager'>";
			return ;
		}
	}

	/* 搜尋商品或使用者 */
	public function search_item()
	{
		if(isset($_SESSION['login'])){
            return redirect('PostController/post');
        }

		$model1 = new Login_account();
		$model2 = new Post();
		$model3 = new Message();

		$users = $model1->findAll();
		$posts = $model2->findAll();
		$talks = $model3->findAll();

		$search = $this->request->getVar('search');

		$search_users = array();
		$search_posts = array();

		/* 計算聊過天的人數 */
		/*$counts = 0;
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
		/*$chat_name = array();
		$chat_header = array();
		for($i = 0; isset($chat_people[$i]); $i++){
			for($j = 0; isset($users[$j]); $j++){
				if($users[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, $users[$j]['name2']);
					array_push($chat_header, $users[$j]['header']);
					break;
				}
			}
		}

		/* 搜尋使用者及商品 */
		for($i = 0; isset($users[$i]) || isset($posts[$i]); $i++){
			if(isset($users[$i])){
				if($search == $users[$i]['name']){
					for($j=0; isset($search_users[$j]); $j++){
						if($search_users[$j]['name'] == $users[$i]['name']){
							break;
						}
					}
					if(!isset($search_users[$j])){
						array_push($search_users, $users[$i]);
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
					}
				}
			}

			if(isset($posts[$i])){
				if($search == $posts[$i]['seller']){
					for($j=0; isset($search_posts[$j]); $j++){
						if($search_posts[$j]['seller'] == $posts[$i]['seller']){
							break;
						}
					}
					if(!isset($search_posts[$j])){
						array_push($search_posts, $posts[$i]);
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
					}
				}
			}
		}

		for($i = 0; isset($users[$i]) || isset($posts[$i]); $i++){
			if(isset($users[$i])){
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
								}
							}
						}
					}
				}
			}

			if(isset($posts[$i])){
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
								}
							}
						}
					}
				}
			}
		}

		$data = [
			//'chat_people' => $chat_people,
			//'chat_name' => $chat_name,
			//'chat_header' => $chat_header,
			//'counts' => $counts,
			'search_users' => $search_users,
			'search_posts' => $search_posts
		];

		return view('admin/admin_search', $data);
	}

    /* 管理員帳號匹配 */
    public function compare_admin_account()
	{
		if(isset($_SESSION['login'])){
			return redirect('PostController/post');
		}

		$model = new Admin_account();
		$users = $model->findAll(); //取得資料

		$data = [
			'account' => $this->request->getVar('account'),
			'password' => $this->request->getVar('password')
		];

		/* 是否匹配帳號 */
		for($i = 0; isset($users[$i]); $i++)
		{
			$account = strcmp($data['account'], $users[$i]['account']);
			$password = strcmp($data['password'], $users[$i]['password']);

			if($account == 0 && $password == 0){
				$_SESSION['admin_id'] = $users[$i]['id'];
				$_SESSION['admin_account'] = $users[$i]['account'];
				$_SESSION['admin_password'] = $users[$i]['password'];
				return redirect('AdminController/face_recognition');
			}
			else if($account == 0 && $password != 0){
				echo '<script>alert("密碼輸入錯誤，請重新登入！")</script>';
				echo "<meta http-equiv='Refresh' content='0 ;URL=/AdminController/admin_login'>";
				return ;
			}
		}

		echo '<script>alert("密碼輸入錯誤，請重新登入！")</script>';
		echo "<meta http-equiv='Refresh' content='0 ;URL=/AdminController/admin_login'>";
		return ;
	}

    /* 管理員登出 */
    public function admin_logout()
	{
		session_unset();
		return redirect('AdminController/admin_login');
	}
}