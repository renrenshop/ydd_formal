<?php

/**
 * socket server配置文件，重启后生效
 */

// 开发模式开关
define('SOCKET_SERVER_DEBUG', false);

// 设置服务端IP
define('SOCKET_SERVER_IP', 'localhost');

// 设置服务端端口
define('SOCKET_SERVER_PORT', '9501');

// 设置是否启用SSL
define('SOCKET_SERVER_SSL', true);

// 设置SSL KEY文件路径
define('SOCKET_SERVER_SSL_KEY_FILE', '/www/wdlinux/nginx-1.10.2/conf/vhost/cert/wx.hyshop.xin/214042739190380.key');

// 设置SSL CERT文件路径
define('SOCKET_SERVER_SSL_CERT_FILE', '/www/wdlinux/nginx-1.10.2/conf/vhost/cert/wx.hyshop.xin/214042739190380.pem');

// 设置启动的worker进程数
define('SOCKET_SERVER_WORKNUM', 4);

// 设置客户端请求IP
define('SOCKET_CLIENT_IP', 'wx.hyshop.xin');