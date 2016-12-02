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
		$this->assign('web_title',"无法打开相应页面");
		$this->display('Public/notfind');
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
		//获取公共参数
		#1.获取送检清单数量
		$sub_sheet=M('SubSheet');
		$sub_count=$sub_sheet->count();
		$this->assign('sub_sheet_count',$sub_count);
		#获取填写检定信息数量
		$verify=M('Verify');
		$write_verify_count=$verify->where('status=1')->count();
		$this->assign('write_verify_count',$write_verify_count);
		#获取上传检定证书数量
		$upload_verify_count=$verify->where('status=2')->count();
		$this->assign('upload_verify_count',$upload_verify_count);
		$sum_count=$sub_count+$write_verify_count+$upload_verify_count;
		$this->assign('sum_count_all',$sum_count);#总和
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
			$lab_info=$labels->where('id='.$bind_info['lab_id'])->find();#电子标签详情
			$dev_list[$i]['lab_name']=$lab_info['label'];#电子标签编号
			$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');#规格型号
			$dev_list[$i]['spec']=$spec;
			$use_dept=$dev_manage->where('dev_id='.$dev_id)->getField('use_dept');#获取使用部门
			$dev_list[$i]['use_dept']=$use_dept;
		}
	    return $dev_list;
	}
	/*
	 * 获取已绑定设备列表方法
	 * 
	 */
	public function get_dev_bind_list($user_id){
		$dev_base=M('DevBase');
		$bind=M('Bind');
		$labels=M('Labels');
		$dev_manage=M('DevManage');
		$bind_list=$bind->field('dev_id as id,lab_id,bind_date')->order('bind_date DESC')->select();
		for($i=0;$i<count($bind_list);$i++){
			$dev_id=$bind_list[$i]['id'];
			$base_info=$dev_base->where('id='.$dev_id)->find();
			$bind_list[$i]['dev_name']=$base_info['dev_name'];//设备名称
			$bind_list[$i]['dev_no']=$base_info['dev_no'];//设备编号
			$bind_list[$i]['lab_name']=$labels->where('id='.$bind_list[$i]['lab_id'])->getField('label');//电子标签编号
			$use_dept=$dev_manage->where('dev_id='.$dev_id)->getField('use_dept');#获取使用部门
			$bind_list[$i]['use_dept']=$use_dept;
		}
		return $bind_list;
	}
	/*
	 * 获取设备基本信息方法
	 * id           设备id
	 */
	public function get_dev_baseinfo($id){
		$dev_base=M('DevBase');
		$info=$dev_base->find($id);
		if(!$info){
			redirect(U('Common/notfind'));
		}
		$dev_type=M('DevType');
		$app=M('AppProperty');
			//获取设备类型
			$type_id=$info['dev_typeid'];
			$type=$dev_type->where('id='.$type_id)->getField('name');
			$info['dev_type']=$type;
			//获取固定资产属性
			if($info['asset_property']==1){
				$info['_asset_property']="是";
			}else if($info['asset_property']==2){
				$info['_asset_property']="否";
			}else{
				$info['_asset_property']=NULL;
			}
			//获取设备属性a
			switch ($info['property_a']){
				case 1:
					$info['_property_a']="办公";
				    break;
				case 2:
					$info['_property_a']="检验";
					break;
				case 3:
					$info['_property_a']="软件";
					break;
				case 4:
					$info['_property_a']="专用";
					break;
				default:
					$info['_property_a']=NULL;
			}
			//获取设备属性b
			switch ($info['property_b']){
				case 1:
					$info['_property_b']="检验";
					break;
				case 2:
					$info['_property_b']="科研";
					break;
				default:
					$info['_property_b']=NULL;
			}
			//获取设备属性c
			switch ($info['property_c']){
				case 2:
					$info['_property_c']="否";
					break;
				case 1:
					$info['_property_c']="是";
					break;
				default:
					$info['_property_c']=NULL;
			}
			//获取设备应用属性
			$app_property=$app->where('id='.$info['app_property_id'])->getField('name');
			$info['app_property']=$app_property;
		return $info;
	}
	/*
	 * 获取设备购置信息
	 *  @id  设备id
	 */
	public function get_dev_buyinfo($id){
		$dev_buy=M('DevBuy');
		$info=$dev_buy->where('dev_id='.$id)->find();
		//获取增加方式
		switch ($info['add_method']){
			case 1:
				$info['_add_method']="购置";
				break;
			case 2:
				$info['_add_method']="赠送";
				break;
			case 3:
				$info['_add_method']="无偿调入";
				break;
			case 4:
				$info['_add_method']="有偿调入";
				break;
			case 5:
				$info['_add_method']="其他";
				break;
			default:
				$info['_add_method']=NULL;
		}
		//获取组织方式
		switch ($info['group_method']){
			case 1:
				$info['_group_method']="分散采购";
				break;
			case 2:
				$info['_group_method']="集中采购";
				break;
			case 3:
				$info['_group_method']="部门集中";
				break;
			case 4:
				$info['_group_method']="院自主采购";
				break;
			default:
				$info['_group_method']=NULL;
		}
		//获取采购方式
		switch ($info['buy_method']){
			case 1:
				$info['_buy_method']="公开招标";
				break;
			case 2:
				$info['_buy_method']="邀请招标";
				break;
			case 3:
				$info['_buy_method']="竞争性谈判";
				break;
			case 4:
				$info['_buy_method']="零星谈判";
				break;
			case 5:
				$info['_buy_method']="询价采购";
				break;
			case 6:
				$info['_buy_method']="单一来源";
				break;
			case 7:
				$info['_buy_method']="协商供货";
				break;
			case 8:
				$info['_buy_method']="批量集中";
				break;
			case 9:
				$info['_buy_method']="网上竞价";
				break;
			case 10:
				$info['_buy_method']="其他";
				break;
			default:
				$info['_buy_method']=NULL;
		}
		//获取新旧情况
		switch ($info['is_new']){
			case 1:
				$info['_is_new']="新";
				break;
			case 2:
				$info['_is_new']="旧";
				break;
			default:
				$info['_is_new']=NULL;
		}
		//获取科免属性
		switch ($info['kemian']){
			case 1:
				$info['_kemian']="是";
				break;
			case 2:
				$info['_kemian']="否";
				break;
			default:
				$info['_kemian']=NULL;
		}
		return $info;
	}
	/*
	 * 设备验收信息
	 */
	public function get_dev_checkinfo($id){
		$dev_check=M('DevCheck');
		$info=$dev_check->where('dev_id='.$id)->find();
		//获取管理状态
		switch ($info['manage_status']){
			case 1:
				$info['_manage_status']="集中管理";
				break;
			case 2:
				$info['_manage_status']="部门管理";
				break;
			case 3:
			  $info['_manage_status']="个人管理";
			  break;
			default:
			  $info['_manage_status']=NULL;
		}
		//获取借用状态
		switch($info['borrow_status']){
			case 1:
				$info['_borrow_status']="不可借";
				break;
			case 2:
				$info['_borrow_status']="可借";
				break;
			case 3:
				$info['_borrow_status']="待借";
				break;
			case 4:
				$info['_borrow_status']="已借";
				break;
			default:
				$info['_borrow_status']=NULL;
		}
		//获取配置状态
		switch ($info['config_status']){
			case 1:
				$info['_config_status']="未配置";
				break;
			case 2:
				$info['_config_status']="部门配置";
				break;
			case 3:
				$info['_config_status']="个人配置";
				break;
			case 4:
				$info['_config_status']="仪器配置";
				break;
			case 5:
				$info['_config_status']="中心公共";
				break;
			case 6:
				$info['_config_status']="其他";
				break;
			default:
				$info['_config_status']=NULL;
		}
		//获取设备状态
		switch ($info['status']){
			case 1:
				$info['_status']="完好";
				break;
			case 2:
				$info['_status']="封存";
				break;
			case 3:
				$info['_status']="待修";
				break;
			case 4:
				$info['_status']="报废";
				break;
			case 5:
				$info['_status']="调拨";
				break;
			case 6:
				$info['_status']="出让";
				break;
			case 7:
				$info['_status']="其他";
				break;
			case 8:
				$info['_status']="待报废";
				break;
			case 9:
				$info['_status']="待核实";
				break;
			case 10:
				$info['_status']="援助";
				break;
			case 11:
				$info['_status']="待购";
				break;
			case 12:
				$info['_status']="验收中";
				break;
			case 13:
				$info['_status']="待验收";
				break;
			default:
				$info['_status']=NULL;
		}
		//是否是固定设备
		switch ($info['is_asset']){
			case 1:
				$info['_is_asset']="固定资产";
				break;
			case 2:
				$info['_is_asset']="移动设备";
				break;
			default:
				$info['_is_asset']=NULL;
		}
		//是否免税
		switch($info['is_free']){
			case 1:
				$info['_is_free']="是";
				break;
			case 2:
				$info['_is_free']="否";
				break;
			default:
				$info['_is_free']=NULL;
		}
		return $info;
	}
	/*
	 * 设备管理信息
	 */
	public function get_dev_manageinfo($id){
		$dev_manage=M('DevManage');
		$info=$dev_manage->where('dev_id='.$id)->find();
		//获取处置方式
		switch ($info['manage_method']){
			case 1:
				$info['_manage_method']="出让";
				break;
			case 2:
				$info['_manage_method']="报废";
				break;
			case 3:
				$info['_manage_method']="无偿调拨";
				break;
			case 4:
				$info['_manage_method']="有偿调拨";
				break;
			case 5:
				$info['_manage_method']="其他";
				break;
			default:
				$info['_manage_method']=NULL;
		}
		return $info;
	}
	/*
	 * 设备技术参数信息
	 */
	public function get_dev_teahinfo($id){
		$dev_tech=M('DevTech');
		$info=$dev_tech->where('dev_id='.$id)->find();
		return $info;
	}
	/*
	 * 设备费用信息
	 */
	public function get_dev_costinfo($id){
		$dev_cost=M('DevCost');
		$info=$dev_cost->where('dev_id='.$id)->find();
		return $info;
	}
	/*
	 * 设备检定信息
	 */
	public function get_dev_verifyinfo($id){
		$dev_verify=M('DevVerify');
		$info=$dev_verify->where('dev_id='.$id)->field('`id`,`dev_id`,`plan_date`,`is_sum`,`status`,`date`,`period`')->find();
		//是否计量
		switch ($info['is_sum']){
			case 1:
				$info['_is_sum']="是";
				break;
			case 2:
				$info['_is_sum']="否";
				break;
			default:
				$info['_is_sum']=NULL;
		}
		//检定校准状态
		switch ($info['status']){
			case 1:
				$info['_status']="合格";
				break;
			case 2:
				$info['_status']="维修中";
				break;
			case 3:
				$info['_status']="待检";
				break;
			case 4:
				$info['_status']="已送检";
				break;
			case 5:
				$info['_status']="不合格";
				break;
			case 6:
				$info['_status']="停用";
				break;
			case 7:
				$info['_status']="其他";
				break;
			case 8:
				$info['_status']="无";
				break;
			default:
				$info['_status']=NULL;
		}
		return $info;
	}
	/*
	 * 设备供应商信息
	 */
	public function get_dev_supinfo($id){
		$dev_sup=M('DevSupplier');
		$info=$dev_sup->where('dev_id='.$id)->find();
		return $info;
	}
	/*
	 * 分配电子标签绑定方法
	 * dev_id    要分配的设备id
	 */
	 public function bind_label($dev_id){
	 	//获取未绑定标签ID
	 	$labels=M('Labels');
	 	$lab_id=$labels->where('status=0')->getField('id');
	 	//执行绑定操作
	 	$bind=M('Bind');
	 	$check=$bind->where('dev_id='.$dev_id)->find();#检测是否已经绑定过
	 	if(!$check){#如果没有绑定过，进行绑定操作
	 		$data['dev_id']=$dev_id;
	 		$data['lab_id']=$lab_id;
	 		$data['bind_date']=date('Y-m-d',time());
	 		$result=$bind->add($data);
	 		if($result){
	 			$data_lab['id']=$lab_id;
	 			$data_lab['status']=1;
	 			$save_result=$labels->save($data_lab);
	 			if($save_result){
	 				return true;
	 			}else{
	 				$bind->where('id='.$result)->delete();
	 				return false;
	 			}
	 		}else{
	 			return false;
	 		}
	 	}else{
	 		return false;
	 	}
	 }
	 /*
	  * 解除设备标签绑定方法
	  */
	 public function un_bind($dev_id){
	 	$bind=M('Bind');
	 	$lab_id=$bind->where('dev_id='.$dev_id)->getField('lab_id');
	 	$bind_result=$bind->where('dev_id='.$dev_id)->delete();
	 	if($bind_result){
	 		$labels=M('Labels');
	 		$data['id']=$lab_id;
	 		$data['status']=0;
	 		$label_result=$labels->save($data);
	 		if($label_result){
	 			return true;
	 		}else{
	 			return false;
	 		}
	 	}else{
	 		return false;
	 	}
	 }

    /*
     * 设备加入送检清单方法 
     */
    public function send_sub($dev_id){
    	//检测该设备是否待检
    	$dev_verify=M('DevVerify');
    	$status=$dev_verify->where('dev_id='.$dev_id)->getField('status');
    	if($status!=3){
    		return false;
    		exit;
    	}
    	$sub_sheet=M('SubSheet');
    	$data['dev_id']=$dev_id;
    	$result=$sub_sheet->add($data);
    	return $result;
    }

    /*
     * 设备加入检定校准清单方法
     */
    public function send_verify($dev_id){
    	//检测该设备是否已送检
    	$dev_verify=M('DevVerify');
    	$status=$dev_verify->where('dev_id='.$dev_id)->getField('status');
    	if($status!=4){
    		return false;
    		exit;
    	}
    	$verify=M('Verify');
    	//检测是否已经加入填写检定信息列表中
    	$check=$verify->where('dev_id='.$dev_id.' AND status=1')->find();
    	if($check){
    		return false;
    		exit;
    	}
    	//写入检定信息表
    	$plan_date=$dev_verify->where('dev_id='.$dev_id)->getField('plan_date');#本次计划检定日期
    	$data['dev_id']=$dev_id;
    	$data['status']=1;
    	$data['date']=date('Y-m-d',time());
    	$data['plan_date']=$plan_date;
    	$result=$verify->add($data);
    	return $result;
    }


    /*
     * 根据送检时间和周期计算计划下次送检日期方法
     */
    public function get_plan_date($date,$period){
    	$plan_date=date('Y-m-d',strtotime($date.'+'.$period.' month'));
    	return $plan_date;
    }
    /*
     * 上传证书方法
     */
    public function upload_license(){
    	//***********配置上传类信息***********
    	import('ORG.Net.UploadFile');
    	$upload=new UploadFile();//实例化上传类
    	$upload->allowExts=array('jpg','gif','png','jpeg');//设置上传类型
    	$upload->savePath =  './Public/upload/license/';// 设置附件上传目录
    	$upload->autoSub=true;//设置使用子目录保存文件
    	$upload->subType='date';//设置子目录创建方式为date
    	$upload->upload();
    	$info =  $upload->getUploadFileInfo();
    	$logo=$info[0]['savepath'].$info[0]['savename'];
    	//保存至数据库
    	$verify_photos=M('VerifyPhotos');
    	$data['verify_id']=$_POST['ver_id'];
    	$data['photo_url']=$logo;
    	$verify_photos->add($data);
    	echo $logo;
   // 	$this->ajaxReturn($logo,'JSON');
    }
    /*
     * //获取某年送检历史统计数据
     */
    public function get_sub_log($year){
    	$sub_log=M('SubLog');
    	$begin_time=$year.'-01-01';#起始时间
		$end_time=$year.'-12-31';#结束时间
		$data['date']=array('BETWEEN',array($begin_time,$end_time));
		$result=$sub_log->where($data)->select();
		if($result){
			return $result;
		}else{
			return false;
		}
    }
    /*
     * 根据年份获取送检评价信息
     */
    public function get_sub_rate($year){
    	$verify=M('Verify');
    	$begin_time=$year.'-01-01';#起始时间
    	$end_time=$year.'-12-31';#结束时间
    	$data['status']=array('NEQ',1);
    	$data['date']=array('BETWEEN',array($begin_time,$end_time));
    	$result=$verify->where($data)->select();
    	
    	//获取设备详细信息：设备编号、设备名称、规格型号、实际检定日期
    	$dev_base=M('DevBase');
    	$dev_tech=M('DevTech');
    	$dev_verify=M('DevVerify');
    	for ($i=0;$i<count($result);$i++){
    		$dev_id=$result[$i]['dev_id'];#设备id
    		$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name')->find();
    		$result[$i]['dev_no']=$base_info['dev_no'];
    		$result[$i]['dev_name']=$base_info['dev_name'];
    		$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');
    		$result[$i]['spec']=$spec;
    	}
    	return $result;
    }
    
    /*
     * 扫码接口
     */
    public function scanning_code(){
    	$label=$_GET['label'];//标签号
    	$machine_id=$_GET['machine_id'];//扫码设备id
    	//获取扫码者userid和扫到的设备id
    	$scan=M('Scan');
    	$scan_id=$scan->where('machine_id='.$machine_id)->getField('id');
    	if(!$scan_id){
    		exit("非法访问");
    	}
    	$scan_bind=M('ScanBind');
    	$user_id=$scan_bind->where('scan_id='.$scan_id)->getField('user_id');
    	if(!$user_id){
    		echo "该设备尚未绑定，请绑定后再进行操作";
    		exit;
    	}
    	
    	$labels=M('Labels');
    	$find_data['label']=$label;
    	$lab_id=$labels->where($find_data)->getField('id');#标签id
    	if(!$lab_id){
    	     echo "该标签尚未收录，请收录后再试！";
    	     exit;
    	}
    	$bind=M('Bind');
    	$dev_base=M('DevBase');
    	$dev_id=$bind->where('lab_id='.$lab_id)->getField('dev_id');
    	if(!$dev_id){
    		echo  "该标签未绑定设备！";
    		exit;
    	}
    	$base_info=$dev_base->where('id='.$dev_id)->find();
    	if($base_info){
    		//发送给客户端
    		
    		$data="设备名称：".$base_info['dev_name']."<br>设备编号：".$base_info['dev_no'];
    		
    	}else{
    		$data="该标签不存在或未绑定设备";
    	}
    	$things=M('Things');
    	$data_things['user_id']=$user_id;
    	$data_things['dev_id']=$dev_id;
    	$things->add($data_things);
    	echo $data;
    }
    
    
    /*
     * 根据名称搜索
     */
    public function search_by_name($name){
    	$labels=M('Labels');
    	$bind=M('Bind');
    	$lab_dev_id_list=array();   //按搜索名称 搜索出的设备id集合
    	#1.按标签编号搜索
    	$data_find['label']=array('like',"%{$name}%");
    	$lab_id_list=$labels->where($data_find)->field('id')->select();
    	foreach ($lab_id_list as $v){
    		$dev_id=$bind->where('lab_id='.$v['id'])->getField('dev_id');
    		if($dev_id){
    		array_push($lab_dev_id_list, $dev_id);
    		}
    	}
    	#2.按设备名称搜索
    	$dev_base=M('DevBase');
    	$data['dev_name']=array('like',"%{$name}%");
    	$dev_id_list=$dev_base->where($data)->field('id')->select();
    	foreach($dev_id_list as $v){
    		array_push($lab_dev_id_list, $v['id']);
    	}
    	#3.按设备编号搜索
    	$data_dev_no['dev_no']=array('like',"%{$name}%");
    	$dev_id_list=$dev_base->where($data_dev_no)->field('id')->select();
    	foreach($dev_id_list as $v){
    		array_push($lab_dev_id_list, $v['id']);
    	}
    	//去重   序列化
    	$lab_dev_id_list=array_unique($lab_dev_id_list);
    	$lab_dev_id_list=array_values($lab_dev_id_list);
    	return $lab_dev_id_list;
    }

    /*
     * 根据绑定日期搜索
     */
    public function search_by_bind_date($bind_date_start,$bind_date_end){
    	$bind=M('Bind');
    	$result=array();//按绑定日期搜索出的设备id集合
    	$data_bind['bind_date']=array('BETWEEN',array($bind_date_start,$bind_date_end));
    	$bind_list=$bind->where($data_bind)->field('dev_id')->select();
    	foreach ($bind_list as $v){
    		array_push($result,$v['dev_id']);
    	}
    	return $result;
    }
    /*
     * 根据绑定状态搜索
     */
    public function search_by_bind_status($bind_status){
    	$result=array();
    	$dev_base=M('DevBase');
    	$bind=M('Bind');
    	$dev_id_list=$dev_base->where('id>0')->field('id')->select();
    	if($bind_status==1){//未绑定
    		foreach ($dev_id_list as $v){
    			$dev_id=$v['id'];
    			$check=$bind->where('dev_id='.$dev_id)->getField('id');
    			if(!$check){
    				array_push($result,$dev_id);
    			}
    		}
    	}else if($bind_status==2){//已绑定
    		foreach ($dev_id_list as $v){
    			$dev_id=$v['id'];
    			$check=$bind->where('dev_id='.$dev_id)->getField('id');
    			if($check){
    				array_push($result,$dev_id);
    			}
    		}
    	}else{  //获取全部
    		foreach ($dev_id_list as $v){
    			array_push($result, $v['id']);
    		}
    	}
    	return $result;
    }
    /*
     * 根据使用部门搜索
     */
     public function search_by_use_dept($use_dept){
     	$result=array();
     	$dev_manage=M('DevManage');
     	$data['use_dept']=array('like',"%{$use_dept}%");
     	$dev_id_list=$dev_manage->where($data)->field('dev_id')->select();
     	foreach($dev_id_list as $v){
     		array_push($result, $v['dev_id']);
     	}
     	return $result;
     }
     /*
      * 根据检定日期搜索
      */
     public function search_by_verify_date($bind_date_start,$bind_date_end){
     	$dev_verify=M('DevVerify');
     	$result=array();
     	$data_verify['date']=array('EGT',$bind_date_start);
     	$data_verify['end_date']=array('ELT',$bind_date_end);
     	$verify_list=$dev_verify->where($data_verify)->field('dev_id')->select();
     	foreach($verify_list as $v){
     		array_push($result, $v['dev_id']);
     	}
     	return $result;
     }
     /*
      * 根据借用状态搜索
      */
     public function search_by_borrow_status($borrow_status){
     	$dev_check=M('DevCheck');
     	$result=array();
     	$data_check['borrow_status']=$borrow_status;
     	$check_list=$dev_check->where($data_check)->field('dev_id')->select();
     	foreach ($check_list as $v){
     		array_push($result, $v['dev_id']);
     	}
     	return $result;
     }
     /*
      * 根据检定状态搜索
      */
     public function search_by_verify_status($verify_status){
     	$dev_verify=M('DevVerify');
     	$result=array();
     	$data_verify['status']=$verify_status;
     	$verify_list=$dev_verify->where($data_verify)->field('dev_id')->select();
     	foreach ($verify_list as $v){
     		array_push($result,$v['dev_id']);
     	}
     	return $result;
     }
     
     /*
      * 获取扫描仪列表及绑定状态
      */
     public function get_scan_list($user_id){
     	$scan=M('Scan');
     	$scan_list=$scan->select();
     	$scan_bind=M('ScanBind');
     	for ($i=0;$i<count($scan_list);$i++){
     		$scan_id=$scan_list[$i]['id'];
     		$check=$scan_bind->where('scan_id='.$scan_id)->getField('user_id');
     		if($check>0){
     			$scan_list[$i]['status']=1;//已绑定
     			$scan_list[$i]['_status']="已绑定";
     			if($check==$user_id){
     				$scan_list[$i]['own']=1;
     			}
     		}else{
     			$scan_list[$i]['status']=2;//未绑定
     			$scan_list[$i]['_status']="未绑定";
     		}
     	}
     	return $scan_list;
     }
}