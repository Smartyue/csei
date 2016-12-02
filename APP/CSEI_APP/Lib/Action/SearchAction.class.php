<?php
//搜索控制器
class SearchAction extends  Action{
	
	/*
	 *
	 * 空操作
	 */
	public function _empty() {
		redirect ( U ( 'Common/notfind' ) );
	}
	//电子标签绑定管理页搜索
	public function search_label(){
		$common=A('Common');
		$common->check_is_online();
		//接收参数
		$search_name=$_POST['search_name'];
		$bind_date_start=$_POST['bind_date_start'];
		$bind_date_end=$_POST['bind_date_end'];
		$bind_status=$_POST['bind_status'];
		$use_dept=$_POST['use_dept'];
		$check_array=array();
		if($search_name!=""){
			$result_name=$common->search_by_name($search_name);
			array_push($check_array, $result_name);
		}
		if($bind_date_start!=""&&$bind_date_end!=""){
			$result_date=$common->search_by_bind_date($bind_date_start,$bind_date_end);
			array_push($check_array, $result_date);
		}
		if($bind_status){
			$result_status=$common->search_by_bind_status($bind_status);
			array_push($check_array, $result_status);
		}
		if($use_dept!=""){
			$result_dept=$common->search_by_use_dept($use_dept);
			array_push($check_array, $result_dept);
		}
		//****************逻辑判断开始********************
		$dev_id_list=array();
		$check_count=count($check_array);
		$data="";
		switch ($check_count){
			case 0:
			    break;
			case 1:
				$dev_id_list=$check_array[0];
				break;
			case 2:
				$dev_id_list=array_intersect($check_array[0],$check_array[1]);
				break;
			case 3:
				$dev_id_list=array_intersect($check_array[0],$check_array[1],$check_array[2]);
				break;
			case 4:
				$dev_id_list=array_intersect($check_array[0],$check_array[1],$check_array[2],$check_array[3]);
				break;
		}
		$dev_id_list=array_values($dev_id_list);
	   if($dev_id_list){
	   	        $bind=M('Bind');
	   	        $labels=M('Labels');
	   	        $dev_base=M('DevBase');
	   	        $dev_manage=M('DevManage');
	   	     foreach ($dev_id_list as $v){
	   	     	//获取该设备信息
	   	     	$bind_info=$bind->where('dev_id='.$v)->field('lab_id,bind_date')->find();
	   	     	$base_info=$dev_base->where('id='.$v)->field('dev_no,dev_name')->find();
	   	     	$dept=$dev_manage->where('dev_id='.$v)->getField('use_dept');
	   	     	$lab_info=$labels->where('id='.$bind_info['lab_id'])->field('label,status')->find();
	   	     	
	   	     	$data.="<tr><td><div class='checkbox clip-check check-primary '>";
	   	     	$data.="<input type='checkbox' id='checkbox".$v."'  value='".$v."' name='dev_id_list'>";
	   	     	$data.="<label   for='checkbox".$v."'></label></div></td>";
	   	     	$data.="<td>".$v."</td>";
	   	     	$data.="<td>".$lab_info['label']."</td>";
	   	     	$data.="<td>".$bind_info['bind_date']."</td>";
	   	     	$data.="<td>".$base_info['dev_no']."</td>";
	   	     	$data.="<td>".$base_info['dev_name']."</td>";
	   	     	$data.="<td>".$dept."</td>";
	   	     	$data.="<td><div class='btn-group'><a class='btn btn-primary btn-o dropdown-toggle' data-toggle='dropdown' href='#'><span class='caret'></span></a>";
	   	     	$data.="<ul role='menu' class='dropdown-menu dropdown-light pull-right'><li><a href='".__APP__."/Device/show_info/id/".$v."'>查看设备详情</a></li>";
	   	     	$data.=" <li>";
	   	     	if($bind_info['lab_id']>0){
	   	     		$data.="<a href='".__APP__."/Label/un_bind/dev_id/".$v."'>取消绑定关系</a>";
	   	     	}else{
	   	     		$data.="<a href='".__APP__."/Label/bind/dev_id/".$v."'>分配标签绑定</a>";
	   	     	}
	   	     	$data.="</li></ul></div></td></tr>";
	   	     }
	   	     echo $data;
	   }else{
	   	echo -1;
	   }
	}

	//设备管理页搜索
	public function search_device(){
		$common=A('Common');
		$common->check_is_online();
		//接收参数
		$search_name=$_POST['search_name'];
		$bind_date_start=$_POST['bind_date_start'];
		$bind_date_end=$_POST['bind_date_end'];
		$borrow_status=$_POST['borrow_status'];
		$use_dept=$_POST['use_dept'];
		$check_array=array();
		if($search_name!=""){
			$result_name=$common->search_by_name($search_name);
			array_push($check_array, $result_name);
		}
		if($bind_date_start!=""&&$bind_date_end!=""){
			$result_date=$common->search_by_verify_date($bind_date_start,$bind_date_end);
			array_push($check_array, $result_date);
		}
		if($borrow_status){
			$result_status=$common->search_by_borrow_status($borrow_status);
			array_push($check_array, $result_status);
		}
		if($use_dept!=""){
			$result_dept=$common->search_by_use_dept($use_dept);
			array_push($check_array, $result_dept);
		}
		//****************逻辑判断开始********************
		$dev_id_list=array();
		$check_count=count($check_array);
		$data="";
		switch ($check_count){
			case 0:
				break;
			case 1:
				$dev_id_list=$check_array[0];
				break;
			case 2:
				$dev_id_list=array_intersect($check_array[0],$check_array[1]);
				break;
			case 3:
				$dev_id_list=array_intersect($check_array[0],$check_array[1],$check_array[2]);
				break;
			case 4:
				$dev_id_list=array_intersect($check_array[0],$check_array[1],$check_array[2],$check_array[3]);
				break;
		}
		$dev_id_list=array_values($dev_id_list);
		if($dev_id_list){
			$bind=M('Bind');
			$labels=M('Labels');
			$dev_base=M('DevBase');
			$dev_manage=M('DevManage');
			$dev_tech=M('DevTech');
			foreach ($dev_id_list as $v){
				//获取该设备信息
				$bind_info=$bind->where('dev_id='.$v)->field('lab_id,bind_date')->find();
				$base_info=$dev_base->where('id='.$v)->field('dev_no,dev_name,dev_sn')->find();
				$dept=$dev_manage->where('dev_id='.$v)->getField('use_dept');
				$lab_info=$labels->where('id='.$bind_info['lab_id'])->field('label,status')->find();
				 $spec=$dev_tech->where('dev_id='.$v)->getField('spec');
				 
				$data.="<tr><td><div class='checkbox clip-check check-primary '>";
				$data.="<input type='checkbox' id='checkbox".$v."'  value='".$v."' name='dev_id_list'>";
				$data.="<label   for='checkbox".$v."'></label></div></td>";
				$data.="<td>".$v."</td>";
				$data.="<td>".$lab_info['label']."</td>";
				$data.="<td>".$bind_info['bind_date']."</td>";
				$data.="<td>".$base_info['dev_no']."</td>";
				$data.="<td>".$base_info['dev_name']."</td>";
				$data.="<td>".$spec."</td>";
				$data.="<td>".$base_info['dev_sn']."</td>";
				$data.="<td>".$dept."</td>";
				$data.="<td><a href='".__APP__."/Device/show_info/id/".$v."' class='btn btn-transparent btn-xs tooltips' tooltip-placement='top' tooltip='Remove'><i class='fa fa-eye fa fa-white'></i></a>";
			    $data.="<a href='".__APP__."/Device/info/id/".$v."' class='btn btn-transparent btn-xs tooltips' tooltip-placement='top' tooltip='Remove'><i class='fa fa-pencil fa fa-white'></i></a>";
			    $data.="<a href='javascript:;' class='btn btn-transparent btn-xs tooltips' tooltip-placement='top' tooltip='Remove' onclick='delete_dev(".$v.");'><i class='fa fa-times fa fa-white'></i></a>";
			    $data.="</td></tr>";
			}
			echo $data;
		}else{
			echo -1;
		}
	}
	//计量管理页搜索
	public function search_meterage(){
		$common=A('Common');
		$common->check_is_online();
		//接收参数
		$search_name=$_POST['search_name'];
		$bind_date_start=$_POST['bind_date_start'];
		$bind_date_end=$_POST['bind_date_end'];
		$verify_status=$_POST['verify_status'];
		$use_dept=$_POST['use_dept'];
		$check_array=array();
		if($search_name!=""){
			$result_name=$common->search_by_name($search_name);
			array_push($check_array, $result_name);
		}
		if($bind_date_start!=""&&$bind_date_end!=""){
			$result_date=$common->search_by_verify_date($bind_date_start,$bind_date_end);
			array_push($check_array, $result_date);
		}
		if($verify_status){
			$result_status=$common->search_by_verify_status($verify_status);
			array_push($check_array, $result_status);
		}
		if($use_dept!=""){
			$result_dept=$common->search_by_use_dept($use_dept);
			array_push($check_array, $result_dept);
		}
		//****************逻辑判断开始********************
		$dev_id_list=array();
		$check_count=count($check_array);
		$data="";
		switch ($check_count){
			case 0:
				break;
			case 1:
				$dev_id_list=$check_array[0];
				break;
			case 2:
				$dev_id_list=array_intersect($check_array[0],$check_array[1]);
				break;
			case 3:
				$dev_id_list=array_intersect($check_array[0],$check_array[1],$check_array[2]);
				break;
			case 4:
				$dev_id_list=array_intersect($check_array[0],$check_array[1],$check_array[2],$check_array[3]);
				break;
		}
		$dev_id_list=array_values($dev_id_list);
		if($dev_id_list){
			$dev_base=M('DevBase');
			$dev_manage=M('DevManage');
			$dev_verify=M('DevVerify');
			foreach ($dev_id_list as $v){
				//获取该设备信息
				$base_info=$dev_base->where('id='.$v)->field('dev_no,dev_name')->find();
				$dept=$dev_manage->where('dev_id='.$v)->getField('use_dept');
				$verify_info=$dev_verify->where('dev_id='.$v)->field('status,date,end_date,submitter')->find();
				$_status="";
				switch ($verify_info['status']){
					case 1:
						$_status="合格";
						break;
					case 2:
						$_status="维修中";
						break;
					case 3:
						$_status="待检";
						break;
					case 4:
						$_status="已送检";
						break;
					case 5:
						$_status="不合格";
						break;
					case 6:
						$_status="停用";
						break;
					case 7:
						$_status="其他";
						break;
					case 8:
						$_status="无";
						break;
					default:
						$_status=NULL;
				}
				$data.="<tr><td><div class='checkbox clip-check check-primary '>";
				$data.="<input type='checkbox' id='checkbox".$v."'  value='".$v."' name='dev_id_list'>";
				$data.="<label   for='checkbox".$v."'></label></div></td>";
				$data.="<td>".$v."</td>";
				$data.="<td>".$_status."</td>";
				$data.="<td>是</td>";
				$data.="<td>".$verify_info['date']."</td>";
				$data.="<td>".$verify_info['end_date']."</td>";
				$data.="<td>".$base_info['dev_no']."</td>";
				$data.="<td>".$base_info['dev_name']."</td>";
				$data.="<td>".$dept."</td>";
				$data.="<td>".$verify_info['submitter']."</td>";
				$data.="<td><div class='btn-group'><a class='btn btn-primary btn-o dropdown-toggle' data-toggle='dropdown' href='#'> <span class='caret'></span></a>";
				$data.="<ul role='menu' class='dropdown-menu dropdown-light pull-right'>";
				$data.="<li><a href='".__APP__."/Device/show_info/id/".$v."'> 查看设备详情 </a></li>";
				if($verify_info['status']){
					$data.="<li><a href='javascript:;' onclick='verify(".$v.",".$verify_info['status'].");'> 送检 </a></li>";
					$data.="<li><a href='javascript:;' onclick='send_verify(".$v.",".$verify_info['status'].");'> 填写检定报告 </a></li>";
				}else{
					$data.="<li><a href='javascript:;' onclick='verify(".$v.",0);'> 送检 </a></li>";
					$data.="<li><a href='javascript:;' onclick='send_verify(".$v.",0);'> 填写检定报告 </a></li>";
				}
				$data.="<li><a href='#'> 发送停用通知 </a></li>";
				$data.="<li><a href='#'> 打印不符合报告单 </a></li>";
				$data.="</ul></div></td></tr>";
			}
			echo $data;
		}else{
			echo -1;
		}
	}
}