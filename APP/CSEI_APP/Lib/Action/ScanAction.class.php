<?php
/*
 * 扫描仪控制器
 */
class ScanAction extends Action{
	
	/*
	 *
	 * 空操作
	 */
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
	/*
	 * 绑定扫描仪首页
	 */
	public function index(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "绑定扫描仪_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取扫描仪列表及绑定状态
		$scan_list=$common->get_scan_list($user_id);
		$this->assign('scan_list',$scan_list);
		$this->display();
	}
	/*
	 * 绑定扫描仪方法
	 */
	public function bind(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$user_id=$_SESSION['user'];
		$scan_id=$_GET['scan_id'];
		//检测该扫描仪是否存在
		$scan=M('Scan');
		$check=$scan->where('id='.$scan_id)->find();
		if(!$check){
			redirect(U('Common/notfind'));
		}
		$scan_bind=M('ScanBind');
		$bind_info=$scan_bind->where('user_id='.$user_id)->find();
		if($bind_info){
			$bind_info['scan_id']=$scan_id;
			$result=$scan_bind->save($bind_info);
		}else{
			$data['user_id']=$user_id;
			$data['scan_id']=$scan_id;
			$result=$scan_bind->add($data);
		}
		if($result){
			$this->success("绑定成功!");
		}else{
			$this->error("绑定失败!<br>该设备已被绑定或服务器繁忙<br>请稍后再试");
		}
	}
	/*
	 * 取消绑定方法
	 */
	public function un_bind(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$user_id=$_SESSION['user'];
		$scan_id=$_GET['scan_id'];
		//检测该扫描仪是否存在
		$scan=M('Scan');
		$check=$scan->where('id='.$scan_id)->find();
		if(!$check){
			redirect(U('Common/notfind'));
		}
		$scan_bind=M('ScanBind');
		$result=$scan_bind->where('user_id='.$user_id)->delete();
		if($result){
			$this->success("操作成功！");
		}else{
			$this->error("操作失败!<br>请稍后再试");
		}
	}
}