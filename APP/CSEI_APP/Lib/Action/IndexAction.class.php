<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	
	// 空操作
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
	// 首页
	public function index() {
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "首页_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		$this->display ();
	}
	// 登录页面
	public function login() {
		if (isset ( $_SESSION ['user'] )) {
			redirect ( U ( 'Index/index' ) ); // 如果已经登录，跳转至网站首页
		}
		$common = A ( 'Common' );
		$token = $common->make_form_token ();
		$this->assign ( '_token', $token );
		$this->assign ( 'web_title', '请登录_中国特种设备检测研究院' );
		$this->display ();
	}
	// 登录方法
	public function do_login() {
		$token = $_POST ['_token'];
		$common = A ( 'Common' );
		$check_token = $common->check_form_token ( $token );
		if (! $check_token) {
			redirect ( U ( 'Common/notfind' ) );
		}
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$user = M ( 'User' );
		$data ['username'] = $username;
		$data ['password'] = md5 ( $password );
		$userinfo = $user->where ( $data )->find ();
		if ($userinfo ['id'] > 0) {
			// 登录成功，判断账号状态是否被禁用
			if ($userinfo ['status'] == 3) {
				$this->error ( "登录失败！<br>账号已被禁用，请联系管理员", U ( 'Index/login' ) );
			}
			// 如果账号为锁定状态，修改为正常状态
			if ($userinfo ['status'] == 2) {
				$userinfo ['status'] = 1;
				$user->save ( $userinfo );
			}
			// 登录成功，存session,跳转至首页
			$_SESSION ['user'] = $userinfo ['id'];
			$this->success ( "登录成功!", U ( 'Index/index' ) );
		} else {
			$this->error ( "登录失败！<br>账号/密码错误", U ( 'Index/login' ) );
		}
	}
	// 注销登录方法
	public function logout() {
		if (! $_SESSION ['user']) {
			redirect ( U ( 'Common/notfind' ) );
		}
		$_SESSION ['user'] = NULL;
		$this->success ( "退出成功!", U ( 'Index/login' ) );
	}
	// 锁屏方法
	public function lock() {
		$common = A ( 'Common' );
		$common->check_is_online ();
		// 修改账号状态为锁定
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo ['status'] = 2;
		$result = $user->save ( $userinfo );
		if ($result) {
			$action_url = strstr ( __SELF__, 'action_url/' );
			$action_url = str_replace ( 'action_url/', '', $action_url );
			$_SESSION ['last_url'] = $_SERVER['SERVER_NAME'].'/'.$action_url; // 将上一次的页面路径存session
			redirect ( U ( 'Index/lock_screen' ) );
		} else {
			exit ( "服务器繁忙" );
		}
	}
	// 锁屏页面
	public function lock_screen() {
		if (! isset ( $_SESSION ['user'] )) {
			redirect ( U ( 'Common/notfind' ) );
		}
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		switch ($userinfo ['status']) {
			case 1 :
				redirect ( U ( 'Common/notfind' ) );
				break;
			case 2 :
				$userinfo = json_encode ( $userinfo );
				$userinfo = json_decode ( $userinfo );
				$this->assign ( 'userinfo', $userinfo );
				$this->assign ( 'web_title', '已锁定_中国特种设备检测研究院' );
				$this->display ();
				break;
			case 3 :
				$_SESSION ['user'] = null; // 账户被禁用,清空当前session，返回登录页面
				$this->error ( "您的账户已被禁用，请联系管理人员处理", U ( 'Index/login' ) );
				break;
			default :
				$_SESSION ['user'] = null; // 账户异常,清空当前session，返回登录页面
				$this->error ( "您的账户异常，请联系管理人员处理", U ( 'Index/login' ) );
		}
	}
	// 解锁方法
	public function unlock() {
		if (! isset ( $_SESSION ['user'] )) {
			redirect ( U ( 'Common/notfind' ) );
		}
		$user_id = $_SESSION ['user'];
		$password = md5 ( $_POST ['password'] );
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		if ($password != $userinfo ['password']) {
			$this->error ( "密码错误！" );
			exit ();
		}
		switch ($userinfo ['status']) {
			case 1 :
				redirect ( U ( 'Common/notfind' ) );
				break;
			case 2 :
				// 执行解锁操作
				$userinfo ['status'] = 1;
				$result = $user->save ( $userinfo );
				if ($result) {
					if (isset ( $_SESSION ['last_url'] )) {
						$last_url = $_SESSION ['last_url'];
						$_SESSION ['last_url'] = NULL;
						echo "<script>window.location.href='http://$last_url'</script>";
					//	redirect($last_url);
					} else {
						redirect ( U ( 'Index/index' ) );
					}
				} else {
					exit ( "服务器繁忙" );
				}
				break;
			case 3 :
				$_SESSION ['user'] = null; // 账户被禁用,清空当前session，返回登录页面
				$this->error ( "您的账户已被禁用，请联系管理人员处理", U ( 'Index/login' ) );
				break;
			default :
				$_SESSION ['user'] = null; // 账户异常,清空当前session，返回登录页面
				$this->error ( "您的账户异常，请联系管理人员处理", U ( 'Index/login' ) );
		}
	}
	public function test() {
		echo "测试页面<br><a href='".__APP__."/Index/lock/action_url".__ACTION__."'>锁屏</a>";
	}
}