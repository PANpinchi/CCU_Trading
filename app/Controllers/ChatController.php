<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Message;

session_start();

/* 設定時區 */
date_default_timezone_set('Asia/Taipei');

class ChatController extends BaseController
{
	/* 聊天頁面 */
	public function chat()
	{
		$model = new Message();
		$users = $model->findAll(); //取得資料
		if(isset($_GET['value'])){
			$_SESSION['to'] = $_GET['value'];
		}

		/* 檢查是否曾有聊天紀錄 */
		$check = 0;
		for($i = 0; isset($users[$i]); $i++)
		{
			$cmp_from = strcmp($_SESSION['name'], $users[$i]['from']);
			$cmp_to = strcmp($_SESSION['to'], $users[$i]['to']);

			if($cmp_from == 0 && $cmp_to == 0){
				$check = 1;
				break;
			}

			$cmp_from = strcmp($_SESSION['name'], $users[$i]['to']);
			$cmp_to = strcmp($_SESSION['to'], $users[$i]['from']);

			if($cmp_from == 0 && $cmp_to == 0){
				$check = 1;
				break;
			}
		}

		/* 若無則創建空白訊息 */
		if($check == 0){
			$data = [
				'from' => $_SESSION['name'],
				'to' => $_SESSION['to'],
			];
			$model->save($data);
		}

		/* 準備資料 */
		$from = array();
    	$to = array();
		$content = array();
		$time = array();

		/* 顯示聊天紀錄 */
		for($i = 0; isset($users[$i]); $i++)
		{
			$cmp_from = strcmp($_SESSION['name'], $users[$i]['from']);
			$cmp_to = strcmp($_SESSION['to'], $users[$i]['to']);

			if($cmp_from == 0 && $cmp_to == 0){
				array_push($from, $users[$i]['from']);
				array_push($to, $users[$i]['to']);
				array_push($content, $users[$i]['content']);
				array_push($time, $users[$i]['time']);
			}

			$cmp_from = strcmp($_SESSION['name'], $users[$i]['to']);
			$cmp_to = strcmp($_SESSION['to'], $users[$i]['from']);

			if($cmp_from == 0 && $cmp_to == 0){
				array_push($from, $users[$i]['to']);
				array_push($to, $users[$i]['from']);
				array_push($content, $users[$i]['content']);
				array_push($time, $users[$i]['time']);
			}
		}

		$data = [
			'from' => $from,
			'to' => $to,
			'content' => $content,
			'time' => $time
		];
        
		return view('chat/chat', $data);
	}

	/* 接收訊息 */
	public function message()
	{
		$model = new Message();

		$data = [
			'from' => $_SESSION['name'],
			'to' => $_SESSION['to'],
			'content' => $this->request->getVar('message'),
			'time' => NULL
		];

		$model->save($data);
        return redirect('ChatController/chat');
	}
	
}
