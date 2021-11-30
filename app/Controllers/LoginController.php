<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login_account;
use PHPMailer\PHPMailer\PHPMailer;

session_start();

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

	/* 驗證頁面 */
	public function verify()
	{
		if(isset($_SESSION['code'])){
			return view('login/verify');
		}
		else{
			return redirect('LoginController/signup');
		}
        
	}

	/* 忘記密碼頁面 */
	public function forget()
	{
        return view('login/forget');
	}

	/* 臨時密碼頁面 */
	public function check()
	{
        return view('login/check');
	}

	/* 更改密碼頁面 */
	public function change()
	{
        return view('login/change');
	}

	/* 找回密碼 */
	public function forget_password()
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
					echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/forget'>";
					return ;
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
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/signup'>";
			return ;
		}

		$_SESSION['account'] = $data['account'];
		
		/* 創建臨時密碼 */
		$all = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
		$div = ['1', 'l', '0', 'o', 'O', 'I'];
		$word = array_diff($all, $div);
		unset($all ,$div);

		$index = array_rand($word, 8);
		shuffle($index);

		$_SESSION['temp_password'] = '';
		foreach($index as $t){
			$_SESSION['temp_password'] .= $word[$t];
		}

		/* 寄送找回密碼Email */
		$name = "=?UTF-8?B?".base64_encode('中正大學買賣交流')."?=";
		$email = "ccutrading@gmail.com";
		$subject = "=?UTF-8?B?".base64_encode('變更密碼通知(請勿直接回覆)')."?=";
		$body = "請注意:此系統由郵件自動發送，請勿直接回覆此信<br><br>
				".$users[$i]['name']." 先生/小姐 您好，<br><br>
				您已申請變更中正大學買賣交流網站密碼，<br><br>
				您的臨時密碼 : ".$_SESSION['temp_password']."。";

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
		$mail->addAddress($data['account']); //收件人
		$mail->Subject = ("$subject"); //標題
		$mail->Body = $body; //內文

		if($mail->send()){
			echo '<script>alert("臨時密碼傳送至您的信箱，請立即確認！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/check'>";
			return ;
		}
		else{
			echo '<script>alert("請確認輸入資料是否正確！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/forget'>";
			return ;
		}
	}

	/* 確認臨時密碼 */
	public function check_password()
	{
		$data = [
			'verify' => $this->request->getVar('verify')
		];

		if($data['verify'] == $_SESSION['temp_password']){
			unset($_SESSION['temp_password']);
			return redirect('LoginController/change');
		}
		else{
			echo '<script>alert("請至學校信箱確認臨時密碼！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/check'>";
			return ;
		}
	}

	/* 修改密碼 */
	public function change_password()
	{
		$model = new Login_account();
		$users = $model->findAll(); //取得資料

		$pass1 = $this->request->getVar('password');
		$pass2 = $this->request->getVar('check');

		if($pass1 != $pass2){
			echo '<script>alert("兩次密碼不一致，請重新再試！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/change'>";
			return ;
		}

		/* 匹配帳號 */
		$check = 0;
		for($i = 0; isset($users[$i]); $i++)
		{
			$account = strcmp($_SESSION['account'], $users[$i]['account']);

			if($account == 0){
				$check = 1;
				break;
			}
		}

		$data = [
			'id' => $users[$i]['id'],
			'name' => $users[$i]['name'],
			'department' => $users[$i]['department'],
			'account' => $users[$i]['account'],
			'password' => $pass1
		];

		unset($_SESSION['account']);
		$model->save($data);
		echo '<script>alert("修改密碼成功！")</script>';
		echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/login'>";
		return ;
	}

	/* 儲存帳戶 */
	public function store_account()
	{
		$model = new Login_account();
		$users = $model->findAll(); //取得資料

		$data = [
			'name' => $this->request->getVar('name'),
			'name2' => $this->request->getVar('name2'),
			'department' => $this->request->getVar('department'),
			'account' => $this->request->getVar('account'),
			'password' => $this->request->getVar('password'),
			'phone' => $this->request->getVar('phone'),
        	'birthday' => $this->request->getVar('birthday'),
        	'sex' => $this->request->getVar('sex')
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
					echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/signup'>";
					return ;
				}
				break;
			}	
		}

		/* 檢查是否已註冊過帳號 */
		for($i = 0; isset($users[$i]); $i++)
		{
			$account = strcmp($data['account'], $users[$i]['account']);

			if($account == 0){
				echo '<script>alert("此帳號已註冊，請直接登入！")</script>';
				echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/login'>";
				return ;
			}
		}

		/* 紀錄註冊資料 */
		$_SESSION['name'] = $data['name'];
		$_SESSION['name2'] = $data['name2'];
		$_SESSION['department'] = $data['department'];
		$_SESSION['account'] = $data['account'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['phone'] = $data['phone'];
		$_SESSION['birthday'] = $data['birthday'];
		$_SESSION['sex'] = $data['sex'];

		/* 創建驗證碼 */
		$verify = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
		$index = array_rand($verify, 6);
		shuffle($index);

		$_SESSION['code'] = '';
		foreach($index as $i){
			$_SESSION['code'] .= $verify[$i];
		}

		/* 寄送驗證信 */
		$name = "=?UTF-8?B?".base64_encode('中正大學買賣交流')."?=";
		$email = "ccutrading@gmail.com";
		$subject = "=?UTF-8?B?".base64_encode('驗證您的電子郵件(請勿直接回覆)')."?=";
		$body = "請注意:此系統由郵件自動發送，請勿直接回覆此信<br><br>
				".$data['name']." 先生/小姐 您好，<br><br>
				歡迎您註冊中正大學買賣交流網站，<br><br>
				您的驗證碼 : ".$_SESSION['code']."。";

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
		$mail->addAddress($data['account']); //收件人
		$mail->Subject = ("$subject"); //標題
		$mail->Body = $body; //內文

		if($mail->send()){
			echo '<script>alert("帳號註冊成功，請至信箱收取驗證信件！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/verify'>";
			return ;
		}
		else{
			echo '<script>alert("帳號註冊失敗，請確認輸入資料是否正確！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/signup'>";
			return ;
		}
	}

	/* 驗證碼匹配 */
    public function compare_verification_code()
	{
		$model = new Login_account();
		$users = $model->findAll(); //取得資料

		$verification_code = $this->request->getVar('verification_code');

		if($verification_code != $_SESSION['code']){
			echo '<script>alert("驗證碼輸入錯誤，請至信箱確認電子郵件！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/verify'>";
			return ;
		}
		else{
			$data = [
				'name' => $_SESSION['name'],
				'name2' => $_SESSION['name2'],
				'department' => $_SESSION['department'],
				'account' => $_SESSION['account'],
				'password' => $_SESSION['password'],
				'phone' => $_SESSION['phone'],
        		'birthday' => $_SESSION['birthday'],
        		'sex' => $_SESSION['sex']
			];
			unset($_SESSION['code']);
			unset($_SESSION['name']);
			unset($_SESSION['name2']);
			unset($_SESSION['department']);
			unset($_SESSION['account']);
			unset($_SESSION['password']);
			unset($_SESSION['phone']);
			unset($_SESSION['birthday']);
			unset($_SESSION['sex']);
			$model->save($data);
			echo '<script>alert("註冊成功！")</script>';
			echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/login'>";
			return ;
		}
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
					echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/login'>";
					return ;
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
				$_SESSION['name'] = $users[$i]['name'];
				$_SESSION['name2'] = $users[$i]['name2'];
				$_SESSION['account'] = $users[$i]['account'];
				$_SESSION['password'] = $users[$i]['password'];
				$_SESSION['phone'] = $users[$i]['phone'];
				$_SESSION['birthday'] = $users[$i]['birthday'];
				$_SESSION['sex'] = $users[$i]['sex'];
				return redirect('PostController/post');
			}
			else if($account == 0 && $password != 0){
				echo '<script>alert("密碼輸入錯誤，請重新登入！")</script>';
				echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/login'>";
				return ;
			}
		}

		echo '<script>alert("帳號尚未註冊，請先註冊！")</script>';
		echo "<meta http-equiv='Refresh' content='0 ;URL=/LoginController/login'>";
		return ;
	}

	/* 登出 */
    public function logout()
	{
		unset($_SESSION['name']);
		unset($_SESSION['account']);
		unset($_SESSION['password']);
		return redirect('LoginController/login');
	}
}
