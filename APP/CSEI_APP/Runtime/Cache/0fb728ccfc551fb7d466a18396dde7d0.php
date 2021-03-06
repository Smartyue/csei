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
							<li >
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
									<h1 class="mainTitle">设备购置信息</h1>
									<span class="mainDescription">在下方输入框中编辑</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>编辑</span>
									</li>
									<li class="active">
										<span>设备信息</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->

						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white" style="margin-bottom: 150px;">
						<form action="__APP__/Device/buy_update" method="POST">
						<?php if($buy_info->id > 0): ?><input type="hidden" name="id" value="<?php echo ($buy_info->id); ?>" /><?php endif; ?>
						<input type="hidden" name="dev_id" value="<?php echo ($dev_id); ?>" />
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped table-bordered table-hover table-full-width " id="sample_1">
										<thead>
											<tr>
												<th>填写名类</th>
												<th>填写内容</th>
												<th>填写名类</th>
												<th>填写内容</th>
												<th>填写名类</th>
												<th>填写内容</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>采购申请编号:</td>
												<td>
														<div class="form-group" style="padding-top: 14px;">
															<input type="text" name="apply_no" class="form-control" placeholder="" value="<?php echo ($buy_info->apply_no); ?>">
														</div>
												</td>
												<td>采购项目编号:</td>
												<td>
														<div class="form-group" style="padding-top: 14px;">
															<input type="text" name="project_no" class="form-control" placeholder="" value="<?php echo ($buy_info->project_no); ?>">
														</div>
												</td>
												<td>增加方式: </td>
												<td>
														<div class="form-group" style="margin-bottom: 0px;">
															<select name="add_method" class="cs-select cs-skin-slide">
																<?php if($buy_info->add_method == 1): ?><option value="1" selected="selected">购置</option>
																<?php else: ?>
																<option value="1">购置</option><?php endif; ?>
																<?php if($buy_info->add_method == 2): ?><option value="2" selected="selected">赠送</option>
																<?php else: ?>
																<option value="2">赠送</option><?php endif; ?>
																<?php if($buy_info->add_method == 3): ?><option value="3" selected="selected">无偿调入</option>
																<?php else: ?>
																<option value="3">无偿调入</option><?php endif; ?>
																<?php if($buy_info->add_method == 4): ?><option value="4" selected="selected">有偿调入</option>
																<?php else: ?>
																<option value="4">有偿调入</option><?php endif; ?>
																<?php if($buy_info->add_method == 5): ?><option value="5" selected="selected">其他</option>
																<?php else: ?>
																<option value="5">其他</option><?php endif; ?>
															</select>
														</div>
												</td>
											</tr>

											<tr>
												<td>预算: </td>
												<td>
														<div class="form-group" style="padding-top: 14px;">
															<input type="text" name="budget" class="form-control" placeholder="" value="<?php echo ($buy_info->budget); ?>">
														</div>
												</td>
												<td>列支说明: </td>
												<td>
														<div class="form-group" style="padding-top: 14px;">
															<input type="text" name="charge" class="form-control" placeholder="" value="<?php echo ($buy_info->charge); ?>">
														</div>
												</td>
												<td>组织方式:</td>
												<td>
														<div class="form-group" style="margin-bottom: 0px;">
															<select name="group_method" class="cs-select cs-skin-slide">
																<?php if($buy_info->group_method == 1): ?><option value="1" selected="selected">分散采购</option>
																<?php else: ?>
																<option value="1">分散采购</option><?php endif; ?>
																<?php if($buy_info->group_method == 2): ?><option value="2" selected="selected">集中采购</option>
																<?php else: ?>
																<option value="2">集中采购</option><?php endif; ?>
																<?php if($buy_info->group_method == 3): ?><option value="3" selected="selected">部门集中</option>
																<?php else: ?>
																<option value="3">部门集中</option><?php endif; ?>
																<?php if($buy_info->group_method == 4): ?><option value="4" selected="selected">院自主采购</option>
																<?php else: ?>
																<option value="4">院自主采购</option><?php endif; ?>
															</select>
														</div>
												</td>
											</tr>
											<tr>
												<td>采购方式:</td>
												<td>
														<div class="form-group" style="margin-bottom: 0px;">
															<select name="buy_method" class="cs-select cs-skin-slide">
																<?php if($buy_info->buy_method == 1): ?><option value="1" selected="selected">公开招标</option>
																<?php else: ?>
																<option value="1">公开招标</option><?php endif; ?>
																<?php if($buy_info->buy_method == 2): ?><option value="2" selected="selected">邀请招标</option>
																<?php else: ?>
																<option value="2">邀请招标</option><?php endif; ?>
																<?php if($buy_info->buy_method == 3): ?><option value="3" selected="selected">竞争性谈判</option>
																<?php else: ?>
																<option value="3">竞争性谈判</option><?php endif; ?>
																<?php if($buy_info->buy_method == 4): ?><option value="4" selected="selected">零星采购</option>
																<?php else: ?>
																<option value="4">零星采购</option><?php endif; ?>
																<?php if($buy_info->buy_method == 5): ?><option value="5" selected="selected">询价采购</option>
																<?php else: ?>
																<option value="5">询价采购</option><?php endif; ?>
																<?php if($buy_info->buy_method == 6): ?><option value="6" selected="selected">单一来源</option>
																<?php else: ?>
																<option value="6">单一来源</option><?php endif; ?>
																<?php if($buy_info->buy_method == 7): ?><option value="7" selected="selected">协商供货</option>
																<?php else: ?>
																<option value="7">协商供货</option><?php endif; ?>
																<?php if($buy_info->buy_method == 8): ?><option value="8" selected="selected">批量集中</option>
																<?php else: ?>
																<option value="8">批量集中</option><?php endif; ?>
																<?php if($buy_info->buy_method == 9): ?><option value="9" selected="selected">网上竞价</option>
																<?php else: ?>
																<option value="9">网上竞价</option><?php endif; ?>
																<?php if($buy_info->buy_method == 10): ?><option value="10" selected="selected">网上竞价</option>
																<?php else: ?>
																<option value="10">网上竞价</option><?php endif; ?>
															</select>
														</div>
												</td>
												<td>合同编号:</td>
												<td>
														<div class="form-group" style="padding-top: 14px;">
															<input type="text" name="agreement_no" class="form-control" placeholder="" value="<?php echo ($buy_info->agreement_no); ?>">
														</div>
												</td>
												<td></td>
												<td>
												</td>
											</tr>
											<tr>
												<td>合同日期: </td>
												<td>
													
														<p class="input-group input-append datepicker date" style="width: 200px; padding-left: 0px;padding-top: 14px;"   >
															<input type="text" class="form-control"   placeholder="选择合同日期"  name="agreement_date"  value="<?php echo ($buy_info->agreement_date); ?>" />
															<span class="input-group-btn">
															<button type="button" class="btn btn-default" onclick="return false;">
																<i class="glyphicon glyphicon-calendar"></i>
															</button> </span>
														</p>
												</td>
												<td>到货日期: </td>
												<td>
														<p class="input-group input-append datepicker date" style="width: 200px; padding-left: 0px;padding-top: 14px;">
															<input type="text" class="form-control" placeholder="选择到货日期"  name="arrive_date" value="<?php echo ($buy_info->arrive_date); ?>"/>
															<span class="input-group-btn">
															<button type="button" class="btn btn-default" onclick="return false;">
																<i class="glyphicon glyphicon-calendar"></i>
															</button> </span>
														</p>
												</td>
												<td>经办人: </td>
												<td>
														<div class="form-group" style="padding-top: 14px;">
															<input type="text" name="passer" class="form-control" placeholder="" value="<?php echo ($buy_info->passer); ?>">
														</div>
												</td>
											</tr>
											<tr>
												<td>购置部门:</td>
												<td>
														<div class="form-group" style="padding-top: 14px;">
															<input type="text" name="buy_dept" class="form-control" placeholder="" value="<?php echo ($buy_info->buy_dept); ?>">
														</div>
												</td>
												<td>购置时新旧情况: </td>
												<td>
															<div class="form-group" style="margin-bottom: 0px;">
																<select name="is_new" class="cs-select cs-skin-slide">
																<?php if($buy_info->is_new == 1): ?><option value="1" selected="selected">新</option>
																<?php else: ?>
																<option value="1">新</option><?php endif; ?>
																<?php if($buy_info->is_new == 2): ?><option value="2" selected="selected">旧</option>
																<?php else: ?>
																<option value="2">旧</option><?php endif; ?>
																</select>
															</div>
												</td>
												<td>科免属性: </td>
												<td>
															<div class="form-group" style="margin-bottom: 0px;">
																<select name="kemian" class="cs-select cs-skin-slide">
																<?php if($buy_info->kemian == 1): ?><option value="1" selected="selected">是</option>
																<?php else: ?>
																<option value="1">是</option><?php endif; ?>
																<?php if($buy_info->kemian == 2): ?><option value="2" selected="selected">否</option>
																<?php else: ?>
																<option value="2">否</option><?php endif; ?>
																</select>
															</div>
												</td>
											</tr>
									</table>
								</div>
								<div class="row">
									<div class="col-sm-12 invoice-block" style="margin-top: 25px;">
										<button class="btn btn-lg btn-primary btn-o hidden-print" name="submit_method" value="1">
											保存信息 <i class="fa fa-save"></i>
										</button>
										<button class="btn btn-lg btn-primary btn-o hidden-print" onclick="window.history.go(-1);" >
											取消 <i class="fa fa-times"></i>
										</button>
										<button class="btn btn-lg btn-primary btn-o hidden-print" name="submit_method" value="2">
											保存并进入下一信息单元 <i class="fa fa-angle-right"></i>
										</button>
									</div>
								</div>
							</div>
							</form>
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>