<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'  => 'mysql',// 数据库类型 	
 	'DB_PREFIX'  => '',// 数据表前缀
 	'DB_CHARSET' => 'utf8',// 网站编码
 	
 	//For Local
// 	'DB_HOST'  => '127.0.0.1',// 数据库服务器地址
// 	'DB_NAME'  => 'think_db',// 数据库名称
// 	'DB_USER'  => 'root',// 数据库用户名
// 	'DB_PWD'  => 'root',// 数据库密码
// 	'DB_PORT'  => '3306',// 数据库端口
 	//For Sae
 	'DB_HOST'  => 'pwpqcmewfhlq.rds.sae.sina.com.cn',// 数据库服务器地址
 	'DB_NAME'  => 'wechat_staff',// 数据库名称
 	'DB_USER'  => 'staff_admin',// 数据库用户名
 	'DB_PWD'  => 'password',// 数据库密码
 	'DB_PORT'  => 10033,// 数据库端口
 	
 	
 	'APP_DEBUG'     =>  false,// 开启调试模式
 	
 	
 	'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__ . '/Public',
        '__HTML__' => __ROOT__ . '/Public/html',
        '__JS__' => __ROOT__ . '/Public/js',
        '__CSS__' => __ROOT__ . '/Public/css',
        '__IMAGE__' => __ROOT__ . '/Public/img',
        '__FONTS__' => __ROOT__ . '/Public/fonts',
        '__BOWER__' => __ROOT__.'/Public/bower_components',
        
    ),
);