<?php
/**
 * [WDL] Copyright (c) 2013 wormwood.com
 */
defined('IN_IA') or exit('Access Denied');
if(checksubmit()) {
	_login($_GPC['referer']);
}
cache_load('setting');
template('member/login');
