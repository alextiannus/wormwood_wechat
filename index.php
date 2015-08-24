<?php
/**
 * [WDL] Copyright WORMWOOD (c) 2013 wormwood.com
 */
define('IN_SYS', true);

require 'source/bootstrap.inc.php';
define('CONTROLLER', 'home');
$actions = array('attachment', 'help', 'announcement', 'module', 'welcome', 'sysinfo', 'index');
$action = in_array($action, $actions) ? $action : (!empty($_W['uid']) ? 'frame' : 'index');
require router(CONTROLLER, $action);