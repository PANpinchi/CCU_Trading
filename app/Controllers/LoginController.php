<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login_account;

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

	/* 忘記密碼頁面 */
	public function forget()
	{
        return view('login/forget');
	}

	/* 找回密碼 */
	public function forget_account()
	{
		$model = new Login_account();
		$users = $model->findAll(); //取得資料

		$data = [
			'account' => $this->request->getVar('account')
		];

		/* 檢查是否使用學校信箱找回密碼 */
		for($i = 0; isset($data['account'][$i]); $i++)
		{
			if($data['account'][$i] == '@'){
				if(
				(!isset($data['account'][$i+1]) || $data['account'][$i+1] != 'a') || 
				(!isset($data['account'][$i+2]) || $data['account'][$i+2] != 'l') ||
				(!isset($data['account'][$i+3]) || $data['account'][$i+3] != 'u') || 
				(!isset($data['account'][$i+4]) || $data['account'][$i+4] != 'm') ||
				(!isset($data['account'][$i+5]) || $data['account'][$i+5] != '.') || 
				(!isset($data['account'][$i+6]) || $data['account'][$i+6] != 'c') ||
				(!isset($data['account'][$i+7]) || $data['account'][$i+7] != 'c') || 
				(!isset($data['account'][$i+8]) || $data['account'][$i+8] != 'u') ||
				(!isset($data['account'][$i+9]) || $data['account'][$i+9] != '.') || 
				(!isset($data['account'][$i+10]) || $data['account'][$i+10] != 'e') ||
				(!isset($data['account'][$i+11]) || $data['account'][$i+11] != 'd') || 
				(!isset($data['account'][$i+12]) || $data['account'][$i+12] != 'u')){
					   echo '<script>alert("請使用學校信箱找回您的密碼！")</script>';
					   return view('login/forget');
				}
				break;
			}	
		}

		/* 匹配帳號 */
		$check = 0;
		for($i = 0; isset($users[$i]); $i++)
		{
			$account = strcmp($data['account'], $users[$i]['account']);

			if($account == 0){
				$check = 1;
				break;
			}
		}

		if($check == 0){
			echo '<script>alert("此帳號尚未註冊，請先註冊帳號！")</script>';
			return view('login/signup');
		}

		/* 寄送找回密碼Email */
	}

	/* 儲存帳戶 */
	public function store_account()
	{
		$model = new Login_account();
		$users = $model->findAll(); //取得資料

		$data = [
			'account' => $this->request->getVar('account'),
			'password' => $this->request->getVar('password')
		];

		/* 檢查是否使用學校信箱註冊 */
		for($i = 0; isset($data['account'][$i]); $i++)
		{
			if($data['account'][$i] == '@'){
				if(
				(!isset($data['account'][$i+1]) || $data['account'][$i+1] != 'a') || 
				(!isset($data['account'][$i+2]) || $data['account'][$i+2] != 'l') ||
				(!isset($data['account'][$i+3]) || $data['account'][$i+3] != 'u') || 
				(!isset($data['account'][$i+4]) || $data['account'][$i+4] != 'm') ||
				(!isset($data['account'][$i+5]) || $data['account'][$i+5] != '.') || 
				(!isset($data['account'][$i+6]) || $data['account'][$i+6] != 'c') ||
				(!isset($data['account'][$i+7]) || $data['account'][$i+7] != 'c') || 
				(!isset($data['account'][$i+8]) || $data['account'][$i+8] != 'u') ||
				(!isset($data['account'][$i+9]) || $data['account'][$i+9] != '.') || 
				(!isset($data['account'][$i+10]) || $data['account'][$i+10] != 'e') ||
				(!isset($data['account'][$i+11]) || $data['account'][$i+11] != 'd') || 
				(!isset($data['account'][$i+12]) || $data['account'][$i+12] != 'u')){
					   echo '<script>alert("請使用學校信箱註冊！")</script>';
					   return view('login/signup');
				}
				break;
			}	
		}

		/* 檢查是否已註冊過帳號 */
		for($i = 0; isset($users[$i]); $i++)
		{
			$account = strcmp($data['account'], $users[$i]['account']);
			$password = strcmp($data['password'], $users[$i]['password']);

			if($account == 0){
				echo '<script>alert("此帳號已註冊，請直接登入！")</script>';
				return view('login/login');
			}
		}
		
		$model->save($data);
		echo '<script>alert("註冊成功！")</script>';
		return view('login/login');
	}

	/* 帳號匹配 */
    public function compare_account()
	{
		$model = new Login_account();
		$users = $model->findAll(); //取得資料

		$data = [
			'account' => $this->request->getVar('account'),
			'password' => $this->request->getVar('password')
		];

		/* 檢查是否使用學校信箱登入 */
		for($i = 0; isset($data['account'][$i]); $i++)
		{
			if($data['account'][$i] == '@'){
				if(
				(!isset($data['account'][$i+1]) || $data['account'][$i+1] != 'a') || 
				(!isset($data['account'][$i+2]) || $data['account'][$i+2] != 'l') ||
				(!isset($data['account'][$i+3]) || $data['account'][$i+3] != 'u') || 
				(!isset($data['account'][$i+4]) || $data['account'][$i+4] != 'm') ||
				(!isset($data['account'][$i+5]) || $data['account'][$i+5] != '.') || 
				(!isset($data['account'][$i+6]) || $data['account'][$i+6] != 'c') ||
				(!isset($data['account'][$i+7]) || $data['account'][$i+7] != 'c') || 
				(!isset($data['account'][$i+8]) || $data['account'][$i+8] != 'u') ||
				(!isset($data['account'][$i+9]) || $data['account'][$i+9] != '.') || 
				(!isset($data['account'][$i+10]) || $data['account'][$i+10] != 'e') ||
				(!isset($data['account'][$i+11]) || $data['account'][$i+11] != 'd') || 
				(!isset($data['account'][$i+12]) || $data['account'][$i+12] != 'u')){
					   echo '<script>alert("請使用學校信箱登入！")</script>';
					   return view('login/login');
				}
				break;
			}	
		}

		/* 是否匹配帳號 */
		for($i = 0; isset($users[$i]); $i++)
		{
			$account = strcmp($data['account'], $users[$i]['account']);
			$password = strcmp($data['password'], $users[$i]['password']);

			if($account == 0 && $password == 0){
				return view('posts/post');
			}
			else if($account == 0 && $password != 0){
				echo '<script>alert("密碼輸入錯誤，請重新登入！")</script>';
				return view('login/login');
			}
		}
	}
    
}
