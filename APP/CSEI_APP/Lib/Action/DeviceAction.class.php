<?php
/*
 * 设备信息管理
 */
class DeviceAction extends Action{
	
	/*
	 *
	 * 空操作
	 */
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
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
		$this->assign('dev_count',count($dev_list));
		$this->display ();
	}
	//编辑设备详情页面
	public function info(){
		$common=A('Common');
		$common->check_is_online();
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		if(!isset($_GET['id'])){
			redirect(U('Common/notfind'));
		}
		$dev_id=$_GET['id'];//要查看的设备id
		//获取设备基本信息
		$base_info=$common->get_dev_baseinfo($dev_id);
		$base_info=json_encode($base_info);
		$base_info=json_decode($base_info);
		$this->assign('base_info',$base_info);
		//获取设备购置信息
		$buy_info=$common->get_dev_buyinfo($dev_id);
		$buy_info=json_decode(json_encode($buy_info));
		$this->assign('buy_info',$buy_info);
		//获取设备验收信息
		 $check_info=$common->get_dev_checkinfo($dev_id);
		 $check_info=json_decode(json_encode($check_info));
		 $this->assign('check_info',$check_info);
		 //获取设备管理信息
		 $manage_info=$common->get_dev_manageinfo($dev_id);
		 $manage_info=json_decode(json_encode($manage_info));
		 $this->assign('manage_info',$manage_info);
		 //获取设备技术参数
		 $tech_info=$common->get_dev_teahinfo($dev_id);
		 $tech_info=json_decode(json_encode($tech_info));
		 $this->assign('tech_info',$tech_info);
		 //获取设备费用信息
		 $cost_info=$common->get_dev_costinfo($dev_id);
		 $cost_info=json_decode(json_encode($cost_info));
		 $this->assign('cost_info',$cost_info);
		 //获取设备检定信息
		 $verify_info=$common->get_dev_verifyinfo($dev_id);
		 $verify_info=json_decode(json_encode($verify_info));
		 $this->assign('verify_info',$verify_info);
		 //获取设备供应商信息
		 $sup_info=$common->get_dev_supinfo($dev_id);
		 $sup_info=json_decode(json_encode($sup_info));
		 $this->assign('sup_info',$sup_info);
		 //获取设备名称
		 $this->assign('dev_name',$base_info->dev_name);
		 //获取设备绑定信息
		 $bind=M('Bind');
		 $bind_info=$bind->where('dev_id='.$dev_id)->find();
		 $this->assign('bind_date',$bind_info['bind_date']);#绑定日期
		 $lab_id=$bind_info['lab_id'];#电子标签id
		 $labels=M('Labels');
		 $label=$labels->where('id='.$lab_id)->getField('label');
		 $this->assign('label',$label);#电子标签
		 //**************************
		 $web_title = $base_info->dev_name."_设备详情_中国特种设备检测研究院";
		 $this->assign ( 'web_title', $web_title );
		 $this->assign('dev_id',$dev_id);
		 $this->display();
	}
	//查看设备详情页面
	public function show_info(){
		$common=A('Common');
		$common->check_is_online();
		// 获取用户信息
		$user_id = $_SESSION ['user'];
		$user = M ( 'User' );
		$userinfo = $user->find ( $user_id );
		$userinfo = json_encode ( $userinfo );
		$userinfo = json_decode ( $userinfo );
		$this->assign ( 'userinfo', $userinfo );
		if(!isset($_GET['id'])){
			redirect(U('Common/notfind'));
		}
		$dev_id=$_GET['id'];//要查看的设备id
		//获取设备基本信息
		$base_info=$common->get_dev_baseinfo($dev_id);
		$base_info=json_encode($base_info);
		$base_info=json_decode($base_info);
		$this->assign('base_info',$base_info);
		//获取设备购置信息
		$buy_info=$common->get_dev_buyinfo($dev_id);
		$buy_info=json_decode(json_encode($buy_info));
		$this->assign('buy_info',$buy_info);
		//获取设备验收信息
		$check_info=$common->get_dev_checkinfo($dev_id);
		$check_info=json_decode(json_encode($check_info));
		$this->assign('check_info',$check_info);
		//获取设备管理信息
		$manage_info=$common->get_dev_manageinfo($dev_id);
		$manage_info=json_decode(json_encode($manage_info));
		$this->assign('manage_info',$manage_info);
		//获取设备技术参数
		$tech_info=$common->get_dev_teahinfo($dev_id);
		$tech_info=json_decode(json_encode($tech_info));
		$this->assign('tech_info',$tech_info);
		//获取设备费用信息
		$cost_info=$common->get_dev_costinfo($dev_id);
		$cost_info=json_decode(json_encode($cost_info));
		$this->assign('cost_info',$cost_info);
		//获取设备检定信息
		$verify_info=$common->get_dev_verifyinfo($dev_id);
		$verify_info=json_decode(json_encode($verify_info));
		$this->assign('verify_info',$verify_info);
		//获取设备供应商信息
		$sup_info=$common->get_dev_supinfo($dev_id);
		$sup_info=json_decode(json_encode($sup_info));
		$this->assign('sup_info',$sup_info);
		//获取设备名称
		$this->assign('dev_name',$base_info->dev_name);
		//获取设备绑定信息
		$bind=M('Bind');
		$bind_info=$bind->where('dev_id='.$dev_id)->find();
		$this->assign('bind_date',$bind_info['bind_date']);#绑定日期
		$lab_id=$bind_info['lab_id'];#电子标签id
		$labels=M('Labels');
		$label=$labels->where('id='.$lab_id)->getField('label');
		$this->assign('label',$label);#电子标签
		//**************************
		$web_title = $base_info->dev_name."_设备详情_中国特种设备检测研究院";
		$this->assign ( 'web_title', $web_title );
		$this->assign('dev_id',$dev_id);
		$this->display();
	}
   //编辑设备基本信息页面
   public function base_edit(){
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "设备基本信息_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取信息
   	if(isset($_GET['dev_id'])&&$_GET['dev_id']>0){
   	$dev_id=$_GET['dev_id'];#设备id
   	$dev_base=M('DevBase');
   	$base_info=$dev_base->find($dev_id);
   	if($base_info){
   	$base_info=json_decode(json_encode($base_info));
   	$this->assign('base_info',$base_info);
   	}
   	}
   	//获取设备类型列表
   	$dev_type=M('DevType');
   	$type_list=$dev_type->select();
   	$this->assign('type_list',$type_list);
   	//获取应用属性列表
   	$app=M('AppProperty');
   	$app_list=$app->select();
   	$this->assign('app_list',$app_list);
   	$this->display();
   }
   //保存/添加设备基本信息方法
   public function base_update(){
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_base=M('DevBase');
   	//接收数据
   	$data['dev_no']=htmlspecialchars($_POST['dev_no']);
   	$data['dev_name']=htmlspecialchars($_POST['dev_name']);
   	$data['dev_typeid']=$_POST['dev_typeid'];
   	$data['dev_sn']=htmlspecialchars($_POST['dev_sn']);
   	$data['asset_name']=htmlspecialchars($_POST['asset_name']);
   	$data['asset_sn']=htmlspecialchars($_POST['asset_sn']);
   	$data['asset_property']=$_POST['asset_property'];
   	$data['asset_no']=htmlspecialchars($_POST['asset_no']);
   	$data['property_a']=$_POST['property_a'];
   	$data['property_b']=$_POST['property_b'];
   	$data['property_c']=$_POST['property_c'];
   	$data['app_property_id']=$_POST['app_property_id'];
   	$data['file_no']=htmlspecialchars($_POST['file_no']);
   	 //判断是否有设备id存在，不存在则新建
   	 if(isset($_POST['dev_id'])&&$_POST['dev_id']>0){
   	 	#执行修改
   	 	$data['id']=$_POST['dev_id'];
   	 	$result=$dev_base->save($data);
   	 	$id=$_POST['dev_id'];
   	 }else{
   	 	#执行添加操作
   	 	$result=$dev_base->add($data);
   	 	if($result){
   	 		$id=$result;
   	 	}else{
   	 		$this->error("新增设备基本信息失败，请稍后重试");
   	 	}
   	 }
   	 //判断提交类型
   	 if($_POST['submit_method']==1){#保存信息
   	 	$this->success("保存成功",U('Device/info',array('id'=>$id)));
   	 }else if($_POST['submit_method']==2){#保存并进入下一信息单元（编辑购置信息）
   	 	redirect(U('Device/buy_edit',array('dev_id'=>$id)));
   	 }
   }
   /*
    * 购置信息编辑页面
    */
   public function buy_edit(){
   	if(!isset($_GET['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "设备购置信息_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取购置信息
   	$dev_id=$_GET['dev_id'];
   	$dev_base=M('DevBase');
   	$check=$dev_base->find($dev_id);
   	if(!$check){
   		$this->error("该设备不存在！");
   		exit;
   	}
   	$dev_buy=M('DevBuy');
   	$buy_info=$dev_buy->where('dev_id='.$dev_id)->find();
   	$buy_info=json_decode(json_encode($buy_info));
   	$this->assign('buy_info',$buy_info);
   	$this->assign('dev_id',$dev_id);
   	$this->display();
   }
   /*
    * 购置信息更新方法
    */
   public function buy_update(){
   	if(!isset($_POST['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_buy=M('DevBuy');
   	//接收数据
   	$data['dev_id']=$_POST['dev_id'];
   	$data['apply_no']=htmlspecialchars($_POST['apply_no']);
   	$data['project_no']=htmlspecialchars($_POST['project_no']);
   	$data['add_method']=$_POST['add_method'];
   	$data['budget']=htmlspecialchars($_POST['budget']);
   	$data['charge']=htmlspecialchars($_POST['charge']);
   	$data['group_method']=$_POST['group_method'];
   	$data['buy_method']=$_POST['buy_method'];
   	$data['agreement_no']=htmlspecialchars($_POST['agreement_no']);
   	$data['agreement_date']=htmlspecialchars($_POST['agreement_date']);
   	$data['arrive_date']=htmlspecialchars($_POST['arrive_date']);
   	$data['passer']=htmlspecialchars($_POST['passer']);
   	$data['buy_dept']=htmlspecialchars($_POST['buy_dept']);
   	$data['is_new']=$_POST['is_new'];
   	$data['kemian']=$_POST['kemian'];
   	if(isset($_POST['id'])&&$_POST['id']>0){
   		$data['id']=$_POST['id'];
   		$id=$_POST['dev_id'];
   		$dev_buy->save($data);
   	}else{
   		$result=$dev_buy->add($data);
   		if($result){
   			$id=$_POST['dev_id'];
   		}else{
   			$this->error("购置信息保存失败!");
   		}
   	}
   	//判断提交类型
   	if($_POST['submit_method']==1){#保存信息
   		$this->success("保存成功",U('Device/info',array('id'=>$id)));
   	}else if($_POST['submit_method']==2){#保存并进入下一信息单元（编辑购置信息）
   		redirect(U('Device/check_edit',array('dev_id'=>$id)));
   	}
   }
   /*
    * 验收信息编辑页面
    */
   public function check_edit(){
   	if(!isset($_GET['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "设备验收信息_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取购置信息
   	$dev_id=$_GET['dev_id'];
   	$dev_base=M('DevBase');
   	$check=$dev_base->find($dev_id);
   	if(!$check){
   		$this->error("该设备不存在！");
   		exit;
   	}
   	$dev_check=M('DevCheck');
   	$check_info=$dev_check->where('dev_id='.$dev_id)->find();
   	$check_info=json_decode(json_encode($check_info));
   	$this->assign('check_info',$check_info);
   	$this->assign('dev_id',$dev_id);
   	$this->display();
   }
  
   /*
    * 验收信息更新方法
    */
   public function check_update(){
   	if(!isset($_POST['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_check=M('DevCheck');
   	//接收数据
   	$data['dev_id']=$_POST['dev_id'];
   	$data['checker']=htmlspecialchars($_POST['checker']);
   	$data['date']=htmlspecialchars($_POST['date']);
   	$data['result']=htmlspecialchars($_POST['result']);
   	$data['address']=htmlspecialchars($_POST['address']);
   	$data['others']=htmlspecialchars($_POST['others']);
   	$data['manage_status']=$_POST['manage_status'];
   	$data['borrow_status']=$_POST['borrow_status'];
   	$data['config_status']=$_POST['config_status'];
   	$data['status']=$_POST['status'];
   	$data['is_asset']=$_POST['is_asset'];
   	$data['is_free']=$_POST['is_free'];
   	if(isset($_POST['id'])&&$_POST['id']>0){
   		$data['id']=$_POST['id'];
   		$id=$_POST['dev_id'];
   		$dev_check->save($data);
   	}else{
   		$result=$dev_check->add($data);
   		if($result){
   			$id=$_POST['dev_id'];
   		}else{
   			$this->error("验收信息保存失败!");
   		}
   	}
   	//判断提交类型
   	if($_POST['submit_method']==1){#保存信息
   		$this->success("保存成功",U('Device/info',array('id'=>$id)));
   	}else if($_POST['submit_method']==2){#保存并进入下一信息单元（编辑购置信息）
   		redirect(U('Device/manage_edit',array('dev_id'=>$id)));
   	}
   }
   /*
    * 管理信息编辑
    */
   public function manage_edit(){
   	if(!isset($_GET['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "设备管理信息_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取购置信息
   	$dev_id=$_GET['dev_id'];
   	$dev_base=M('DevBase');
   	$check=$dev_base->find($dev_id);
   	if(!$check){
   		$this->error("该设备不存在！");
   		exit;
   	}
   	$dev_manage=M('DevManage');
   	$manage_info=$dev_manage->where('dev_id='.$dev_id)->find();
   	$manage_info=json_decode(json_encode($manage_info));
   	$this->assign('manage_info',$manage_info);
   	$this->assign('dev_id',$dev_id);
   	$this->display();
   }
 /*
  * 管理信息更新方法
  */
   public function manage_update(){
   	if(!isset($_POST['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_manage=M('DevManage');
   	//接收数据
   	$data['dev_id']=$_POST['dev_id'];
   	$data['use_dept']=htmlspecialchars($_POST['use_dept']);
   	$data['dept_admin']=htmlspecialchars($_POST['dept_admin']);
   	$data['dev_user']=htmlspecialchars($_POST['dev_user']);
   	$data['manage_dept']=htmlspecialchars($_POST['manage_dept']);
   	$data['yard_admin']=htmlspecialchars($_POST['yard_admin']);
   	$data['tech_admin']=htmlspecialchars($_POST['tech_admin']);
   	$data['use_percent']=htmlspecialchars($_POST['use_percent']);
   	$data['use_price']=htmlspecialchars($_POST['use_price']);
   	$data['note']=htmlspecialchars($_POST['note']);
   	$data['manage_name']=htmlspecialchars($_POST['manage_name']);
   	$data['finance_no']=htmlspecialchars($_POST['finance_no']);
   	$data['manage_reason']=htmlspecialchars($_POST['manage_reason']);
   	$data['manage_method_other']=htmlspecialchars($_POST['manage_method_other']);
   	$data['manage_method']=$_POST['manage_method'];

   	if(isset($_POST['id'])&&$_POST['id']>0){
   		$data['id']=$_POST['id'];
   		$id=$_POST['dev_id'];
   		$dev_manage->save($data);
   	}else{
   		$result=$dev_manage->add($data);
   		if($result){
   			$id=$_POST['dev_id'];
   		}else{
   			$this->error("管理信息保存失败!");
   		}
   	}
   	//判断提交类型
   	if($_POST['submit_method']==1){#保存信息
   		$this->success("保存成功",U('Device/info',array('id'=>$id)));
   	}else if($_POST['submit_method']==2){#保存并进入下一信息单元（编辑购置信息）
   		redirect(U('Device/tech_edit',array('dev_id'=>$id)));
   	}
   }
   /*
    * 设备技术参数信息编辑页面
    */
   public function tech_edit(){
   	if(!isset($_GET['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "设备技术参数_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取购置信息
   	$dev_id=$_GET['dev_id'];
   	$dev_base=M('DevBase');
   	$check=$dev_base->find($dev_id);
   	if(!$check){
   		$this->error("该设备不存在！");
   		exit;
   	}
   	$dev_tech=M('DevTech');
   	$tech_info=$dev_tech->where('dev_id='.$dev_id)->find();
   	$tech_info=json_decode(json_encode($tech_info));
   	$this->assign('tech_info',$tech_info);
   	$this->assign('dev_id',$dev_id);
   	$this->display();
   }
   /*
    * 设备技术参数更新方法
    */
   public function tech_update(){
   	if(!isset($_POST['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_tech=M('DevTech');
   	//接收数据
   	$data['dev_id']=$_POST['dev_id'];
   	$data['precise']=htmlspecialchars($_POST['precise']);
   	$data['dev_range']=htmlspecialchars($_POST['dev_range']);
   	$data['function']=htmlspecialchars($_POST['function']);
   	$data['tech_spec']=htmlspecialchars($_POST['tech_spec']);
   	$data['date']=htmlspecialchars($_POST['date']);
   	$data['years']=htmlspecialchars($_POST['years']);
   	$data['spec']=htmlspecialchars($_POST['spec']);
   	
   	if(isset($_POST['id'])&&$_POST['id']>0){
   		$data['id']=$_POST['id'];
   		$id=$_POST['dev_id'];
   		$dev_tech->save($data);
   	}else{
   		$result=$dev_tech->add($data);
   		if($result){
   			$id=$_POST['dev_id'];
   		}else{
   			$this->error("管理信息保存失败!");
   		}
   	}
   	//判断提交类型
   	if($_POST['submit_method']==1){#保存信息
   		$this->success("保存成功",U('Device/info',array('id'=>$id)));
   	}else if($_POST['submit_method']==2){#保存并进入下一信息单元（编辑购置信息）
   		redirect(U('Device/cost_edit',array('dev_id'=>$id)));
   	}
   }
   /*
    * 费用信息编辑页面
    */
   public function cost_edit(){
   	if(!isset($_GET['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "设备费用信息编辑_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取购置信息
   	$dev_id=$_GET['dev_id'];
   	$dev_base=M('DevBase');
   	$check=$dev_base->find($dev_id);
   	if(!$check){
   		$this->error("该设备不存在！");
   		exit;
   	}
   	$dev_cost=M('DevCost');
   	$cost_info=$dev_cost->where('dev_id='.$dev_id)->find();
   	$cost_info=json_decode(json_encode($cost_info));
   	$this->assign('cost_info',$cost_info);
   	$this->assign('dev_id',$dev_id);
   	$this->display();
   }
   /*
    * 费用信息更新方法
    */
   public function cost_update(){
   	if(!isset($_POST['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_cost=M('DevCost');
   	//接收数据
   	$data['dev_id']=$_POST['dev_id'];
   	$data['old_price']=htmlspecialchars($_POST['old_price']);
   	$data['other_price_one']=htmlspecialchars($_POST['other_price_one']);
   	$data['add_price']=htmlspecialchars($_POST['add_price']);
   	$data['other_price_two']=htmlspecialchars($_POST['other_price_two']);
   	$data['foreign_price']=htmlspecialchars($_POST['foreign_price']);
   	$data['other_price_three']=htmlspecialchars($_POST['other_price_three']);
   	$data['sum_price']=htmlspecialchars($_POST['sum_price']);
   	$data['act_price']=htmlspecialchars($_POST['act_price']);
   	
   	if(isset($_POST['id'])&&$_POST['id']>0){
   		$data['id']=$_POST['id'];
   		$id=$_POST['dev_id'];
   		$dev_cost->save($data);
   	}else{
   		$result=$dev_cost->add($data);
   		if($result){
   			$id=$_POST['dev_id'];
   		}else{
   			$this->error("费用信息保存失败!");
   		}
   	}
   	//判断提交类型
   	if($_POST['submit_method']==1){#保存信息
   		$this->success("保存成功",U('Device/info',array('id'=>$id)));
   	}else if($_POST['submit_method']==2){#保存并进入下一信息单元（编辑购置信息）
   		redirect(U('Device/verify_edit',array('dev_id'=>$id)));
   	}
   }
   /*
    * 检定信息编辑页面
    */
   public function verify_edit(){
   	if(!isset($_GET['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "设备检定信息编辑_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取购置信息
   	$dev_id=$_GET['dev_id'];
   	$dev_base=M('DevBase');
   	$check=$dev_base->find($dev_id);
   	if(!$check){
   		$this->error("该设备不存在！");
   		exit;
   	}
   	$dev_verify=M('DevVerify');
   	$verify_info=$dev_verify->where('dev_id='.$dev_id)->find();
   	$verify_info=json_decode(json_encode($verify_info));
   	$this->assign('verify_info',$verify_info);
   	$this->assign('dev_id',$dev_id);
   	$this->display();
   }
    /*
     * 检定信息更新方法
     */
   public function verify_update(){
   	if(!isset($_POST['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_verify=M('DevVerify');
   	//接收数据
   	$data['dev_id']=$_POST['dev_id'];
   	if($_POST['plan_date']!=""){
   	$data['plan_date']=htmlspecialchars($_POST['plan_date']);
   	}
   	$data['is_sum']=$_POST['is_sum'];
   	$data['status']=$_POST['status'];
   	if($_POST['date']!=""){
   	$data['date']=htmlspecialchars($_POST['date']);
   	}
   	$data['period']=htmlspecialchars($_POST['period']);
   	
   	if(isset($_POST['id'])&&$_POST['id']>0){
   		$data['id']=$_POST['id'];
   		$id=$_POST['dev_id'];
   		$dev_verify->save($data);
   	}else{
   		$result=$dev_verify->add($data);
   		if($result){
   			$id=$_POST['dev_id'];
   		}else{
   			$this->error("检定信息保存失败!");
   		}
   	}
   	//判断提交类型
   	if($_POST['submit_method']==1){#保存信息
   		$this->success("保存成功",U('Device/info',array('id'=>$id)));
   	}else if($_POST['submit_method']==2){#保存并进入下一信息单元（编辑购置信息）
   		redirect(U('Device/sup_edit',array('dev_id'=>$id)));
   	}
   }
   /*
    * 供应商信息编辑页面
    */
   public function sup_edit(){
   	if(!isset($_GET['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$web_title = "供应商信息编辑_中国特种设备检测研究院";
   	$this->assign ( 'web_title', $web_title );
   	// 获取用户信息
   	$user_id = $_SESSION ['user'];
   	$user = M ( 'User' );
   	$userinfo = $user->find ( $user_id );
   	$userinfo = json_encode ( $userinfo );
   	$userinfo = json_decode ( $userinfo );
   	$this->assign ( 'userinfo', $userinfo );
   	//获取购置信息
   	$dev_id=$_GET['dev_id'];
   	$dev_base=M('DevBase');
   	$check=$dev_base->find($dev_id);
   	if(!$check){
   		$this->error("该设备不存在！");
   		exit;
   	}
   	$dev_sup=M('DevSupplier');
   	$sup_info=$dev_sup->where('dev_id='.$dev_id)->find();
   	$sup_info=json_decode(json_encode($sup_info));
   	$this->assign('sup_info',$sup_info);
   	$this->assign('dev_id',$dev_id);
   	$this->display();
   }
   /*
    * 供应商信息更新方法
    */
   public function sup_update(){
   	if(!isset($_POST['dev_id'])){
   		redirect(U('Common/notfind'));
   	}
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_sup=M('DevSupplier');
   	//接收数据
   	$data['dev_id']=$_POST['dev_id'];
   	$data['sup_name']=htmlspecialchars($_POST['sup_name']);
   	$data['sup_tel']=htmlspecialchars($_POST['sup_tel']);
   	$data['sup_phone']=htmlspecialchars($_POST['sup_phone']);
   	$data['mfrs_name']=htmlspecialchars($_POST['mfrs_name']);
   	$data['mfrs_tel']=htmlspecialchars($_POST['mfrs_tel']);
   	$data['mfrs_phone']=htmlspecialchars($_POST['mfrs_phone']);
   	$data['act_name']=htmlspecialchars($_POST['act_name']);
   	$data['act_tel']=htmlspecialchars($_POST['act_tel']);
   	$data['act_phone']=htmlspecialchars($_POST['act_phone']);
   	$data['repair_name']=htmlspecialchars($_POST['repair_name']);
   	$data['repair_tel']=htmlspecialchars($_POST['repair_tel']);
   	$data['repair_phone']=htmlspecialchars($_POST['repair_phone']);
   	
   	if(isset($_POST['id'])&&$_POST['id']>0){
   		$data['id']=$_POST['id'];
   		$id=$_POST['dev_id'];
   		$result=$dev_sup->save($data);
   		if($result){
   			$this->success("保存成功",U('Device/info',array('id'=>$id)));
   		}else{
   			$this->error("保存失败!");
   		}
   	}else{
   		$result=$dev_sup->add($data);
   		if($result){
   			$id=$_POST['dev_id'];
   			$this->success("保存成功",U('Device/info',array('id'=>$id)));
   		}else{
   			$this->error("保存失败!");
   		}
   	}
   }
   /*
    * 批量删除设备信息
    */
   public function delete_dev_list(){
   	$common=A('Common');
   	$common->check_is_online();
   	$dev_list=$_GET['dev_list'];
    $dev_list=explode(',',$dev_list);
    $dev_buy=M('DevBuy');
    $dev_check=M('DevCheck');
    $dev_cost=M('DevCost');
    $dev_manage=M('DevManage');
    $dev_sup=M('DevSupplier');
    $dev_tech=M('DevTech');
    $dev_verify=M('DevVerify');
    $bind=M('Bind');
    $labels=M('Labels');
    $dev_base=M('DevBase');
    $sub_sheet=M('SubSheet');
    $verify=M('Verify');
    $verify_photos=M('VerifyPhotos');
    for($i=0;$i<count($dev_list);$i++){
    	$dev_id=$dev_list[$i];
    	//删除设备购置信息表
    	$dev_buy->where('dev_id='.$dev_id)->delete();
    	//删除设备验收信息表
    	$dev_check->where('dev_id='.$dev_id)->delete();
    	//删除设备费用信息表
    	$dev_cost->where('dev_id='.$dev_id)->delete();
    	//删除设备管理信息表
    	$dev_manage->where('dev_id='.$dev_id)->delete();
    	//删除设备供应商信息表
    	$dev_sup->where('dev_id='.$dev_id)->delete();
    	//删除设备技术参数表
    	$dev_tech->where('dev_id='.$dev_id)->delete();
    	//删除设备检定信息表
    	$dev_verify->where('dev_id='.$dev_id)->delete();
    	//删除设备绑定信息
    	$lab_id=$bind->where('dev_id='.$dev_id)->getField('lab_id');#获取电子标签id

    	$data['id']=$lab_id;
    	$data['status']=0;#将该设备所绑定的电子标签状态更改为未绑定
    	$labels->save($data);
    	$bind->where('dev_id='.$dev_id)->delete();
    	//删除sub_sheet表
    	$sub_sheet->where('dev_id='.$dev_id)->delete();
    	//删除verify  和  verify_photos表
    	$ver_id_list=$verify->where('dev_id='.$dev_id)->field('id')->select();
    	foreach ($ver_id_list as $v){
    		$ver_id=$v['id'];
    		$photo_url_list=$verify_photos->where('verify_id='.$ver_id)->field('photo_url')->select();
    		#删除verify_photos纪录
    		for($j=0;$j<count($photo_url_list);$j++){
    			$ph_url=$photo_url_list[$j]['photo_url'];
    			unlink($ph_url);#删除照片
    		}
    		$verify_photos->where('verify_id='.$ver_id)->delete();
    	  # 删除verify表纪录
    	  $verify->where('id='.$ver_id)->delete();
    	}
    	//删除设备基础信息表
    	$dev_base->where('id='.$dev_id)->delete();
    }
    $this->success("操作已完成");
   }
}