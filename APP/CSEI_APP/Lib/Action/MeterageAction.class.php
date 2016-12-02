<?php
//计量管理控制器
class MeterageAction extends Action{
	
	
	/*
	 *
	 * 空操作
	 */
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
	/*
	 * 计量管理首页（设备查询送检)
	 */
	public function index(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "设备查询送检_计量管理_中国特种设备检测研究院";
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
		$dev_verify=M('DevVerify');
		for($i=0;$i<count($dev_list);$i++){
			$dev_id=$dev_list[$i]['id'];#设备id
			$verify_info=$dev_verify->where('dev_id='.$dev_id)->field('status,date,end_date,submitter')->find();
			switch ($verify_info['status']){
				case 1:
					$dev_list[$i]['_status']="合格";
					break;
				case 2:
					$dev_list[$i]['_status']="维修中";
					break;
				case 3:
					$dev_list[$i]['_status']="待检";
					break;
				case 4:
					$dev_list[$i]['_status']="已送检";
					break;
				case 5:
					$dev_list[$i]['_status']="不合格";
					break;
				case 6:
					$dev_list[$i]['_status']="停用";
					break;
				case 7:
					$dev_list[$i]['_status']="其他";
					break;
				case 8:
					$dev_list[$i]['_status']="无";
					break;
				default:
					$dev_list[$i]['_status']=NULL;
			}
			$dev_list[$i]['status']=$verify_info['status'];
			$dev_list[$i]['date']=$verify_info['date'];
			$dev_list[$i]['end_date']=$verify_info['end_date'];
			$dev_list[$i]['submitter']=$verify_info['submitter'];
		}
		$this->assign('dev_list',$dev_list);
		$this->assign('dev_count',count($dev_list));
		$this->display ();
	}
	/*
	 * 设备加入送检清单方法
	 */
	public function send_to_sub_sheet(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$dev_id=$_GET['dev_id'];
		$result=$common->send_sub($dev_id);
		if($result){
			$this->success("操作成功!<br>已添加至送检清单中");
		}else{
			$this->error("操作失败!<br>该设备已被添加至送检清单中或该设备不可送检");
		}
	}
	/*
	 * 设备加入送检清单方法  多个
	 */
	public function send_to_sub_sheet_list(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$dev_list=$_GET['dev_list'];
		$dev_list=explode(',',$dev_list);
		foreach ($dev_list as $v){
			$common->send_sub($v);
		}
		$this->success("操作已完成！<br>系统已将所选处于待检的设备添加至送检清单，请及时处理");
	}

	/*
	 * 送检清单页面
	 */
	public function sub_sheet(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "送检清单_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取设备清单列表
		$sub_sheet=M('SubSheet');
		$sub_list=$sub_sheet->where('id>0')->select();
		$dev_base=M('DevBase');
		$dev_tech=M('DevTech');
		$dev_verify=M('DevVerify');
		$dept=M('Dept');
		//获取送检单位列表
		$dept_list=$dept->select();
		$this->assign('dept_list',$dept_list);
		//获取详细信息
		for($i=0;$i<count($sub_list);$i++){
			$dev_id=$sub_list[$i]['dev_id'];#设备id
			$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name,dev_sn')->find();
			$sub_list[$i]['dev_no']=$base_info['dev_no'];
			$sub_list[$i]['dev_name']=$base_info['dev_name'];
			$sub_list[$i]['dev_sn']=$base_info['dev_sn'];
			$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');
			$sub_list[$i]['spec']=$spec;
			$verify_info=$dev_verify->where('dev_id='.$dev_id)->field('dev_others,dept_id,date,submitter')->find();
			$sub_list[$i]['dev_others']=$verify_info['dev_others'];
			$sub_list[$i]['dept_id']=$verify_info['dept_id'];
			$sub_list[$i]['date']=$verify_info['date'];
			$sub_list[$i]['submitter']=$verify_info['submitter'];
		}
		$this->assign('sub_list',$sub_list);
		
		$today=date('Y-m-d',time());
		$this->assign('today',$today);
		$this->display();
	}
	/*
	 * AJAX   从送检清单中移除设备
	 */
	public function delete_sub_sheet(){
		$id=$_POST['id'];
		$sub_sheet=M('SubSheet');
		$result=$sub_sheet->where('id='.$id)->delete();
		if($result){
             $data=array(
             		'status'=>1,
             		'msg'=>'操作成功!',
             );
		}else{
			$data=array(
					'status'=>0,
					'msg'=>'操作失败!该设备不存在或已被移除',
			);
		}
		$this->ajaxReturn($data,'JSON');
	}
	/*
	 * 确定送检方法
	 */
	public function submit_sub_sheet(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		$common = A ( 'Common' );
		$common->check_is_online ();
		//接收参数
		$id_list=$_POST['id'];
		$dev_id_list=$_POST['dev_id'];
		$dev_others_list=$_POST['dev_others'];
		$dept_id_list=$_POST['dept_id'];
		$submitter_list=$_POST['submitter'];
		$date_list=$_POST['date'];
		$note=htmlspecialchars($_POST['note']);
		$this->assign('note',$note);
		//保存相关信息并删除送检清单
		$dev_verify=M('DevVerify');
		$sub_sheet=M('SubSheet');
		$dev_base=M('DevBase');
		$dev_tech=M('DevTech');
		$dept=M('Dept');
		$sub_list=array();
		for($i=0;$i<count($id_list);$i++){
			$ver_id=$dev_verify->where('dev_id='.$dev_id_list[$i])->getField('id');
			$data_update['id']=$ver_id;
			$data_update['status']=4;#已送检
			$data_update['date']=htmlspecialchars($date_list[$i]);
			$data_update['submitter']=htmlspecialchars($submitter_list[$i]);
			$data_update['dev_others']=htmlspecialchars($dev_others_list[$i]);
			$data_update['dept_id']=$dept_id_list[$i];
			$dev_verify->save($data_update);
			$sub_sheet->where('id='.$id_list[$i])->delete();
			
			$dev_id=$dev_id_list[$i];
			$dev_list['dev_id']=$dev_id;
			$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name,dev_sn')->find();
			$dev_list['dev_no']=$base_info['dev_no'];
			$dev_list['dev_name']=$base_info['dev_name'];
			$dev_list['dev_sn']=$base_info['dev_sn'];
			$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');
			$dev_list['spec']=$spec;
			$dev_list['dev_others']=$data_update['dev_others'];
			$dev_list['dept']=$dept->where('id='.$data_update['dept_id'])->getField('name');
			$dev_list['date']=$data_update['date'];
			$dev_list['submitter']=$data_update['submitter'];
			array_push($sub_list, $dev_list);
		}
		$sub_log=M('SubLog');
		$send_date=$_POST['send_date'];#送检日期
		//生成批次
		$etc="PC_".date('YmdHis',time()).rand(100,999);
		$dev_count=count($id_list);#送检设备数量
		
		$this->assign('today',$send_date);#送检日期
		$this->assign('etc',$etc);#批次
		//获取显示页面设备列表
		$this->assign('sub_list',$sub_list);
		$web_title = "打印交接单_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		//获取文件名称
		$file_name=$etc;
		$file_path="./Html/".date('Y',time())."/".date('m',time())."/";
		$html_url=$file_path.$file_name.".html";
		$data_sub_log['date']=$send_date;
		$data_sub_log['dev_sum']=$dev_count;
		$data_sub_log['etc']=$etc;
		$data_sub_log['html_url']=$html_url;
		$sub_log->add($data_sub_log);
		$this->buildHtml($file_name,$file_path,'');
		$this->display();
	}
 
	/*
	 * 加入检定校准信息方法
	 */
	public function send_to_verify(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$dev_id=$_GET['dev_id'];
		$result=$common->send_verify($dev_id);
		if($result){
			$this->success("操作成功!<br>已添加至填写检定校准信息列表");
		}else{
			$this->error("操作失败!<br>该设备已被添加至填写检定校准信息列表 或<br>该设备未处于已送检状态");
		}
	}
	/*
	 * 批量加入检定校准信息方法
	 */
	public function send_to_verify_list(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$dev_list=$_GET['dev_list'];
		$dev_list=explode(',',$dev_list);
		foreach ($dev_list as $v){
			$common->send_verify($v);
		}
		$this->success("操作已完成！<br>系统已将所选处于已送检的设备添加至填写检定信息，请及时处理");
	}

	/*
	 * 填写检定校准信息页面
	 */
	public function verify(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "填写检定校准信息_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取设备清单列表
		$dev_base=M('DevBase');
		$dev_verify=M('DevVerify');
		$dept=M('Dept');
		$verify=M('Verify');
		$ver_list=$verify->where('status=1')->field('id,dev_id')->select();
		for($i=0;$i<count($ver_list);$i++){
			$dev_id=$ver_list[$i]['dev_id'];
			$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name')->find();
			$ver_list[$i]['dev_no']=$base_info['dev_no'];
			$ver_list[$i]['dev_name']=$base_info['dev_name'];
			$verify_info=$dev_verify->where('dev_id='.$dev_id)->field('date,dept_id')->find();
			$ver_list[$i]['date']=$verify_info['date'];
			$ver_list[$i]['dept_id']=$verify_info['dept_id'];
		}
		//var_dump($ver_list);
		$this->assign('ver_list',$ver_list);
		//获取送检单位列表
		$dept_list=$dept->select();
		$this->assign('dept_list',$dept_list);
		$this->assign('today',date('Y-m-d',time()));
		$this->display();
	}
	
	/*
	 * AJAX   从填写检定校准信息中移除设备
	 */
	public function delete_verify(){
		$id=$_POST['id'];
		$verify=M('Verify');
		$result=$verify->where('id='.$id.' AND status=1')->delete();
		if($result){
			$data=array(
					'status'=>1,
					'msg'=>'操作成功!',
			);
		}else{
			$data=array(
					'status'=>0,
					'msg'=>'操作失败!该设备不存在或已被移除',
			);
		}
		$this->ajaxReturn($data,'JSON');
	}
	/*
	 * 确认并保存检定校准信息方法
	 */
	public function do_verify(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		$common = A ( 'Common' );
		$common->check_is_online ();
		//接收参数
		$end_date=$_POST['end_date'];#结束日期
		$id_list=$_POST['id'];
		$dev_id_list=$_POST['dev_id'];
		$date_list=$_POST['date'];
		$verify_no_list=$_POST['verify_no'];
		$status_list=$_POST['status'];
		$period_list=$_POST['period'];
		$verify_property_list=$_POST['verify_property'];
		$verify_method_list=$_POST['verify_method'];
		$dept_id_list=$_POST['dept_id'];
		$verify_price_list=$_POST['verify_price'];
		$note_list=$_POST['note'];
		//保存信息并修改检定信息状态
		$verify=M('Verify');
		$dev_verify=M('DevVerify');
		for($i=0;$i<count($id_list);$i++){
			$dev_id=$dev_id_list[$i];
			$dev_ver_id=$dev_verify->where('dev_id='.$dev_id)->getField('id');
			$data_update['id']=$dev_ver_id;
			$data_update['plan_date']=$common->get_plan_date($date_list[$i],$period_list[$i]);
			$data_update['status']=$status_list[$i];
			$data_update['date']=$date_list[$i];
			$data_update['period']=$period_list[$i];
			$data_update['end_date']=$end_date;
			$data_update['verify_no']=htmlspecialchars($verify_no_list[$i]);
			$data_update['verify_property']=$verify_property_list[$i];
			$data_update['verify_method']=$verify_method_list[$i];
			$data_update['dept_id']=$dept_id_list[$i];
			$data_update['verify_price']=htmlspecialchars($verify_price_list[$i]);
			$data_update['note']=htmlspecialchars($note_list[$i]);
			$dev_verify->save($data_update);
			//修改cs_verify表信息
			$data_verify['id']=$id_list[$i];
			$data_verify['status']=2;
			$data_verify['date']=date('Y-m-d',time());
			$data_verify['true_date']=$date_list[$i];
			$verify->save($data_verify);
		}
		$this->success("操作成功,正在跳转至上传检定证书页面",U('Meterage/verify_license'));
	}
	/*
	 * 待上传检定证书页面
	 */
	public function verify_license(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "上传检定证书_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取待上传证书设备列表
		$verify=M('Verify');
		$dev_base=M('DevBase');
		$dev_tech=M('DevTech');
		$dev_manage=M('DevManage');
		$dev_verify=M('DevVerify');
		$ver_list=$verify->where('status=2')->field('id,dev_id')->select();
		for($i=0;$i<count($ver_list);$i++){
			$dev_id=$ver_list[$i]['dev_id'];
			$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name,dev_sn')->find();
			$ver_list[$i]['dev_no']=$base_info['dev_no'];
			$ver_list[$i]['dev_name']=$base_info['dev_name'];
			$ver_list[$i]['dev_sn']=$base_info['dev_sn'];
			$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');
			$ver_list[$i]['spec']=$spec;
			$use_dept=$dev_manage->where('dev_id='.$dev_id)->getField('use_dept');
			$ver_list[$i]['use_dept']=$use_dept;
			$end_date=$dev_verify->where('dev_id='.$dev_id)->getField('end_date');
			$ver_list[$i]['end_date']=$end_date;
		}
		$this->assign('ver_list',$ver_list);
		$this->display();
	}
	/*
	 * 上传证书页面
	 */
	public function upload_license(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$id=$_GET['id'];
		$web_title = "上传检定证书_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取设备详情
		$dev_base=M('DevBase');
		$verify=M('Verify');
		$dev_verify=M('DevVerify');
		$dev_id=$verify->where('id='.$id)->getField('dev_id');
		$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name')->find();
		$this->assign('dev_no',$base_info['dev_no']);
		$this->assign('dev_name',$base_info['dev_name']);
		$end_date=$dev_verify->where('dev_id='.$dev_id)->getField('end_date');
		$this->assign('end_date',$end_date);
		//获取已经上传的证书列表
		$verify_photos=M('VerifyPhotos');
		$photos=$verify_photos->where('verify_id='.$id)->order('id ASC')->select();
		$this->assign('photos',$photos);
		$this->assign('ver_id',$id);
		$this->display();
	}
	
	/*
	 * 删除图片
	 */
	public function delete_photo(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$id=$_GET['id'];
		$verify_photos=M('VerifyPhotos');
		$url=$verify_photos->where('id='.$id)->getField('photo_url');
		unlink($url);
		$verify_photos->where('id='.$id)->delete();
		$this->success("操作成功!");
	}
	/*
	 * 提交证书
	 */
	public function sub_license(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$id=$_GET['ver_id'];
		//修改填写检定信息表
		$verify=M('Verify');
		$data['id']=$id;
		$data['status']=3;
		$result=$verify->save($data);
		if($result){
			$this->success("提交成功!");
		}else{
			$this->error("提交失败！请稍后再试");
		}
	}
	/*
	 * 已完成检定证书页面
	 */
	public function done_license(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "已完成检定证书_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取已完成检定证书列表
		$verify=M('Verify');
		$dev_base=M('DevBase');
		$dev_tech=M('DevTech');
		$dev_manage=M('DevManage');
		$dev_verify=M('DevVerify');
		$ver_list=$verify->where('status=3')->field('id,dev_id')->select();
		for($i=0;$i<count($ver_list);$i++){
			$dev_id=$ver_list[$i]['dev_id'];
			$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name,dev_sn')->find();
			$ver_list[$i]['dev_no']=$base_info['dev_no'];
			$ver_list[$i]['dev_name']=$base_info['dev_name'];
			$ver_list[$i]['dev_sn']=$base_info['dev_sn'];
			$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');
			$ver_list[$i]['spec']=$spec;
			$use_dept=$dev_manage->where('dev_id='.$dev_id)->getField('use_dept');
			$ver_list[$i]['use_dept']=$use_dept;
			$end_date=$dev_verify->where('dev_id='.$dev_id)->getField('end_date');
			$ver_list[$i]['end_date']=$end_date;
		}
		$this->assign('ver_list',$ver_list);
		$this->assign('dev_count',count($ver_list));
		$this->display();
	}
	
	/*
	 * 查看证书详情页面
	 */
	public function show_license(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "检定证书详情_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取详情
		$ver_id=$_GET['ver_id'];
		$verify=M('Verify');
		$dev_id=$verify->where('id='.$ver_id)->getField('dev_id');#设备id
		$dev_base=M('DevBase');
		$base_info=$dev_base->where('id='.$dev_id)->field('dev_no,dev_name,dev_sn')->find();
		$this->assign('dev_no',$base_info['dev_no']);
		$this->assign('dev_name',$base_info['dev_name']);
		$this->assign('dev_sn',$base_info['dev_sn']);
		$dev_verify=M('DevVerify');
		$end_date=$dev_verify->where('dev_id='.$dev_id)->getField('end_date');
		$this->assign('end_date',$end_date);
		$dev_tech=M('DevTech');
		$spec=$dev_tech->where('dev_id='.$dev_id)->getField('spec');
		$this->assign('spec',$spec);
		//获取证书
		$verify_photos=M('VerifyPhotos');
		import('ORG.Util.Page');// 导入分页类
		$count=$verify_photos->where('verify_id='.$ver_id)->count();
		$Page   = new Page($count,1);
		$show    = $Page->show();// 分页显示输出
		$list=$verify_photos->where('verify_id='.$ver_id)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		
		$this->assign('ver_id',$ver_id);
		$this->assign('dev_id',$dev_id);
		$this->display();
	}
	/*
	 * 下载证书
	 */
	public function down_photo(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$id=$_GET['id'];
		$verify_photos=M('VerifyPhotos');
		$photo_list=$verify_photos->where('verify_id='.$id)->field('photo_url')->select();
		$img_list=array();
		foreach ($photo_list as $v){
			array_push($img_list,$v['photo_url']) ;
		}
		
		$filename = "./down/" . time(). ".zip"; // 最终生成的文件名（含路径）
		//生成zip文件
		 $zip=new ZipArchive();// 使用本类，linux需开启zlib，windows需取消php_zip.dll前的注释
		 if($zip->open ( $filename, ZIPARCHIVE::CREATE ) !== TRUE){
		 	exit ( '无法打开文件，或者文件创建失败' );
		 }
		 foreach ( $img_list as $val ) {
		 	$zip->addFile ( $val, basename ( $val ) ); // 第二个参数是放在压缩包中的文件名称，如果文件可能会有重复，就需要注意一下
		 }
		 $zip->close (); // 关闭
		 //下面是输出下载;
		 header ( "Cache-Control: max-age=0" );
		 header ( "Content-Description: File Transfer" );
		 header ( 'Content-disposition: attachment; filename=' . basename ( $filename ) ); // 文件名
		 header ( "Content-Type: application/zip" ); // zip格式的
		 header ( "Content-Transfer-Encoding: binary" ); // 告诉浏览器，这是二进制文件
		 header ( 'Content-Length: ' . filesize ( $filename ) ); // 告诉浏览器，文件大小
		 @readfile ( $filename );//输出文件;
		 unlink($filename);//在服务器上删除生成的压缩文件
	}

	/*
	 * 送检历史统计页面
	 */
	public function sub_history(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "送检历史统计_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取本年送检列表
		$year=date('Y',time());
		$this->assign('this_year',$year);
		$history_list=$common->get_sub_log($year);
		$this->assign('history_list',$history_list);
		//获取已有年份集合
		$sub_log=M('SubLog');
		$year_list=array();
		$date_list=$sub_log->field('date')->order('date DESC')->select();
		foreach ($date_list as $v){
			$old_year=date('Y',strtotime($v['date']));
			array_push($year_list, $old_year);
		}
		$year_list=array_unique($year_list);#去重
		$year_list=array_values($year_list);#序列化
		$this->assign('year_list',$year_list);
		$this->display();
	}
	
	/*
	 * 根据年份ajax查询送检历史
	 */
	public function ajax_find_log(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		$common = A ( 'Common' );
		$common->check_is_online ();
		$year=$_POST['year'];
		$history_list=$common->get_sub_log($year);
		$data="";
		foreach ($history_list as $k=>$v){
			$data.="<tr><td>".($k+1)."</td>";
			$data.="<td>".$v['etc']."</td>";
			$data.="<td>".$v['date']."</td>";
			$data.="<td>".$v['dev_sum']."</td>";
			$data.="<td><div class='visible-md visible-lg'>
						<a href='".__APP__."/".$v['html_url']."' class='btn btn-transparent btn-xs tooltips' tooltip-placement='top' tooltip='Remove'><i class='fa fa-eye fa fa-white'></i></a>
						</div>
						</td>";
		}
		echo $data;
	}

	/*
	 * 送检评价表页面
	 */
	public function sub_rate(){
		$common = A ( 'Common' );
		$common->check_is_online ();
		$web_title = "送检情况评价_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		//获取本年度送检列表
		if(isset($_GET['history'])&&$_GET['history']>0){
			$year=$_GET['history'];
		}else{
			$year=date('Y',time());
		}
		$this->assign('this_year',$year);
		$rate_list=$common->get_sub_rate($year);
		$this->assign('rate_list',$rate_list);
		//获取已有年份集合
		$verify=M('Verify');
		$year_list=array();
		$date_list=$verify->field('date')->order('date DESC')->select();
		foreach ($date_list as $v){
			$old_year=date('Y',strtotime($v['date']));
			 array_push($year_list, $old_year);
		}
		$year_list=array_unique($year_list);#去重
		$year_list=array_values($year_list);#序列化
		$this->assign('year_list',$year_list);
		$this->display();
	}

	/*
	 * 保存送检评价及打印
	 */
	public function do_sub_rate(){
		if(!IS_POST){
			redirect(U('Public/notfind'));
		}
		$common = A ( 'Common' );
		$common->check_is_online ();
		//接收参数
		$id_list=$_POST['id'];
		$dev_id_list=$_POST['dev_id'];
		$plan_date_list=$_POST['plan_date'];
		$true_date_list=$_POST['true_date'];
		$rate_list=$_POST['rate'];
		$note_list=$_POST['note'];
		$verify=M('Verify');
		$dev_base=M('DevBase');
		$dev_tech=M('DevTech');
		$ver_list=array();
		for($i=0;$i<count($id_list);$i++){
			$data_update['id']=$id_list[$i];
			$data_update['plan_date']=htmlspecialchars($plan_date_list[$i]);
			$data_update['true_date']=htmlspecialchars($true_date_list[$i]);
			$data_update['rate']=$rate_list[$i];
			$data_update['note']=htmlspecialchars($note_list[$i]);
			$verify->save($data_update);	
			$dev_list=$dev_base->where('id='.$dev_id_list[$i])->field('dev_no,dev_name')->find();
			$dev_list['plan_date']=htmlspecialchars($plan_date_list[$i]);
			$dev_list['true_date']=htmlspecialchars($true_date_list[$i]);
			switch ($rate_list[$i]){
				case 1:
					$dev_list['_rate']="✓";
					break;
				case 2:
					$dev_list['_rate']="〇";
					break;
				case 3:
					$dev_list['_rate']="✕";
					break;
			}
			$dev_list['note']=htmlspecialchars($note_list[$i]);
			$spec=$dev_tech->where('dev_id='.$dev_id_list[$i])->getField('spec');
			$dev_list['spec']=$spec;
			array_push($ver_list, $dev_list);
		}
		$this->assign('ver_list',$ver_list);
		//生成打印序列号
		$print_no=date('YmdHis',time()).rand(100,999);
		$this->assign('print_no',$print_no);
		$this->assign('today',date('Y-m-d',time()));
		$web_title = "打印评价表_计量管理_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		$this->display();
	}
}




