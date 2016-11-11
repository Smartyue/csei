<?php
//用户相关方法
class UserAction extends Action{
	//忘记密码页面
	public function forget(){
		if(isset($_SESSION['user'])){
			redirect(U('Index/index'));
		}
		$web_title="找回密码_中国特种设备检测研究院";
		$common=A('Common');
		$token=$common->make_form_token();
		$this->assign('_token',$token);
		$this->assign('web_title',$web_title);
		$this->display();
	}
	//忘记密码方法
	public function do_forget(){
		$token=$_POST['_token'];
		$common=A('Common');
		$check_token=$common->check_form_token($token);
		if(!$check_token){
			redirect(U('Common/notfind'));
		}
		$email=$_POST['email'];
		$user=M('User');
		$data['email']=$email;
		$userinfo=$user->where($data)->find();
		if(!$userinfo){
			$this->error("该邮箱尚未绑定账号,请重新输入",U('User/forget'));
		}
		
		$user_log=M('UserLog');
		//清空该用户之前发送的邮件验证信息，如果有
		$data_del['user_id']=$userinfo['id'];
		$user_log->where($data_del)->delete();
		//添加用户日志表
		$data_log['user_id']=$userinfo['id'];
		$data_log['email']=$email;
		$verify=md5($userinfo['username'].$email);#生成验证码
		$exptime=60*60*24+time();#验证码过期时间 24小时
		$data_log['token']=$verify;
		$data_log['token_exptime']=$exptime;
		$log_result=$user_log->add($data_log);
		if(!$log_result){
			$this->error("系统繁忙，请稍后再试",U('Index/login'));
			exit;
		}
		//准备发送邮件信息
		$title="找回密码_IOT_中国特种设备检测研究院";
		$url='http://'.$_SERVER['SERVER_NAME'].'/User/verify/token/'.$verify;
		$message="尊敬的用户<b>".$userinfo['username']."</b>:<br/>您好!您正在进行重置密码操作，请点击以下链接完成重置密码。<br><a href='".$url."' target='_blank'>".$url."</a><br>
				<i>若以上链接无法点击，请复制到浏览器地址栏中进行访问，该链接24小时内有效。</i><br><span style='color:red;'><b>如不是本人操作,请忽略此邮件。</b></span><br>
				<span style='float:right;'>----IOT_中国特种设备检测研究院</span>";
		$sender="IOT_中国特种设备检测研究院";
		$result=$common->send_mail($email,$title,$message,$sender);
		if($result){
			$msg="邮件发送成功！请登录邮箱完成操作";
			$this->success($msg,U('Index/login'));
		}else{
			$msg="邮件发送失败，请稍后再试";
			$this->error($msg,U('Index/login'));
		}
	}
   //重置密码界面
   public function verify(){
   	$token=$_GET['token'];
   	$user_log=M('UserLog');
   	$data['token']=$token;
   	$log_info=$user_log->where($data)->find();
   	if(!$log_info){
   		redirect(U('Common/notfind'));
   	}
   	if($log_info['token_exptime']<time()){
   		$user_log->where($data)->delete();#删除此验证信息
   		$this->error("验证码已过期，请重新发送邮件！",U('User/forget'));
   	}
    $this->assign('_token',$token);
    $this->assign('web_title','重置密码_中国特殊设备检测研究院');
    $this->display();
   }
   //重置密码方法
   public function reset(){
   	$token=$_POST['_token'];
   	$user_log=M('UserLog');
   	$data['token']=$token;
   	$log_info=$user_log->where($data)->find();
   	if(!$log_info){
   		$this->error("您访问的链接已失效",U('Index/login'));
   	}
   	if($log_info['token_exptime']<time()){
   		$user_log->where($data)->delete();#删除此验证信息
   		$this->error("验证码已过期，请重新发送邮件",U('User/forget'));
   	}
   	//修改密码操作
   	$user=M('User');
   	$data_reset['id']=$log_info['user_id'];
   	$data_reset['password']=md5($_POST['password']);
   	$result=$user->save($data_reset);
   	if($result){
   		//邮件提醒修改密码操作
   		$common=A('Common');
   		$userinfo=$user->find($log_info['user_id']);
   		$title="密码修改提醒_IOT_中国特种设备检测研究院";
   		$message="尊敬的用户<b>".$userinfo['username']."</b>:<br/>您好!您的密码已修改，<span style='color:red;'><b>如不是本人操作,请立即与本站联系。</b></span><br>
				<span style='float:right;'>----IOT_中国特种设备检测研究院</span>";
   		$sender="IOT_中国特种设备检测研究院";
   		$common->send_mail($log_info['email'],$title,$message,$sender);
   		//删除user_log 信息
   		$data_del['user_id']=$log_info['user_id'];
   		$user_log->where($data_del)->delete();
   		//跳转
   		$this->success("重置密码成功！<br>正在跳转至登录页面...",U('Index/login'));
   	}else{
   		$this->error("修改失败！请稍后再试",U('Index/login'));
   	}
   }
}