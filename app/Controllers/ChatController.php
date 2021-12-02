<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Message;
use App\Models\Login_account;

session_start();

/* 設定時區 */
date_default_timezone_set('Asia/Taipei');

class ChatController extends BaseController
{
	/* 聊天頁面 */
	public function chat()
	{
		$model = new Message();
		$model2 = new Login_account();
		$users = $model->findAll(); //取得資料
		$accounts = $model2->findAll(); //取得資料
		$display = 0;

		$_SESSION['to'] = ' ';
		if(isset($_GET['value'])){
			$display = 1;
			$_SESSION['to'] = $_GET['value'];

			/* 檢查是否曾有聊天紀錄 */
			$check = 0;
			for($i = 0; isset($users[$i]); $i++)
			{
				$cmp_from = strcmp($_SESSION['account'], $users[$i]['from']);
				$cmp_to = strcmp($_SESSION['to'], $users[$i]['to']);

				if($cmp_from == 0 && $cmp_to == 0){
					$check = 1;
					break;
				}

				$cmp_from = strcmp($_SESSION['account'], $users[$i]['to']);
				$cmp_to = strcmp($_SESSION['to'], $users[$i]['from']);

				if($cmp_from == 0 && $cmp_to == 0){
					$check = 1;
					break;
				}
			}

			/* 若無則創建空白訊息 */
			if($check == 0){
				$data = [
					'from' => $_SESSION['account'],
					'to' => $_SESSION['to'],
				];
				$model->save($data);
			}
		}

		$model = new Message();
		$users = $model->findAll(); //取得資料

		/* 計算聊過天的人數 */
		$count = 0;
		$chat_people = array();
		for($i = 0; isset($users[$i]); $i++){}
		$i--;
		while($i >= 0)
		{
			$check = 0;
			if($users[$i]['from'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $users[$i]['to']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $users[$i]['to']);
					$count++;
				}
			}
			else if($users[$i]['to'] == $_SESSION['account']){
				for($j = 0; isset($chat_people[$j]); $j++){
					if($chat_people[$j] == $users[$i]['from']){
						$check = 1;
						break;
					}
				}
				if($check == 0){
					array_push($chat_people, $users[$i]['from']);
					$count++;
				}
			}
			$i--;
		}

		/* 聊過天的帳號轉換名稱 */
		$chat_name = array();
		$chat_header = array();
		for($i = 0; isset($chat_people[$i]); $i++){
			for($j = 0; isset($accounts[$j]); $j++){
				if($accounts[$j]['account'] == $chat_people[$i]){
					array_push($chat_name, $accounts[$j]['name2']);
					array_push($chat_header, $accounts[$j]['header']);
					break;
				}
			}
		}

		/* 準備資料 */
		$from = array();
    	$to = array();
		$content = array();
		$time = array();

		/* 顯示聊天紀錄 */
		for($i = 0; isset($users[$i]); $i++)
		{
			$cmp_from = strcmp($_SESSION['account'], $users[$i]['from']);
			$cmp_to = strcmp($_SESSION['to'], $users[$i]['to']);

			if($cmp_from == 0 && $cmp_to == 0){
				array_push($from, $users[$i]['from']);
				array_push($to, $users[$i]['to']);
				array_push($content, $users[$i]['content']);
				array_push($time, $users[$i]['time']);
			}

			$cmp_from = strcmp($_SESSION['account'], $users[$i]['to']);
			$cmp_to = strcmp($_SESSION['to'], $users[$i]['from']);

			if($cmp_from == 0 && $cmp_to == 0){
				array_push($from, $users[$i]['from']);
				array_push($to, $users[$i]['to']);
				array_push($content, $users[$i]['content']);
				array_push($time, $users[$i]['time']);
			}
		}

		$data = [
			'from' => $from,
			'to' => $to,
			'content' => $content,
			'time' => $time,
			'chat_people' => $chat_people,
			'chat_name' => $chat_name,
			'chat_header' => $chat_header,
			'count' => $count,
			'display' => $display
		];

		return view('chat/chat', $data);
	}

	/* 接收訊息 */
	public function message()
	{
		$model = new Message();

		// 取得日期與時間
		$time = date('Y/m/d H:i:s');

		$data = [
			'from' => $_SESSION['account'],
			'to' => $_SESSION['to'],
			'content' => $this->request->getVar('message'),
			'time' => $time
		];

		$model->save($data);
		echo "<meta http-equiv='Refresh' content='0 ;URL=/ChatController/chat?value=".$_SESSION['to']."'>";
	}
}
