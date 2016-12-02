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
							<li class="active open">
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
							<li>
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
										<a href="<?php echo U('Scan/index');?>">
											绑定扫描仪
										</a>
								     	</li>  
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
						<!-- start: DASHBOARD TITLE -->
						<section id="page-title" class="padding-top-15 padding-bottom-15">
							<div class="row">
								<div class="col-sm-7">
									<h1 class="mainTitle">中国特种设备检测研究院物联网管理系统</h1>
									<span class="mainDescription">首页－设备概况</span>
								</div>
								<div class="col-sm-5">
									<!-- start: MINI STATS WITH SPARKLINE -->
									<ul class="mini-stats pull-right">
										<li>
											<div class=" text-center">
												<div class="rate">
													<span class="value">3655</span>
												</div>
												设备总数
											</div>
										</li>
										<li>
											<div class=" text-center">
												<div class="rate">
													</i><span class="value">98</span><span class="percentage">%</span>
												</div>
												已标记设备
											</div>
										</li>
										<li>
											<div class=" text-center">
												<div class="rate">
													</i><span class="value">267</span>
												</div>
												日均管理设备
											</div>
										</li>
									</ul>
									<!-- end: MINI STATS WITH SPARKLINE -->
								</div>
							</div>
						</section>
						<!-- end: DASHBOARD TITLE -->
						<!-- start: FEATURED BOX LINKS -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">电子标签管理</h2>
											<p class="text-small">
												管理电子标签与设备绑定
											</p>
											<p class="links cl-effect-1">
												<a href="<?php echo U('Label/index');?>">
													点击进入
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-server fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">设备信息管理</h2>
											<p class="text-small">
												编辑修改设备信息及设备借出使用状态
											</p>
											<p class="cl-effect-1">
												<a href="<?php echo U('Device/index');?>">
													点击进入
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">计量管理</h2>
											<p class="text-small">
												设备送检、归还处理或填写检定报告
											</p>
											<p class="links cl-effect-1">
												<a href="<?php echo U('Meterage/index');?>">
													点击进入
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: FEATURED BOX LINKS -->
						<!-- start: FIRST SECTION -->
						<div class="container-fluid container-fullw padding-bottom-10">
							<div class="row">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-md-7 col-lg-8">
											<div class="panel panel-white no-radius" id="visits">
												<div class="panel-heading border-light">
													<h4 class="panel-title"> 单月设备信息维护 </h4>
													<ul class="panel-heading-tabs border-light">

														<li>
															<div class="rate">
																<span class="value">15</span><span class="percentage">%</span>
															</div>
														</li>
														<li class="panel-tools">
															<a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
														</li>
													</ul>
												</div>
												<div collapse="visits" class="panel-wrapper">
													<div class="panel-body">
														<div class="height-350">
															<canvas id="chart1" class="full-width"></canvas>
															<div class="margin-top-20">
																<div class="inline pull-left">
																	<div id="chart1Legend" class="chart-legend"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-5 col-lg-4">
											<div class="panel panel-white no-radius">
												<div class="panel-heading border-light">
													<h4 class="panel-title"> 送检设备数量 </h4>
												</div>
												<div class="panel-body">
													<h3 class="inline-block no-margin">368</h3> (总设备数3654)
													<div class="progress progress-xs no-radius">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
															<span class="sr-only"> 40% Complete</span>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<h4 class="no-margin">264</h4>
															<div class="progress progress-xs no-radius no-margin">
																<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																	<span class="sr-only"> 60% Complete</span>
																</div>
															</div>
															合格
														</div>
														<div class="col-sm-4">
															<h4 class="no-margin">157</h4>
															<div class="progress progress-xs no-radius no-margin">
																<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
																	<span class="sr-only"> 80% Complete</span>
																</div>
															</div>
															不合格
														</div>

														<div class="col-sm-4">
															<h4 class="no-margin">4</h4>
															<div class="progress progress-xs no-radius no-margin">
																<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
																	<span class="sr-only"> 40% Complete</span>
																</div>
															</div>
															未送检
														</div>
													</div>
													<div class="row margin-top-30">
														<div class="col-xs-4 text-center">
															<div class="rate">
																<span class="value">96</span><span class="percentage">%</span>
															</div>
															合格率
														</div>
														<div class="col-xs-4 text-center">
															<div class="rate">
																<i class="fa fa-caret-up text-green"></i><span class="value">2</span><span class="percentage">%</span>
															</div>
															不合格率
														</div>
														<div class="col-xs-4 text-center">
															<div class="rate">
																<i class="fa fa-caret-down text-red"></i><span class="value">1</span><span class="percentage">%</span>
															</div>
															未检率
														</div>
													</div>
													<div class="margin-top-10">
														<div class="height-180">
															<canvas id="chart2" class="full-width"></canvas>
															<div class="inline pull-left legend-xs">
																<div id="chart2Legend" class="chart-legend"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: FIRST SECTION -->
						<!-- start: SECOND SECTION -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-8">
									<div class="panel panel-white no-radius">
										<div class="panel-body">
											<div class="partition-light-grey padding-15 text-center margin-bottom-20">
												<h4 class="no-margin">Monthly Statistics</h4>
												<span class="text-light">based on the major browsers</span>
											</div>
											<div id="accordion" class="panel-group accordion accordion-white no-margin">
												<div class="panel no-radius">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15">
															<i class="icon-arrow"></i>
															This Month <span class="label label-danger pull-right">3</span>
														</a></h4>
													</div>
													<div class="panel-collapse collapse in" id="collapseOne">
														<div class="panel-body no-padding partition-light-grey">
															<table class="table">
																<tbody>
																	<tr>
																		<td class="center">1</td>
																		<td>Google Chrome</td>
																		<td class="center">4909</td>
																		<td><i class="fa fa-caret-down text-red"></i></td>
																	</tr>
																	<tr>
																		<td class="center">2</td>
																		<td>Mozilla Firefox</td>
																		<td class="center">3857</td>
																		<td><i class="fa fa-caret-up text-green"></i></td>
																	</tr>
																	<tr>
																		<td class="center">3</td>
																		<td>Safari</td>
																		<td class="center">1789</td>
																		<td><i class="fa fa-caret-up text-green"></i></td>
																	</tr>
																	<tr>
																		<td class="center">4</td>
																		<td>Internet Explorer</td>
																		<td class="center">612</td>
																		<td><i class="fa fa-caret-down text-red"></i></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="panel no-radius">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15 collapsed">
															<i class="icon-arrow"></i>
															Last Month
														</a></h4>
													</div>
													<div class="panel-collapse collapse" id="collapseTwo">
														<div class="panel-body no-padding partition-light-grey">
															<table class="table">
																<tbody>
																	<tr>
																		<td class="center">1</td>
																		<td>Google Chrome</td>
																		<td class="center">5228</td>
																		<td><i class="fa fa-caret-up text-green"></i></td>
																	</tr>
																	<tr>
																		<td class="center">2</td>
																		<td>Mozilla Firefox</td>
																		<td class="center">2853</td>
																		<td><i class="fa fa-caret-up text-green"></i></td>
																	</tr>
																	<tr>
																		<td class="center">3</td>
																		<td>Safari</td>
																		<td class="center">1948</td>
																		<td><i class="fa fa-caret-up text-green"></i></td>
																	</tr>
																	<tr>
																		<td class="center">4</td>
																		<td>Internet Explorer</td>
																		<td class="center">456</td>
																		<td><i class="fa fa-caret-down text-red"></i></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">New Users</h4>
										</div>
										<div class="panel-body">
											<div class="text-center">
												<span class="mini-pie"> <canvas id="chart3" class="full-width"></canvas> <span>450</span> </span>
												<span class="inline text-large no-wrap">Acquisition</span>
											</div>
											<div class="margin-top-20 text-center legend-xs inline">
												<div id="chart3Legend" class="chart-legend"></div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="clearfix padding-5 space5">
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">90%</span>
														<span class="text-light">Satisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">2%</span>
														<span class="text-light">Unsatisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<span class="text-bold block text-extra-large">8%</span>
													<span class="text-light">NA</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: SECOND SECTION -->
						<!-- start: THIRD SECTION -->
						<div class="container-fluid container-fullw padding-bottom-10">
							<div class="row">
								<div class="col-sm-8">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-light">
											<h4 class="panel-title">账号信息</h4>
										</div>
										<div class="panel-body no-padding">
											<div class="padding-10">
												<img width="50" height="50" src="__ROOT__/<?php echo ($userinfo->logo); ?>" class="img-circle pull-left" alt="">
												<h4 class="no-margin inline-block padding-5"><?php echo ($userinfo->nickname); ?> <span class="block text-small text-left">信息中心</span></h4>
												<div class="pull-right padding-15">
													<span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
												</div>
											</div>
											<div class="clearfix padding-5 space5">
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<a class="text-dark" href="#">
															<i class="fa fa-heart-o text-red"></i> 250
														</a>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<a class="text-dark" href="#">
															<i class="fa fa-bookmark-o text-green"></i> 20
														</a>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<a class="text-dark" href="#"><i class="fa fa-comment-o text-azure"></i> 544</a>
												</div>
											</div>
											<div class="tabbable no-margin no-padding">
												<ul class="nav nav-tabs" id="myTab">
													<li class="active padding-top-5 padding-left-5">
														<a data-toggle="tab" href="#users_followers">
															Followers
														</a>
													</li>
													<li class="padding-top-5">
														<a data-toggle="tab" href="#users_following">
															Following
														</a>
													</li>
												</ul>
												<div class="tab-content">
													<div id="users_followers" class="tab-pane padding-bottom-5 active">
														<div class="panel-scroll height-200">
															<table class="table no-margin">
																<tbody>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-1-small.jpg"></td>
																		<td><span class="text-small block text-light">UI Designer</span><span>Peter Clark</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-2-small.jpg"></td>
																		<td><span class="text-small block text-light">Content Designer</span><span>Nicole Bell</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-3-small.jpg"></td>
																		<td><span class="text-small block text-light">Visual Designer</span><span>Steven Thompson</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-5-small.jpg"></td>
																		<td><span class="text-small block text-light">Senior Designer</span><span>Kenneth Ross</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-4-small.jpg"></td>
																		<td><span class="text-small block text-light">Web Editor</span><span>Ella Patterson</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div id="users_following" class="tab-pane padding-bottom-5">
														<div class="panel-scroll height-200">
															<table class="table no-margin">
																<tbody>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-3-small.jpg"></td>
																		<td><span class="text-small block text-light">Visual Designer</span><span>Steven Thompson</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-5-small.jpg"></td>
																		<td><span class="text-small block text-light">Senior Designer</span><span>Kenneth Ross</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="center"><img alt="image" class="img-circle" src="__PUBLIC__/assets/images/avatar-4-small.jpg"></td>
																		<td><span class="text-small block text-light">Web Editor</span><span>Ella Patterson</span></td>
																		<td class="center">
																			<div class="cl-effect-13">
																				<a href>
																					view more
																				</a>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">Specialization</h4>
										</div>
										<div class="panel-body">
											<canvas id="chart4" class="full-width"></canvas>
											<div class="margin-top-20 padding-bottom-5 inline">
												<div id="chart4Legend" class="chart-legend"></div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="clearfix padding-5 space5">
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">90%</span>
														<span class="text-light">Satisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">2%</span>
														<span class="text-light">Unsatisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<span class="text-bold block text-extra-large">8%</span>
													<span class="text-light">NA</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: THIRD SECTION -->

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
		<script src="__PUBLIC__/vendor/Chart.js/Chart.min.js"></script>
		<script src="__PUBLIC__/vendor/jquery.sparkline/jquery.sparkline.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="__PUBLIC__/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="__PUBLIC__/assets/js/index.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				var data_last=[11, 59, 80, 81, 56, 55, 40, 84, 64, 120, 132, 87];//单月设备信息维护 上一年数据
				var data_now=[12, 48, 40, 19, 86, 27, 90, 102, 123, 145, 60, 161];//单月设备信息维护 今年数据
				var dev_num_last=[65, 59, 80, 81, 56, 55, 40,55,66,77,88,99];//送检设备数量  上一年数据
				var dev_num_now=[28, 48, 40, 19, 86, 27, 90,22,33,44,55,66];//送检设备数量  今年数据
				Index.init(data_last,data_now,dev_num_last,dev_num_now);
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