<?php 
/**
 * 获取用户公众号信息
 * [WDL] Copyright (c) 2013 wormwood.com
 */
defined('IN_IA') or exit('Access Denied');
$account = pdo_fetchall("SELECT weid, name FROM ".tablename('wechats') . (empty($_W['isfounder']) ? " WHERE uid = '{$_W['uid']}'" : ''));
isetcookie('wechatloaded', '1');
message($account, '', 'ajax');