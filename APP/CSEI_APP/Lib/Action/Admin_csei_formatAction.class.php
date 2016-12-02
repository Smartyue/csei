<?php
//后台管理模块控制器
class Admin_csei_formatAction extends Action{
	
	/*
	 *
	 * 空操作
	 */
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
	/*
	 * 后台首页(用户管理)
	 */
	public function index(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "用户管理_后台";
		$this->assign ( 'web_title', $web_title );
		//获取用户列表
		$user=M('User');
		$user_list=$user->field('id,username,nickname,email')->select();
		$this->assign('user_list',$user_list);
		$this->display();
	}
	/*
	 * 后台登录页面
	 */
	public function login(){
		if(isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/index'));
		}
		$common = A ( 'Common' );
		$token = $common->make_form_token ();
		$this->assign ( '_token', $token );
		$this->assign('web_title',"后台登录");
		$this->display();
	}
	/*
	 * 登录方法
	 */
	public function do_login(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		$token = $_POST ['_token'];
		$common = A ( 'Common' );
		$check_token = $common->check_form_token ( $token );
		if (! $check_token) {
			redirect ( U ( 'Common/notfind' ) );
		}
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$admin=M('Admin');
		$data ['username'] = $username;
		$data ['password'] = md5 ( $password );
		$check=$admin->where($data)->getField('id');
		if($check>0){
			$_SESSION['csei_admin']=$check;
			$this->success("登录成功！",U('Admin_csei_format/index'));
		}else{
			$this->error("登录失败!");
		}
	}
	/*
	 * 退出登录
	 */
	public function logout(){
		if (! $_SESSION ['csei_admin']) {
			redirect ( U ( 'Common/notfind' ) );
		}
		$_SESSION ['csei_admin'] = NULL;
		$this->success ( "退出成功!<br>正在跳转至前台首页", U ( 'Index/index' ) );
	}
	/*
	 * 添加用户页面
	 */
	public function add_user(){
	    if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "添加用户_用户管理_后台";
		$this->assign ( 'web_title', $web_title );
		$this->display();
	}
	/*
	 * 添加用户方法
	 */
	public function insert_user(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		//接收参数
		$data['username']=$_POST['username'];
		$data['nickname']=$_POST['nickname'];
		$data['password']=md5($_POST['password']);
		$data['logo']='./Public/upload/logo/default.png';#默认头像
		$data['email']=$_POST['email'];
		$data['status']=1;
		$user=M('User');
		$result=$user->add($data);
		if($result){
			$this->success("添加成功！",U('Admin_csei_format/index'));
		}else{
			$this->error("添加失败!登录账号或邮箱已被使用，请更换后再试！");
		}
	}
	/*
	 * 编辑用户页面
	 */
	public function edit_user(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$user_id=$_GET['uid'];
		$user=M('User');
		$user_info=$user->where('id='.$user_id)->find();
		if(!$user_info){
			redirect(U('Common/notfind'));
		}
		$web_title = "编辑用户_用户管理_后台";
		$this->assign ( 'web_title', $web_title );
		$user_info=json_decode(json_encode($user_info));
		$this->assign('user_info',$user_info);
		$this->display();
	}
	/*
	 * 修改用户信息方法
	 */
	public function update_user(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$user=M('User');
		//接收参数
		$data['id']=$_POST['id'];
		$data['nickname']=htmlspecialchars($_POST['nickname']);
		$data['username']=htmlspecialchars($_POST['username']);
		if(trim($_POST['password'])!=""){
			$data['password']=md5($_POST['password']);
		}
		$data['email']=$_POST['email'];
		$result=$user->save($data);
		if($result){
			$this->success("操作成功",U('Admin_csei_format/index'));
		}else{
			$this->error("保存失败！<br>用户名或邮箱已存在,请重试");
		}
		
	}
	/*
	 * 删除用户方法
	 */
	public function delete_user(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$user_id=$_GET['uid'];
		$user=M('User');
		$user_log=M('UserLog');
		$things=M('Things');
		$scan_bind=M('ScanBind');
		$scan_bind->where('user_id='.$user_id)->delete();
		$things->where('user_id='.$user_id)->delete();
		$user_log->where('user_id='.$user_id)->delete();
		$user->where('id='.$user_id)->delete();
		$this->success("操作完成");
	}
	/*
	 * 标签库管理页面
	 */
	public function label(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "标签管理_后台";
		$this->assign ( 'web_title', $web_title );
		//获取标签列表
		$labels=M('Labels');
		$label_list=$labels->field('id,label')->select();
		$this->assign('label_list',$label_list);
		$this->display();
	}
	/*
	 * 添加标签页面
	 */
	public function add_label(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "添加标签_后台";
		$this->assign ( 'web_title', $web_title );
		$this->display();
	}
	/*
	 * 添加标签方法
	 */
	public function insert_label(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		//接收参数
		$labels=M('Labels');
		$data['label']=htmlspecialchars($_POST['label']);
		$data['status']=0;
		$result=$labels->add($data);
		if($result){
			$this->success("添加成功");
		}else{
			$this->error("添加失败！该标签已存在");
		}
	}
	/*
	 * 编辑标签页面
	 */
	public function edit_label(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$lab_id=$_GET['lab_id'];
		$labels=M('Labels');
		$lab_info=$labels->where('id='.$lab_id)->find();
		if(!$lab_info){
			redirect(U('Common/notfind'));
		}
		$web_title = "编辑标签_标签管理_后台";
		$this->assign ( 'web_title', $web_title );
		$this->assign('lab_info',json_decode(json_encode($lab_info)));
		$this->display();
	}
	/*
	 * 修改标签方法
	 */
	public function update_label(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$labels=M('Labels');
		//接收参数
		$data['id']=$_POST['id'];
		$data['label']=htmlspecialchars($_POST['label']);
		
		$result=$labels->save($data);
		if($result){
			$this->success("操作成功",U('Admin_csei_format/label'));
		}else{
			$this->error("保存失败！<br>该标签已存在，请重试");
		}
	}
	/*
	 * 删除标签方法
	 */
	public function delete_label(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$lab_id=$_GET['lab_id'];
		$labels=M('Labels');
		$bind=M('Bind');
		$bind->where('lab_id='.$lab_id)->delete();
		$labels->where('id='.$lab_id)->delete();
		$this->success("操作成功");
	}

	/*
	 * 扫描仪管理页面
	 */
	public function scan(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "扫描仪管理_后台";
		$this->assign ( 'web_title', $web_title );
		//获取扫描仪列表
		$scan=M('Scan');
		$scan_list=$scan->select();
		$this->assign('scan_list',$scan_list);
		$this->display();
	}
	/*
	 * 添加扫描仪页面
	 */
	public function add_scan(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "添加扫描仪_后台";
		$this->assign ( 'web_title', $web_title );
		$this->display();
	}
	/*
	 * 添加扫描仪方法
	 */
	public function insert_scan(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		//接收参数
		$scan=M('Scan');
		$data['machine_id']=htmlspecialchars($_POST['machine_id']);
		$data['name']=htmlspecialchars($_POST['name']);
		$result=$scan->add($data);
		if($result){
			$this->success("添加成功");
		}else{
			$this->error("添加失败！该设备已存在");
		}
	}

	/*
	 * 编辑扫描仪页面
	 */
	public function edit_scan(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$scan_id=$_GET['scan_id'];
		$scan=M('Scan');
		$scan_info=$scan->where('id='.$scan_id)->find();
		if(!$scan_info){
			redirect(U('Common/notfind'));
		}
		$web_title = "编辑扫描仪_扫描仪管理_后台";
		$this->assign ( 'web_title', $web_title );
		$this->assign('scan_info',json_decode(json_encode($scan_info)));
		$this->display();
	}
	/*
	 * 修改扫描仪方法
	 */
	public function update_scan(){
	    if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$scan=M('Scan');
		//接收参数
		$data['id']=$_POST['id'];
		$data['machine_id']=htmlspecialchars($_POST['machine_id']);
		$data['name']=htmlspecialchars($_POST['name']);
		$result=$scan->save($data);
		if($result){
			$this->success("操作成功",U('Admin_csei_format/scan'));
		}else{
			$this->error("保存失败！<br>该扫描仪已存在，请重试");
		}
	}
	/*
	 * 删除扫描仪方法
	 */
	public function delete_scan(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$scan_id=$_GET['scan_id'];
		$scan=M('Scan');
		$scan_bind=M('ScanBind');
		$scan_bind->where('scan_id='.$scan_id)->delete();
		$scan->where('id='.$scan_id)->delete();
		$this->success("操作成功");
	}
	/*
	 * 送检单位管理
	 */
	public function dept(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "送检单位管理_后台";
		$this->assign ( 'web_title', $web_title );
		//获取送检单位列表
		$dept=M('Dept');
		$dept_list=$dept->select();
		$this->assign('dept_list',$dept_list);
		$this->display();
	}

	/*
	 * 添加送检单位页面
	 */
	public function add_dept(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$web_title = "添加送检单位_后台";
		$this->assign ( 'web_title', $web_title );
		$this->display();
	}
	/*
	 * 添加送检单位方法
	 */
	public function insert_dept(){
	if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		//接收参数
		$dept=M('Dept');
		$data['name']=htmlspecialchars($_POST['name']);
		$result=$dept->add($data);
		if($result){
			$this->success("添加成功");
		}else{
			$this->error("添加失败！");
		}
	}
	/*
	 * 编辑送检单位页面
	 */
	public function edit_dept(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$dept_id=$_GET['dept_id'];
		$dept=M('Dept');
		$dept_info=$dept->where('id='.$dept_id)->find();
		if(!$dept_info){
			redirect(U('Common/notfind'));
		}
		$web_title = "编辑送检单位_送检单位管理_后台";
		$this->assign ( 'web_title', $web_title );
		$this->assign('dept_info',json_decode(json_encode($dept_info)));
		$this->display();
	}

	/*
	 * 修改送检单位方法
	 */
	public function update_dept(){
		if(!IS_POST){
			redirect(U('Common/notfind'));
		}
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$dept=M('Dept');
		//接收参数
		$data['id']=$_POST['id'];
		$data['name']=htmlspecialchars($_POST['name']);
		$result=$dept->save($data);
		if($result){
			$this->success("操作成功",U('Admin_csei_format/dept'));
		}else{
			$this->error("保存失败！请重试");
		}
	}

	/*
	 * 删除送检单位
	 */
	public function delete_dept(){
		if(!isset($_SESSION['csei_admin'])){
			redirect(U('Admin_csei_format/login'));
		}
		$dept_id=$_GET['dept_id'];
		$dept=M('Dept');
		$result=$dept->where('id='.$dept_id)->delete();
		if($result){
			$this->success("删除成功");
		}else{
			$this->error("删除失败！该单位设备正在使用");
		}
	}
}