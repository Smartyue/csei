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
		<div id="app" style="padding-top:0;">
			<div class="app-content">
				<div>
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">年度送检评价表打印</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span><?php echo ($print_no); ?></span>
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
												<p class="text-dark">
													<?php echo ($print_no); ?> / <?php echo ($today); ?>
												</p>
											</div>
										</div>
										<hr>

										<div class="row">
											<div class="col-sm-12">
												<table class="table table-striped table-bordered">
													<thead>
														<tr>
															<th rowspan="2">序号</th>
															<th rowspan="2">设备编号</th>
															<th rowspan="2">设备名称</th>
															<th rowspan="2">规格型号</th>
															<th rowspan="2">计划检定校准日期</th>
															<th rowspan="2">实际检定校准日期</th>
															<th colspan="2" class="center">评价情况：按时送检✓、未按时送检〇、未进行送检✕</th>
														</tr>
														<tr>
															<th>评价情况</th>
															<th>备注信息</th>
														</tr>
													</thead>
													<tbody>
													<?php if(is_array($ver_list)): foreach($ver_list as $key=>$vo): ?><tr>
															<td><?php echo ($key+1); ?></td>
															<td><?php echo ($vo["dev_no"]); ?></td>
															<td><?php echo ($vo["dev_name"]); ?></td>
															<td><?php echo ($vo["spec"]); ?></td>
															<td><?php echo ($vo["plan_date"]); ?></td>
															<td><?php echo ($vo["true_date"]); ?></td>
															<td><?php echo ($vo["_rate"]); ?></td>
															<td ><?php echo ($vo["note"]); ?></td>
														</tr><?php endforeach; endif; ?>
													</tbody>
												</table>
												<h2 style="width: 900px; padding-left: 0; padding-top: 15px; float: right; text-align: right; font-weight:bold; font-size: 14px;">&nbsp; 年&nbsp;&nbsp;&nbsp;&nbsp; 月&nbsp;&nbsp;&nbsp;&nbsp; 日</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12 invoice-block">

												<br>
												<a onclick="javascript:window.print();" class="btn btn-lg btn-primary hidden-print">
													确认打印 <i class="fa fa-print"></i>
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