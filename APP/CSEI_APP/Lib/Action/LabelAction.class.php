<?php
class LabelAction extends Action{
	/*
	 *
	 * 空操作
	 */
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
	/*
	 * 电子标签绑定管理页面
	 */
	public function index(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "电子标签绑定管理_中国特种设备检测研究院";
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
		//获取已绑定标签数量和剩余标签数量
		$labels=M('Labels');
		$un_bind_count=$labels->where('status=0')->count();//剩余标签数量
		$bind_count=$labels->where('status=1')->count();//已绑定标签数量
		$this->assign('un_bind_count',$un_bind_count);
		$this->assign('bind_count',$bind_count);
        $this->display ();
	}
	/*
	 * 分配标签绑定方法(单个)
	 */
	public function bind(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$dev_id=$_GET['dev_id'];
		if($dev_id>0){
			$result=$common->bind_label($dev_id);
			if($result){
				$this->success("绑定标签成功!");
			}else{
				$this->error("绑定失败!<br>电子标签数量不足或服务器繁忙<br>请稍后再试");
			}
		}else{
			redirect(U('Common/notfind'));
		}
	}
	/*
	 * 解除标签绑定方法（单个）
	 */
	public function un_bind(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$dev_id=$_GET['dev_id'];
		if($dev_id>0){
			$result=$common->un_bind($dev_id);
			if($result){
				$this->success("解除绑定成功!");
			}else{
				$this->error("解除绑定失败!请稍后再试");
			}
		}else{
			redirect(U('Common/notfind'));
		}
	}
	/*
	 * 批量绑定
	 */
	public function bind_list(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		if(!isset($_GET['dev_list'])){
			redirect(U('Common/notfind'));
		}
		$dev_list=$_GET['dev_list'];
		$dev_list=explode(',',$dev_list);
		for($i=0;$i<count($dev_list);$i++){
			$common->bind_label($dev_list[$i]);
		}
		$this->success("操作已完成");
	}
	
	/*
	 * 批量解除
	 */
	public function un_bind_list(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		if(!isset($_GET['dev_list'])){
			redirect(U('Common/notfind'));
		}
		$dev_list=$_GET['dev_list'];
		$dev_list=explode(',', $dev_list);
		for($i=0;$i<count($dev_list);$i++){
			$common->un_bind($dev_list[$i]);
		}
		$this->success("操作已完成");
	}
   
	/*
	 * 已绑定设备列表页面
	 */
	 public function bind_index(){
	 	$common = A ( 'Common' );
	 	$common->check_is_online ();
	 	$web_title = "已绑定设备信息管理_中国特种设备检测研究院";
	 	$this->assign ( 'web_title', $web_title );
	 	// 获取用户信息
	 	$user_id = $_SESSION ['user'];
	 	$user = M ( 'User' );
	 	$userinfo = $user->find ( $user_id );
	 	$userinfo = json_encode ( $userinfo );
	 	$userinfo = json_decode ( $userinfo );
	 	$this->assign ( 'userinfo', $userinfo );
	 	//获取已绑定设备列表
	 	$dev_list=$common->get_dev_bind_list($user_id);
	 	$this->assign('dev_list',$dev_list);
	 	$this->assign('bind_count',count($dev_list));
	 	$this->display ();
	 }
	 /*
	  * 扫码
	  */
	 public function scanning(){
	 	$user_id=$_SESSION['user'];#用户id
	 	$things=M('Things');
	 	$dev_id=$things->where('user_id='.$user_id)->getField('dev_id');
	 	if($dev_id>0){
	 		$data=array(
	 				'status'=>1,
	 				'dev_id'=>$dev_id
	 		);
	 	}else{
	 		$data=array(
	 				'status'=>0
	 		);
	 	}
	 	$things->where('user_id='.$user_id)->delete();
	 	$this->ajaxReturn($data,'JSON');
	 }
}