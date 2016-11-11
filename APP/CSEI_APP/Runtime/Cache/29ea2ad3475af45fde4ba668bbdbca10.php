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
							<li>
								<a href="<?php echo U('Index/index');?>">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> 主页 </span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
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
									<li>
										<a href="xinbiaoqianguanli.html">
											<span class="title"> 电子标签绑定管理 </span>
										</a>
									</li>
									<li>
										<a href="yibangdingbiaoqianguanli.html">
											<span class="title"> 已绑定设备列表 </span>
										</a>
									</li>
								</ul>
							</li>
							<li class="active open">
								<a href="javascript:void(0)">
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
									<li>
										<a href="<?php echo U('Device/index');?>">
											<span class="title"> 设备信息管理</span>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)">
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
									<li>
										<a href="jilianggaunli.html">
											<span class="title">设备查询送检</span>
										</a>
									</li>
									<li>
										<a href="songjianqingdan.html">
											<span class="title">送检清单</span>
											<span class="badge badge-danger"> 18 </span>
										</a>
									</li>
									<li>
										<a href="tianxiejiandingxinxi.html">
											<span class="title">填写检定校准信息</span>
											<span class="badge badge-danger"> 3 </span>
										</a>
									</li>
									<li>
										<a href="shangchuanjiandingzhengshu.html">
											<span class="title">上传检定证书</span>
											<span class="badge badge-danger"> 3 </span>
										</a>
									</li>
									<li>
										<a href="yiwanchengjiandingzhengshu.html">
											<span class="title">已完成检定证书</span>
										</a>
									</li>
									<li>
										<a href="songjianlishitongji.html">
											<span class="title">送检历史统计</span>
										</a>
									</li>
								</ul>
							</li>
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
									<span class="dot-badge partition-red"></span><i class="ti-world "></i> 任务清单
								</a>
								<ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">
									<li>
										<a href="songjianqingdan.html" class="menu-toggler">
											送检清单
										</a>

									</li>
									<li>
										<a href="tianxiejiandingxinxi.html" class="menu-toggler">
											待填写检定信息
										</a>
									</li>
									<li>
										<a href="shangchuanjiandingzhengshu.html" class="menu-toggler">
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
										<a href="__APP__/Index/lock/action_url__ACTION__">
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
									<h1 class="mainTitle">设备使用管理</h1>
									<span class="mainDescription">您可查看设备信息状态并进行相关编辑操作<small></small></span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>设备状态</span>
									</li>
									<li class="active">
										<span>信息</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<div class="container-fluid container-fullw bg-white" style="padding-bottom: 10px;">
							<div class="row">
								<div class="col-md-12">
									<div class="row ">
										<div class="col-sm-3" style="width: 15%;">
											<div class="panel panel-white no-radius text-center">
												<div class="panel-body">
													<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
													<h3 style="margin-top: 10px;font-size: 20px;" class="links cl-effect-1 StepTitle"><a>扫描搜索</a></h2>
													<p class="text-small">
														手持终端扫描设备
													</p>
												</div>
											</div>
										</div>
										
										<div class="col-lg-7 col-md-7 col-sm-7" style="margin-top: -18px;width: 55%;">
											<fieldset>
												<legend>
													手动搜索
												</legend>
												<div class="row">
													<div class="col-md-8">
														<div class="form-group" style="margin-top: 4px;">
															<input type="text" name="firstName" class="form-control" placeholder="查询设备名称或编号">
														</div>
													</div>
													<div class="col-md-4">
														<div class="input-group input-daterange datepicker" style="padding-left: 0px; padding-right: 0px;">
														<input type="text" class="form-control" placeholder="开始时间"/>
														<span class="input-group-addon bg-primary">--</span>
														<input type="text" class="form-control" placeholder="结束时间"/>
													</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<select name="country" class="cs-select cs-skin-slide">
																<option value="" disabled selected>使用状态</option>
																<option value="AL">全部</option>
																<option value="AL">借出</option>
																<option value="AK">不可借</option>
																<option value="AZ">停用</option>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<select name="country" class="cs-select cs-skin-slide">
																<option value="" disabled selected>是否归还</option>
																<option value="AL">合格</option>
																<option value="AL">已归还</option>
																<option value="AK">未归还</option>
															</select>
														</div>
													</div>
													<div class="col-md-4" style="z-index: 2;">
														<div class="form-group">
															<select name="country" class="cs-select cs-skin-slide">
																<option value="" disabled selected>使用部门</option>
																<option value="AL">全部</option>
																<option value="AK">淄博</option>
																<option value="AZ">院内</option>
																<option value="AZ">游乐设施事业部B601</option>
																<option value="AZ">扬州</option>
																<option value="AZ">燕山</option>
																<option value="AZ">新疆</option>
																<option value="AZ">西安</option>
																<option value="AZ">武汉</option>
																<option value="AZ">危化品部B509</option>
																<option value="AZ">泰国</option>
																<option value="AZ">顺义</option>
																<option value="AZ">首钢氧气厂</option>
																<option value="AZ">实验室</option>
																<option value="AZ">石家庄</option>
																<option value="AZ">沈阳</option>
																<option value="AZ">射线数字实验室</option>
																<option value="AZ">上海</option>
																<option value="AZ">三川大厦</option>
															</select>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-sm-3" style="width: 15%;">
											<div class="panel panel-white no-radius text-center">
												<div class="panel-body">
													<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-search fa-stack-1x fa-inverse"></i> </span>
													<h3 style="margin-top: 10px;font-size: 20px;" class="links cl-effect-1 StepTitle"><a>确认搜索</a></h2>
													<p class="text-small">
														左侧编辑搜索条件
													</p>
												</div>
											</div>
										</div>
										<div class="col-sm-3" style="width: 15%;">
											<div class="panel panel-white no-radius text-center">
												<div class="panel-body">
													
													<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i></span>
													<h3 style="margin-top: 10px;font-size: 20px;" class="links cl-effect-1 StepTitle"><a href="songjianqingdan.html">新增设备</a></h2>
														
													<p class="text-small">
														点击新增设备
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- start: DATE/TIME Picker -->
						<div class="container-fluid container-fullw" style="padding-top: 12px;padding-bottom: 0px;">
							<div class="row ">
								<div class="col-md-3">
									<h5 class="over-title"><span class="text-bold">设备列表</span></h5>
									<p  >
										共3600条设备信息
									</p>
								</div>
								<div class="col-sm-2"  style="float: right; min-width: 90px; position: relative; width: 6%; margin-bottom: 20px; margin-top: 5px;margin-right: 20px;">
									<a href="#newFullEvent" class="btn btn-primary btn-o add-event" style="width: 80px;"><i class="fa fa-trash"></i> 删除</a>
								</div>
							</div>
						</div>
						<!-- end: DATE/TIME Picker -->

						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white" style="margin-bottom: 150px;">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped table-bordered table-hover table-full-width " id="sample_1">
										<thead>
											<tr>
												<th id="diyilie">
													<div class="checkbox clip-check check-primary ">
														<input type="checkbox" id="checkbox#" onclick="selectAll()" value="全选/全不选" />
														<label   for="checkbox#"></label>
													</div>
												</th>
												<th>#</th>
												<th>标签编号</th>
												<th>绑定日期</th>
												<th>设备编号</th>
												<th>设备名称</th>
												<th>规格型号</th>
												<th>出厂编号</th>
												<th>使用部门</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
										<?php if(is_array($dev_list)): foreach($dev_list as $key=>$vo): ?><tr>
												<td>
													<div class="checkbox clip-check check-primary ">
														<input type="checkbox" id="checkbox1" value="1">
														<label   for="checkbox1"></label>
													</div>
												</td>
												<td><?php echo ($vo["id"]); ?></td>
												<td><?php echo (($vo["lab_name"])?($vo["lab_name"]):"未绑定"); ?></td>
												<td><?php echo (($vo["bind_date"])?($vo["bind_date"]):"—"); ?></td>
												<td><?php echo (($vo["dev_no"])?($vo["dev_no"]):"—"); ?></td>
												<td><?php echo (($vo["dev_name"])?($vo["dev_name"]):"—"); ?></td>
												<td><?php echo (($vo["spec"])?($vo["spec"]):"—"); ?></td>
												<td><?php echo (($vo["dev_sn"])?($vo["dev_sn"]):"—"); ?></td>
												<td><?php echo (($vo["use_dept"])?($vo["use_dept"]):"—"); ?></td>
												<td>
													<a href="shebeixiangqing.html" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-eye fa fa-white"></i></a>
													<a href="#" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-pencil fa fa-white"></i></a>
														<a href="#" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
												</td>
											</tr><?php endforeach; endif; ?>
										</tbody>
									</table>
								</div>
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
		<script src="__PUBLIC__/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
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
            function selectAll(){
               var checkbox = document.getElementById('checkbox#');
               checkbox.value==1?checkbox.value=2 : checkbox.value=1;
               var checkboxs = document.getElementsByTagName('input');
               for(var i=0; i<checkboxs.length;i++){
               if(checkbox.value==1){
                   checkboxs[i].checked=false;//全不选
               }else{
                   checkboxs[i].checked=true;//全选
               }
             }}
        </script>
        <script type = "text/javascript">
           window.onload = function(){
            $("#diyilie").addClass("sorting_asc_disabled","sorting_desc_disabled");
           }
        </script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>