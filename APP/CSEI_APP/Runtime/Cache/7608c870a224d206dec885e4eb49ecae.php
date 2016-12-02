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
										<a href="<?php echo U('Label/index');?>">
											<span class="title"> 电子标签绑定管理 </span>
										</a>
									</li>
									<li>
										<a href="<?php echo U('Label/bind_index');?>">
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
									<li class="active">
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
										<a href="<?php echo U('Meterage/index');?>">
											<span class="title">设备查询送检</span>
										</a>
									</li>
									<li>
										<a href="<?php echo U('Meterage/sub_sheet');?>">
											<span class="title">送检清单</span>
											<?php if($sub_sheet_count > 0): ?><span class="badge badge-danger"> <?php echo ($sub_sheet_count); ?></span><?php endif; ?>
										</a>
									</li>
									<li>
										<a href="<?php echo U('Meterage/verify');?>">
											<span class="title">填写检定校准信息</span>
											<?php if($write_verify_count > 0): ?><span class="badge badge-danger"> <?php echo ($write_verify_count); ?></span><?php endif; ?>
										</a>
									</li>
									<li>
										<a href="<?php echo U('Meterage/verify_license');?>">
											<span class="title">上传检定证书</span>
											<?php if($upload_verify_count > 0): ?><span class="badge badge-danger"><?php echo ($upload_verify_count); ?> </span><?php endif; ?>
										</a>
									</li>
									<li>
										<a href="<?php echo U('Meterage/done_license');?>">
											<span class="title">已完成检定证书</span>
										</a>
									</li>
									<li>
										<a href="<?php echo U('Meterage/sub_history');?>">
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
									<h1 class="mainTitle"><?php echo (($label)?($label):"未绑定"); ?></h1>
									<span class="mainDescription"><?php echo ($dev_name); ?></span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>电子标签</span>
									</li>
									<li class="active">
										<span>设备信息</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: INVOICE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="invoice">
										<div class="row invoice-logo">
											<div class="col-sm-6">
												<img alt="" src="__PUBLIC__/assets/images/logodayin.png">
											</div>
											<div class="col-sm-6">
											<?php if($label != null): ?><p class="text-dark" style="padding-bottom: 5px;padding-top: 5px; ">
													绑定日期 /<?php echo ($bind_date); ?> <small class="text-light">  </small>
												</p>
												<a class="btn btn-lg btn-primary btn-o hidden-print pull-right" href="__APP__/Label/un_bind/dev_id/<?php echo ($dev_id); ?>">
													取消标签绑定 <i class="fa fa-chain-broken"></i>
												</a>
											<?php else: ?>
											<p class="text-dark" style="padding-bottom: 5px;padding-top: 5px; ">
													未绑定 <small class="text-light">  </small>
												</p>
											<a class="btn btn-lg btn-primary btn-o hidden-print pull-right" href="__APP__/Label/bind/dev_id/<?php echo ($dev_id); ?>">
													绑定电子标签 <i class="fa fa-chain"></i>
												</a><?php endif; ?>
											</div>
										</div>
										<hr>
										<div class="row">
										<!-- 设备基本信息开始 -->
											<div class="col-sm-6 col-lg-3">
												<div class="panel panel-white">
													<div class="panel-heading">
														<div class="panel-title">
															基本信息
														</div>
													</div>
													<div class="panel-body">
														<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
															<li>
																<strong>设备编号:</strong> <?php echo (($base_info->dev_no)?($base_info->dev_no):"—"); ?>
															</li>
															<li>
																<strong>设备名称:</strong> <?php echo (($base_info->dev_name)?($base_info->dev_name):"—"); ?>
															</li>
															<li>
																<strong>设备类型:</strong> <?php echo (($base_info->dev_type)?($base_info->dev_type):"—"); ?>
															</li>
															<li>
																<strong>出厂编号:</strong> <?php echo (($base_info->dev_sn)?($base_info->dev_sn):"—"); ?>
															</li>
															<li>
																<strong>固定资产分类名称:</strong> <?php echo (($base_info->asset_name)?($base_info->asset_name):"—"); ?>
															</li>
															<li>
																<strong>固定资产分类编码:</strong> <?php echo (($base_info->asset_sn)?($base_info->asset_sn):"—"); ?>
															</li>
															<li>
																<strong>固定资产属性:</strong> <?php echo (($base_info->_asset_property)?($base_info->_asset_property):"—"); ?>
															</li>
															<li>
																<strong>固定资产编号:</strong> <?php echo (($base_info->asset_no)?($base_info->asset_no):"—"); ?>
															</li>
															<li>
																<strong>设备属性A:</strong> <?php echo (($base_info->_property_a)?($base_info->_property_a):"—"); ?>
															</li>
															<li>
																<strong>设备属性B:</strong> <?php echo (($base_info->_property_b)?($base_info->_property_b):"—"); ?>
															</li>
															<li>
																<strong>设备属性C:</strong> <?php echo (($base_info->_property_c)?($base_info->_property_c):"—"); ?>
															</li>
															<li>
																<strong>应用属性:</strong><?php echo (($base_info->app_property)?($base_info->app_property):"—"); ?>
															</li>

															<li>
																<strong>档案号:</strong> <?php echo (($base_info->file_no)?($base_info->file_no):"—"); ?>
															</li>
														</ul>
														<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/base_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span>
													</button>
													</div>
												</div>
											</div>
											<!-- 设备基本信息结束-->
											
											<!-- 设备购置信息开始 -->
											<div class="col-sm-6 col-lg-3">
												<div class="panel panel-white">
													<div class="panel-heading">
														<div class="panel-title">
															购置信息
														</div>
													</div>
													<div class="panel-body">
														<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
															<li>
																<strong>采购申请编号:</strong><?php echo (($buy_info->apply_no)?($buy_info->apply_no):"—"); ?>
															</li>
															<li>
																<strong>采购项目编号:</strong><?php echo (($buy_info->project_no)?($buy_info->project_no):"—"); ?>
															</li>
															<li>
																<strong>增加方式:</strong> <?php echo (($buy_info->_add_method)?($buy_info->_add_method):"—"); ?>
															</li>
															<li>
																<strong>预算:</strong> <?php echo (($buy_info->budget)?($buy_info->budget):"—"); ?>
															</li>
															<li>
																<strong>列支说明:</strong> <?php echo (($buy_info->charge)?($buy_info->charge):"—"); ?>
															</li>
															<li>
																<strong>组织方式:</strong><?php echo (($buy_info->_group_method)?($buy_info->_group_method):"—"); ?>
															</li>
															<li>
																<strong>采购方式:</strong><?php echo (($buy_info->_buy_method)?($buy_info->_buy_method):"—"); ?>
															</li>
															<li>
																<strong>合同编号:</strong> <?php echo (($buy_info->agreement_no)?($buy_info->agreement_no):"—"); ?>
															</li>

															<li>
																<strong>合同日期:</strong> <?php echo (($buy_info->agreement_date)?($buy_info->agreement_date):"—"); ?>
															</li>
															<li>
																<strong>到货日期:</strong><?php echo (($buy_info->arrive_date)?($buy_info->arrive_date):"—"); ?>
															</li>
															<li>
																<strong>经办人:</strong> <?php echo (($buy_info->passer)?($buy_info->passer):"—"); ?>
															</li>
															<li>
																<strong>购置部门:</strong> <?php echo (($buy_info->buy_dept)?($buy_info->buy_dept):"—"); ?>
															</li>
															<li>
																<strong>购置时新旧情况:</strong> <?php echo (($buy_info->_is_new)?($buy_info->_is_new):"—"); ?>
															</li>
															<li>
																<strong>科免属性:</strong> <?php echo (($buy_info->_kemian)?($buy_info->_kemian):"—"); ?>
															</li>
														</ul>
														<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/buy_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span></button>
													</div>
												</div>
											</div>
											<!-- 设备购置信息结束 -->
											
											<!-- 设备验收信息开始 -->
											<div class="col-sm-6 col-lg-3">
												<div class="panel panel-white">
													<div class="panel-heading">
														<div class="panel-title">
															验收信息
														</div>
													</div>
													<div class="panel-body">
														<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">

															<li>
																<strong>验收人:</strong> <?php echo (($check_info->checker)?($check_info->checker):"—"); ?>
															</li>
															<li>
																<strong>验收日期:</strong> <?php echo (($check_info->date)?($check_info->date):"—"); ?>
															</li>
															<li>
																<strong>验收结论:</strong> <?php echo (($check_info->result)?($check_info->result):"—"); ?>
															</li>
															<li>
																<strong>安装放置地点:</strong> <?php echo (($check_info->address)?($check_info->address):"—"); ?>
															</li>
															<li>
																<strong>其他:</strong><?php echo (($check_info->others)?($check_info->others):"—"); ?>
															</li>

															<li>
																<strong>管理状态:</strong> <?php echo (($check_info->_manage_status)?($check_info->_manage_status):"—"); ?>
															</li>
															<li>
																<strong>配置状态:</strong> <?php echo (($check_info->_config_status)?($check_info->_config_status):"—"); ?>
															</li>
															<li>
																<strong>设备状态:</strong> <?php echo (($check_info->_status)?($check_info->_status):"—"); ?>
															</li>
															<li>
																<strong>是否固定设备:</strong> <?php echo (($check_info->_is_asset)?($check_info->_is_asset):"—"); ?>
															</li>
															<li>
																<strong>借用状态:</strong>  <?php echo (($check_info->_borrow_status)?($check_info->_borrow_status):"—"); ?>
															</li>
															<li>
																<strong>是否免税:</strong> <?php echo (($check_info->_is_free)?($check_info->_is_free):"—"); ?>
															</li>
														</ul>
														<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/check_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span></button>
													</div>
												</div>
											</div>
											<!-- 设备验收信息结束-->
											
											<!-- 设备管理信息开始 -->
											<div class="col-sm-6 col-lg-3">
												<div class="panel panel-white">
													<div class="panel-heading">
														<div class="panel-title">
															管理信息
														</div>
													</div>
													<div class="panel-body">
														<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
															<li>
																<strong>使用部门:</strong> <?php echo (($manage_info->use_dept)?($manage_info->use_dept):"—"); ?>
															</li>
															<li>
																<strong>部门设备管理员:</strong> <?php echo (($manage_info->dept_admin)?($manage_info->dept_admin):"—"); ?>
															</li>
															<li>
																<strong>使用人:</strong> <?php echo (($manage_info->dev_user)?($manage_info->dev_user):"—"); ?>
															</li>
															<li>
																<strong>管理部门:</strong><?php echo (($manage_info->manage_dept)?($manage_info->manage_dept):"—"); ?>
															</li>
															<li>
																<strong>院管理员:</strong> <?php echo (($manage_info->yard_admin)?($manage_info->yard_admin):"—"); ?>
															</li>
															<li>
																<strong>设备技术负责人:</strong> <?php echo (($manage_info->tech_admin)?($manage_info->tech_admin):"—"); ?>
															</li>
															<li>
																<strong>使用费比率:</strong><?php echo (($manage_info->use_percent)?($manage_info->use_percent):"—"); ?>
															</li>
															<li>
																<strong>使用费:</strong><?php echo (($manage_info->use_price)?($manage_info->use_price):"—"); ?>
															</li>
															<li>
																<strong>备注:</strong><?php echo (($manage_info->note)?($manage_info->note):"—"); ?>
															</li>
															<li>
																<strong>处置方式:</strong><?php echo (($manage_info->_manage_method)?($manage_info->_manage_method):"—"); ?>
															</li>
															<li>
																<strong>处置原因:</strong><?php echo (($manage_info->manage_reason)?($manage_info->manage_reason):"—"); ?>
															</li>
															<li>
																<strong>处置方式其他:</strong><?php echo (($manage_info->manage_method_other)?($manage_info->manage_method_other):"—"); ?>
															</li>
															<li>
																<strong>管理名称:</strong><?php echo (($manage_info->manage_name)?($manage_info->manage_name):"—"); ?>
															</li>
															<li>
																<strong>财务资产编号:</strong> <?php echo (($manage_info->finance_no)?($manage_info->finance_no):"—"); ?>
															</li>
														</ul>
														<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/manage_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span></button>
													</div>
												</div>
											</div>
											<!-- 设备管理信息结束-->
											
											<!-- 设备技术参数信息开始 -->
											<div class="col-sm-6 col-lg-3">
												<div class="panel panel-white">
													<div class="panel-heading">
														<div class="panel-title">
															技术参数
														</div>
													</div>
													<div class="panel-body">
														<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
															<li>
																<strong>投用日期:</strong> <?php echo (($tech_info->date)?($tech_info->date):"—"); ?>
															</li>
															<li>
																<strong>投用年限:</strong><?php echo (($tech_info->years)?($tech_info->years):"—"); ?>
															</li>
															<li>
																<strong>规格型号:</strong><?php echo (($tech_info->spec)?($tech_info->spec):"—"); ?>
															</li>
															<li>
																<strong>精度:</strong><?php echo (($tech_info->precise)?($tech_info->precise):"—"); ?>
															</li>
															<li>
																<strong>测量范围:</strong><?php echo (($tech_info->dev_range)?($tech_info->dev_range):"—"); ?>
															</li>
															<li>
																<strong>设备功能:</strong><?php echo (($tech_info->function)?($tech_info->function):"—"); ?>
															</li>
															<li>
																<strong>技术特性:</strong><?php echo (($tech_info->tech_spec)?($tech_info->tech_spec):"—"); ?>
															</li>

														</ul>
														<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/tech_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span></button>
													</div>
												</div>
											</div>
											<!-- 设备技术参数信息结束 -->
											
											<!-- 设备费用信息开始 -->
											<div class="col-sm-6 col-lg-3">
												<div class="panel panel-white">
													<div class="panel-heading">
														<div class="panel-title">
															费用信息
														</div>
													</div>
													<div class="panel-body">
														<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
															<li>
																<strong>主机原值:</strong><?php echo (($cost_info->old_price)?($cost_info->old_price):"—"); ?>
															</li>
															<li>
																<strong>其他费用一:</strong> <?php echo (($cost_info->other_price_one)?($cost_info->other_price_one):"—"); ?>
															</li>
															<li>
																<strong>附加价格:</strong> <?php echo (($cost_info->add_price)?($cost_info->add_price):"—"); ?>
															</li>
															<li>
																<strong>其他费用二:</strong><?php echo (($cost_info->other_price_two)?($cost_info->other_price_two):"—"); ?>
															</li>
															<li>
																<strong>外币金额:</strong> <?php echo (($cost_info->foreign_price)?($cost_info->foreign_price):"—"); ?>
															</li>
															<li>
																<strong>其他费用三:</strong> <?php echo (($cost_info->other_price_three)?($cost_info->other_price_three):"—"); ?>
															</li>
															<li>
																<strong>合计金额:</strong> <?php echo (($cost_info->sum_price)?($cost_info->sum_price):"—"); ?>
															</li>
															<li>
																<strong>代理费:</strong> <?php echo (($cost_info->act_price)?($cost_info->act_price):"—"); ?>
															</li>

														</ul>
														<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/cost_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span></button>
													</div>
												</div>
											</div>
											<!-- 设备费用信息结束 -->
											
											<!-- 设备检定信息开始 -->
											<div class="col-sm-6 col-lg-3">
												<div class="panel panel-white">
													<div class="panel-heading">
														<div class="panel-title">
															检定信息
														</div>
													</div>
													<div class="panel-body">
														<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
															<li>
																<strong>检定校验状态:</strong><?php echo (($verify_info->_status)?($verify_info->_status):"—"); ?>
															</li>
															<li>
																<strong>检定校准日期:</strong> <?php echo (($verify_info->date)?($verify_info->date):"—"); ?>
															</li>
															<li>
																<strong>检定校准周期:</strong> <?php echo (($verify_info->period)?($verify_info->period):"—"); ?>
															</li>
															<li>
																<strong>计划检定校准日期:</strong> <?php echo (($verify_info->plan_date)?($verify_info->plan_date):"—"); ?>
															</li>
															<li>
																<strong>是否计量:</strong> <?php echo (($verify_info->_is_sum)?($verify_info->_is_sum):"—"); ?>
															</li>
														</ul>
														<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/verify_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span></button>
													</div>
												</div>
											</div>
											<!-- 设备检定信息结束-->
											
											<!-- 设备供应商信息开始 -->
											<div class="col-sm-3">
												<h4>供应商信息:</h4>
												<div class="well">
													<address>
														<strong class="text-dark">制造国:中国</strong>
													</address>
													<address>
														<strong class="text-dark">供应商: <?php echo (($sup_info->sup_name)?($sup_info->sup_name):"—"); ?></strong>
														<br>
														<?php echo (($sup_info->sup_tel)?($sup_info->sup_tel):"—"); ?> / <?php echo (($sup_info->sup_phone)?($sup_info->sup_phone):"—"); ?>
													</address>
													<address>
														<strong class="text-dark">制造单位:<?php echo (($sup_info->mfrs_name)?($sup_info->mfrs_name):"—"); ?></strong>
														<br>
														<?php echo (($sup_info->mfrs_tel)?($sup_info->mfrs_tel):"—"); ?> / <?php echo (($sup_info->mfrs_phone)?($sup_info->mfrs_phone):"—"); ?>
													</address>
													<address>
														<strong class="text-dark">代理商:<?php echo (($sup_info->act_name)?($sup_info->act_name):"—"); ?></strong>
														<br>
														<?php echo (($sup_info->act_tel)?($sup_info->act_tel):"—"); ?> / <?php echo (($sup_info->act_phone)?($sup_info->act_phone):"—"); ?>
													</address>
													<address>
														<strong class="text-dark">维修维护商:<?php echo (($sup_info->repair_name)?($sup_info->repair_name):"—"); ?></strong>
														<br>
														<?php echo (($sup_info->repair_tel)?($sup_info->repair_tel):"—"); ?> / <?php echo (($sup_info->repair_phone)?($sup_info->repair_phone):"—"); ?>
													</address>
													<button type="button" class="btn btn-primary btn-block btn-scroll btn-scroll-top ti-arrow-right" data-toggle="modal" data-target=".bs-example-modal-right" onclick="window.location.href='<?php echo U('Device/sup_edit',array('dev_id'=>$base_info->id));?>';">
														<span>编辑</span></button>
												</div>	
											</div>
											<!-- 设备供应商信息结束 -->
										</div>

										<div class="row">
											<div class="col-sm-12 invoice-block" style="margin-top: 25px;">	
												<a class="btn btn-lg btn-primary btn-o hidden-print">
													归还 <i class="fa fa-hand-o-right"></i>
												</a>
												<a class="btn btn-lg btn-primary btn-o hidden-print" href="__APP__/Meterage/send_to_sub_sheet/dev_id/<?php echo ($dev_id); ?>">
													送检 <i class="fa fa-location-arrow"></i>
												</a>

												<a class="btn btn-lg btn-primary btn-o hidden-print" href="__APP__/Meterage/send_to_verify/dev_id/<?php echo ($dev_id); ?>">
													填写检定报告 <i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-lg btn-primary btn-o hidden-print">
													发送停用通知 <i class="fa ti-alert"></i>
												</a>
												<a class="btn btn-lg btn-primary btn-o hidden-print">
													打印不符合报告单 <i class="fa fa-file-word-o"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: INVOICE -->
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
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="__PUBLIC__/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
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