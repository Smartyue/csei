<?php
return array(
		//'配置项'=>'配置值'
		'URL_MODEL'=>2,
		'URL_PATHINFO_DEPR'=>'/',//修改URL分隔符
		'TMPL_L_DELIM'=>'{#',//修改内置smarty模板左边界符
		'TMPL_R_DELIM'=>'#}',//修改内置smarty模板右边界符
		'LAYOUT_ON'=>true, //开启模板布局功能
		'LAYOUT_NAME'=>'base',//设置布局入口文件名称
		//******数据库连接配置项***********
		'DB_TYPE'=>'mysql',  //设置数据库类型
		'DB_HOST'=>'localhost',//设置主机地址
		'DB_NAME'=>'csei',//设置数据库名
		'DB_USER'=>'root',//设置用户名
		'DB_PWD'=>'root',//设置密码
		'DB_PORT'=>'3306',//设置端口号
		'DB_PREFIX'=>'cs_',//设置表前缀
		'DB_CHARSET'=>'utf8',//设置数据库编码
		//***********数据库配置项结束*******
		'DEFAULT_TIMEZONE'=>'Asia/Shanghai' ,// 设置默认时区为上海
		'SHOW_PAGE_TRACE'=>true,//开启页面Trace
		'URL_HTML_SUFFIX'  => 'html',  // URL伪静态后缀设置
		//************SMTP邮件配置***************
		'MAIL_ADDRESS'=>'m15011370857_1@163.com',//邮箱地址
		'MAIL_LOGINNAME'=>'m15011370857_1',//	邮箱登录账号
		'MAIL_SMTP'=>'smtp.163.com',//邮箱smtp服务器
		'MAIL_PASSWORD'=>'oactkghtadxpuilz',//邮箱密码，推荐使用授权码作为密码
		'MAIL_PORT'=>25,//邮箱端口
);
?>