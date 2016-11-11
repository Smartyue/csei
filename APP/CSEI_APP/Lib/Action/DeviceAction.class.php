<?php
/*
 * 设备信息管理
 */
class DeviceAction extends Action{
	
	//设备信息管理页面(设备信息列表页面)
	public function index() {
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "设备信息管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取设备列表
		$dev_list=$common->get_dev_info_list($user_id);
		$this->assign('dev_list',$dev_list);
		$this->display ();
	}
}