<?php
/*
 * 公共函数方法
 */
class CommonAction extends Action {
	
	/*
	 *
	 * 空操作
	 */
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
	/*
	 * 404页面
	 */
	public function notfind() {
		echo 404;
	}
	// 判断是否在线/锁定方法
	public function check_is_online() {
		// 判断是否在线,如果session失效，返回登录页面
		if (! isset ( $_SESSION ['user'] )) {
			redirect ( U ( 'Index/login' ) );
		}
		$user_id = $_SESSION ['user']; // 获取用户id
		$user = M ( 'User' );
		$status = $user->where ( 'id=' . $user_id )->getField ( 'status' ); // 获取用户账号状态
		switch ($status) {
			case 1 :
				break;
			case 2 :
				redirect ( U ( 'Index/lock_screen' ) ); // 锁屏需登录
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
	// 生成表单令牌方法
	public function make_form_token($string='kryzl') {
		$str = $string . time () . $string;
		$token = md5 ( $str );
		$_SESSION ['__TOKEN__'] = $token;
		return $token;
	}
	// 比对表单令牌方法
	public function check_form_token($token) {
		// 进行比对,并在比对完之后清空session
		if ($token == $_SESSION ['__TOKEN__']) {
			$_SESSION ['__TOKEN__'] = NULL;
			return true;
		} else {
			$_SESSION ['__TOKEN__'] = NULL;
			return false;
		}
	}
	//发送邮件方法
	/*
	 * 参数说明
	 * address 收件人地址
	 * title 邮件标题
	 * message 邮件正文
	 * sender 发件人姓名
	 */
	public function send_mail($address,$title,$message,$sender){
		import('ORG.Net.PHPMailer');
		$mail=new PHPMailer();
		//设置phpmailer使用smtp服务器发送email
		$mail->IsSMTP();
		//设置邮件的字符编码，默认utf-8
		$mail->CharSet='UTF-8';
		//收件人地址
		$mail->AddAddress($address);
		//设置邮件正文
		$mail->Body=$message;
		//设置邮件头的From字段
		$mail->From=C('MAIL_ADDRESS');
		//设置发件人名字
		$mail->FromName=$sender;
		//设置邮件标题
		$mail->Subject=$title;
		//设置smtp服务器
		$mail->Host=C('MAIL_SMTP');
		//设置为需要验证
		$mail->SMTPAuth=true;
		//设置用户名和密码
		$mail->Username=C('MAIL_LOGINNAME');
		$mail->Password=C('MAIL_PASSWORD');
		//邮箱端口
		$mail->Port=C('MAIL_PORT');
		//支持html
		$mail->IsHTML();
		return ($mail->Send());
	}
	/*
	 * 获取设备信息列表方法（设备信息管理页面 Device/index）
	 * @返回数组字段 —含义
	 *        id                      —设备id
	 * dev_no                 —设备编号
	 * dev_name          —设备名称
	 * dev_sn                 —出厂编号
	 * bind_date          —绑定日期
	 * lab_name          —标签编号
	 * spec                      —规格型号
	 * use_dept           —使用部门
	 */
	public function get_dev_info_list($user_id){
		$dev_base=M('DevBase');
		$bind=M('Bind');
		$labels=M('Labels');
		$dev_tech=M('DevTech');
		$dev_manage=M('DevManage');
		$dev_list=$dev_base->field('id,dev_no,dev_name,dev_sn')->select();
		for($i=0;$i<count($dev_list);$i++){
			$dev_id=$dev_list[$i]['id'];#设备id
			$bind_info=$bind->where('dev_id='.$dev_id)->find();#绑定详情
			$dev_list[$i]['bind_date']=$bind_info['bind_date'];#绑定日期
			$lab_info=$labels->find($bind_info['lab_id']);#电子标签详情
			$dev_list[$i]['lab_name']=$lab_info['label'];#电子标签编号
			$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');#规格型号
			$dev_list[$i]['spec']=$spec;
			$use_dept=$dev_manage->where('dev_id='.$dev_id)->getField('use_dept');#获取使用部门
			$dev_list[$i]['use_dept']=$use_dept;
		}
	    return $dev_list;
	}
}