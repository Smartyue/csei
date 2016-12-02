<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<!-- start: HEAD -->
	<head>
		<title><?php echo ($web_title); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="__PUBLIC__/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="__PUBLIC__/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="__PUBLIC__/vendor/themify-icons/themify-icons.min.css">
		<link href="__PUBLIC__/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="__PUBLIC__/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="__PUBLIC__/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="__PUBLIC__/assets/css/styles.css">
		<link rel="stylesheet" href="__PUBLIC__/assets/css/plugins.css">
		<link rel="stylesheet" href="__PUBLIC__/assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="shortcut icon" href="__ROOT__/csei_favicon.ico" type="image/x-icon"/>
	</head>
	<body>
	<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="__PUBLIC__/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="__PUBLIC__/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="__PUBLIC__/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="__PUBLIC__/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="__PUBLIC__/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<div id="app">
			<!-- sidebar -->
			<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<nav>
						<!-- start: SEARCH FORM -->
						 
<div class="search-form">
	<a class="s-open" href="#"> <i class="ti-search"></i>
	</a>
	<form class="navbar-form" role="search">
		<a class="s-remove" href="#" target=".navbar-form"> <i
			class="ti-close"></i>
		</a>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search...">
			<button class="btn search-button" type="submit">
				<i class="ti-search"></i>
			</button>
		</div>
	</form>
</div>
						<!-- end: SEARCH FORM -->
						<!-- start: MAIN NAVIGATION MENU -->
					<div class="navbar-title">
							<span>主菜单 </span>
						</div>
						<ul class="main-navigation-menu">
	<li><a href="<?php echo U('Index/index');?>">
			<div class="item-content">
				<div class="item-media">
					<i class="ti-home"></i>
				</div>
				<div class="item-inner">
					<span class="title"> 主页 </span>
				</div>
			</div>
	</a></li>
	<li><a href="javascript:void(0)">
			<div class="item-content">
				<div class="item-media">
					<i class="ti-clip"></i>
				</div>
				<div class="item-inner">
					<span class="title"> 电子标签管理 </span><i class="icon-arrow"></i>
				</div>
			</div>
	</a>
		<ul class="sub-menu">
			<li><a href="<?php echo U('Label/index');?>"> <span class="title">
						电子标签绑定管理 </span>
			</a></li>
			<li><a href="<?php echo U('Label/bind_index');?>"> <span
					class="title"> 已绑定设备列表 </span>
			</a></li>
		</ul></li>
	<li><a href="javascript:void(0)">
			<div class="item-content">
				<div class="item-media">
					<i class="ti-view-list-alt"></i>
				</div>
				<div class="item-inner">
					<span class="title"> 设备管理 </span><i class="icon-arrow"></i>
				</div>
			</div>
	</a>
		<ul class="sub-menu">
			<li><a href="<?php echo U('Device/index');?>"> <span class="title">
						设备信息管理</span>
			</a></li>
		</ul></li>
	<li class="active open"><a href="javascript:void(0)">
			<div class="item-content">
				<div class="item-media">
					<i class="ti-shift-left-alt"></i>
				</div>
				<div class="item-inner">
					<span class="title"> 计量管理 </span><i class="icon-arrow"></i>
				</div>
			</div>
	</a>
		<ul class="sub-menu">
			<li><a href="<?php echo U('Meterage/index');?>"> <span class="title">设备查询送检</span>
			</a></li>
			<li><a href="<?php echo U('Meterage/sub_sheet');?>"><span class="title">送检清单</span>
					<?php if($sub_sheet_count > 0): ?><span class="badge badge-danger"> <?php echo ($sub_sheet_count); ?></span><?php endif; ?>
			</a></li>
			<li  class="active"><a href="<?php echo U('Meterage/verify');?>"> <span class="title">填写检定校准信息</span>
					<?php if($write_verify_count > 0): ?><span class="badge badge-danger"> <?php echo ($write_verify_count); ?></span><?php endif; ?>
			</a></li>
			<li><a href="<?php echo U('Meterage/verify_license');?>"> <span
					class="title">上传检定证书</span> <?php if($upload_verify_count > 0): ?><span class="badge badge-danger"><?php echo ($upload_verify_count); ?> </span><?php endif; ?>
			</a></li>
			<li><a href="<?php echo U('Meterage/done_license');?>"> <span
					class="title">已完成检定证书</span>
			</a></li>
			<li><a href="<?php echo U('Meterage/sub_history');?>"><span class="title">送检历史统计</span>
			</a></li>
		</ul></li>
</ul>
						<!-- end: MAIN NAVIGATION MENU -->
						<!-- start: CORE FEATURES -->
					
						<!-- end: DOCUMENTATION BUTTON -->
					</nav>
				</div>
			</div>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
								<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">
						<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="<?php echo U('Index/index');?>">
							<img src="__PUBLIC__/assets/images/logo.png" alt="Clip-Two" />
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<i class="ti-view-grid"></i>
						</a>
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-right">
							<!-- start: LANGUAGE SWITCHER -->
							<li class="dropdown">
								<a href class="dropdown-toggle " data-toggle="dropdown">
								<?php if($sum_count_all > 0): ?><span class="dot-badge partition-red"></span><?php endif; ?>
									<i class="ti-world "></i> 任务清单
								</a>
								<ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">
									<li>
										<a href="<?php echo U('Meterage/sub_sheet');?>" class="menu-toggler">
											送检清单
										</a>

									</li>
									<li>
										<a href="<?php echo U('Meterage/verify');?>" class="menu-toggler">
											待填写检定信息
										</a>
									</li>
									<li>
										<a href="<?php echo U('Meterage/verify_license');?>" class="menu-toggler">
											待上传检定证书
										</a>
									</li>
								</ul>
							</li>
							<!-- start: LANGUAGE SWITCHER -->
							<!-- start: USER OPTIONS DROPDOWN -->
							<li class="dropdown current-user">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									<img src="__ROOT__/<?php echo ($userinfo->logo); ?>" alt="<?php echo ($userinfo->nickname); ?>"> <span class="username"><?php echo ($userinfo->nickname); ?> <i class="ti-angle-down"></i></i></span>
								</a>
								<ul class="dropdown-menu dropdown-dark">

									<li>
										<a href="__APP__/Index/lock/action_url__SELF__">
											锁定账号
										</a>
									</li>
									<li>
										<a href="<?php echo U('Index/logout');?>">
											退出账号
										</a>
									</li>
								</ul>
							</li>
							<!-- end: USER OPTIONS DROPDOWN -->
						</ul>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<div class="arrow-left"></div>
							<div class="arrow-right"></div>
						</div>
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>
					<!-- end: NAVBAR COLLAPSE -->
				</header>
				<!-- end: TOP NAVBAR -->
				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">填写检定信息</h1>
									<span class="mainDescription">请您即使填写设备检定信息<small>完成的检定信息回进入检定证书上传环节</small></span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>检定信息</span>
									</li>
									<li class="active">
										<span>设备</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->

						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white" style="margin-bottom: 150px;">
							<div class="row">
							<form action="<?php echo U('Meterage/do_verify');?>" method="POST">
								<div class="col-md-12">
									<div class="invoice">
										<div class="row invoice-logo">
											<div class="col-sm-6">
												<img alt="" src="__PUBLIC__/assets/images/logodayin.png">
											</div>
											<div class="col-sm-6">
												<p class="text-dark">
													<?php echo ($today); ?> <small class="text-light"> 请确认检定日期及信息 </small>
													<input type="hidden" name="end_date" value="<?php echo ($today); ?>" />
												</p>
											</div>
										</div>
										<hr>
									</div>
								</div>
								<div class="col-md-12">
									<table class="table table-striped table-bordered table-hover table-full-width " id="sample_1">
										<thead>
											<tr>
												<th >序号</th>
												<th  id="diyilie">设备编号</th>
												<th>设备名称</th>
												<th>检定日期/检定校准编号</th>
												<th>检定结果/检定周期</th>
												<th>检定校准属性/检定校准形式</th>
												<th>检定单位/检定费用</th>
												<th>备注</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php if(is_array($ver_list)): foreach($ver_list as $key=>$vo): ?><tr>
												<td><?php echo ($key+1); ?></td>
												<td><?php echo ($vo["dev_no"]); ?></td>
												<td><?php echo ($vo["dev_name"]); ?></td>
												<td>
												<input type="hidden" name="id[]" value="<?php echo ($vo["id"]); ?>"/>
												<input type="hidden" name="dev_id[]" value="<?php echo ($vo["dev_id"]); ?>"/>
														<p class="input-group input-append datepicker date" style="padding-left: 0px;margin-bottom: 0px; padding-top: 14px; width: 160px;">
															<input type="text" class="form-control" placeholder="选择检定日期"  name="date[]" value="<?php echo ($vo["date"]); ?>"/>
															<span class="input-group-btn">
															<button type="button" class="btn btn-default">
																<i class="glyphicon glyphicon-calendar"></i>
															</button> </span>
														</p>
														<div class="form-group" style="width: 155px;">
															<input type="text" name="verify_no[]" class="form-control" placeholder="输入检定校准标号" >
														</div>
												</td>
												<td>
														<div class="form-group" style="margin-bottom: 0px;margin-top: 14px;">
															<select name="status[]" class="cs-select cs-skin-slide">
																<option value="0" disabled>选择检定结果</option>
																<option value="1">合格</option>
																<option value="5">不合格</option>
																<option value="3">校准测试</option>
																<option value="7">其他</option>
															</select>
														</div>
														<div class="form-group" style="padding-top: 4px;">
															<input type="text" name="period[]" class="form-control" placeholder="输入检定周期(月)"  value="12" required="required" >
														</div>
												</td>
												<td>
														<div class="form-group" style="margin-bottom: 0px;">
															<select name="verify_property[]" class="cs-select cs-skin-slide">
																<option value="0" disabled>选择检定校准属性</option>
																<option value="1">送检</option>
																<option value="2">自校</option>
															</select>
														</div>
														<div class="form-group" style="margin-bottom: 0px;margin-top: 4px;">
															<select name="verify_method[]" class="cs-select cs-skin-slide">
																<option value="0" disabled>选择检定校准形式</option>
																<option value="1">自校</option>
																<option value="2">检定</option>
																<option value="3">校准</option>
																<option value="4">测试</option>
															</select>
														</div>
												</td>
												<td>
														<div class="form-group" style="z-index: 5;margin-bottom: 0px;margin-top: 14px;width: 240px;">
															<select name="dept_id[]" class="cs-select cs-skin-slide">
																<option value="0" disabled>选择送检单位</option>
																<?php if(is_array($dept_list)): $i = 0; $__LIST__ = $dept_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dp): $mod = ($i % 2 );++$i; if($vo["dept_id"] == $dp['id']): ?><option value="<?php echo ($dp["id"]); ?>" selected="selected"><?php echo ($dp["name"]); ?></option>
																<?php else: ?>
																<option value="<?php echo ($dp["id"]); ?>"><?php echo ($dp["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
															</select>
														</div>
														<div class="form-group" style="padding-top: 4px;width: 240px;">
															<input type="text" name="verify_price[]" class="form-control" placeholder="输入检定费用(元)"  required="required" value="0">
														</div>
												</td>
												<td>
													<div class="form-group" style="padding-top: 4px;">
															<input type="text" name="note[]" class="form-control" placeholder="输入备注信息" >
														</div>
												</td>

												<td>
													<div class="visible-md visible-lg ">
														<a href="javascript:;" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove" onclick="delete_sheet(this,<?php echo ($vo["id"]); ?>);"><i class="fa fa-times fa fa-white"></i></a>
													</div>
												</td>
											</tr><?php endforeach; endif; ?>

										</tbody>
									</table>
								</div>

								
								<div class="col-sm-12 invoice-block" style="text-align: right; margin-top: 20px;">

									<br>
									<button  class="btn btn-lg btn-primary btn-o hidden-print">
										确认并保存 <i class="fa fa-check"></i>
									</button>
								</div>
                          </form>
							</div>
						</div>
						<!-- end: DYNAMIC TABLE -->

					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
		    <footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase">www.kryzl.com</span>. <span>All rights reserved 北京奎兹科技有限责任公司丨京ICP备15054267号</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->

			<!-- start: SETTINGS -->
			 			<div class="settings panel panel-default hidden-xs hidden-sm" id="settings">
				<button ct-toggle="toggle" data-toggle-class="active" data-toggle-target="#settings" class="btn btn-default">
					<i class="fa fa-spin fa-gear"></i>
				</button>
				<div class="panel-heading">
					交互样式
				</div>
				<div class="panel-body">
					<!-- start: 固定顶部导航 -->
					<div class="setting-box clearfix">
						<span class="setting-title pull-left"> 固定顶部导航</span>
						<span class="setting-switch pull-right">
							<input type="checkbox" class="js-switch" id="fixed-header" />
						</span>
					</div>
					<!-- end: 固定顶部导航 -->
					<!-- start: 固定侧导航 -->
					<div class="setting-box clearfix">
						<span class="setting-title pull-left">固定侧导航</span>
						<span class="setting-switch pull-right">
							<input type="checkbox" class="js-switch" id="fixed-sidebar" />
						</span>
					</div>
					<!-- end: 固定侧导航 -->
					<!-- start: 关闭侧导航 -->
					<div class="setting-box clearfix">
						<span class="setting-title pull-left">关闭侧导航</span>
						<span class="setting-switch pull-right">
							<input type="checkbox" class="js-switch" id="closed-sidebar" />
						</span>
					</div>
					<!-- end: 关闭侧导航 -->
					<!-- start: 固定底部 -->
					<div class="setting-box clearfix">
						<span class="setting-title pull-left">固定底部</span>
						<span class="setting-switch pull-right">
							<input type="checkbox" class="js-switch" id="fixed-footer" />
						</span>
					</div>
					<!-- end: 固定底部 -->
					<!-- start: THEME SWITCHER -->
					<div class="colors-row setting-box">
						<div class="color-theme theme-1">
							<div class="color-layout">
								<label>
									<input type="radio" name="setting-theme" value="theme-1">
									<span class="ti-check"></span>
									<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
									<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
								</label>
							</div>
						</div>
						<div class="color-theme theme-2">
							<div class="color-layout">
								<label>
									<input type="radio" name="setting-theme" value="theme-2">
									<span class="ti-check"></span>
									<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
									<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
								</label>
							</div>
						</div>
					</div>
					<div class="colors-row setting-box">
						<div class="color-theme theme-3">
							<div class="color-layout">
								<label>
									<input type="radio" name="setting-theme" value="theme-3">
									<span class="ti-check"></span>
									<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
									<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
								</label>
							</div>
						</div>
						<div class="color-theme theme-4">
							<div class="color-layout">
								<label>
									<input type="radio" name="setting-theme" value="theme-4">
									<span class="ti-check"></span>
									<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
									<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
								</label>
							</div>
						</div>
					</div>
					<div class="colors-row setting-box">
						<div class="color-theme theme-5">
							<div class="color-layout">
								<label>
									<input type="radio" name="setting-theme" value="theme-5">
									<span class="ti-check"></span>
									<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
									<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
								</label>
							</div>
						</div>
						<div class="color-theme theme-6">
							<div class="color-layout">
								<label>
									<input type="radio" name="setting-theme" value="theme-6">
									<span class="ti-check"></span>
									<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
									<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
								</label>
							</div>
						</div>
					</div>
					<!-- end: THEME SWITCHER -->
				</div>
			</div>
			<!-- end: SETTINGS -->
		</div>

		<!-- start: MAIN JAVASCRIPTS -->
<script src="__PUBLIC__/vendor/jquery/jquery.min.js"></script>
		<script src="__PUBLIC__/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="__PUBLIC__/vendor/modernizr/modernizr.js"></script>
		<script src="__PUBLIC__/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="__PUBLIC__/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="__PUBLIC__/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="__PUBLIC__/vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="__PUBLIC__/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="__PUBLIC__/vendor/autosize/autosize.min.js"></script>
		<script src="__PUBLIC__/vendor/selectFx/classie.js"></script>
		<script src="__PUBLIC__/vendor/selectFx/selectFx.js"></script>
		<script src="__PUBLIC__/vendor/select2/select2.min.js"></script>
		<script src="__PUBLIC__/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="__PUBLIC__/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="__PUBLIC__/vendor/select2/select2.min.js"></script>
		<script src="__PUBLIC__/vendor/DataTables/jquery.dataTables.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="__PUBLIC__/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="__PUBLIC__/assets/js/table-data.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="__PUBLIC__/assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
				FormElements.init();
			});
		</script>
		<script type="text/javascript">
		 window.onload = function(){
			 $("#diyilie").addClass("sorting_asc_disabled","sorting_desc_disabled");
	           }
        </script>
        <script>
		function delete_sheet(obj,id){
			if(confirm("确定要移除该设备？")){
				$.post('__APP__/Meterage/delete_verify',{'id':id},function(data){
					if(data.status==1){
						$(obj).parent().parent().parent().fadeOut(1000,function(){
							alert(data.msg);
							$(obj).parent().parent().parent().remove();
							location.reload();
						});
					}else{
						alert(data.msg);
					}
				});
			}
		}
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
		        <!-- 页面加载完毕后监听是否扫码 -->
        <script>
        var check_scanning;
        check_scanning=setInterval(check_is_scanning,1000);
        function check_is_scanning(){
        	$.post('__APP__/Label/scanning',{'test':1},function(data){
        		 if(data.status==1){
        			 clearInterval(check_scanning);
        			window.location.href="__APP__/Device/show_info/id/"+data.dev_id;
        		}
        	});
        }
        </script>
	</body>
</html>