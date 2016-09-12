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
 	'DB_HOST'  => SAE_MYSQL_HOST_M,// 数据库服务器地址
 	'DB_NAME'  => SAE_MYSQL_DB,// 数据库名称
 	'DB_USER'  => SAE_MYSQL_USER,// 数据库用户名
 	'DB_PWD'  => SAE_MYSQL_PASS,// 数据库密码
 	'DB_PORT'  => SAE_MYSQL_PORT,// 数据库端口
 	
 	
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