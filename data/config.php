<?php
defined('IN_IA') or exit('Access Denied');

$config = array();

$config['db']['host'] = '52.74.95.117';
$config['db']['username'] = 'root';
$config['db']['password'] = 'admin';
$config['db']['port'] = '3306';
$config['db']['database'] = 'wm_weegine_product';
$config['db']['charset'] = 'utf8';
$config['db']['pconnect'] = 0;
$config['db']['tablepre'] = 'ims_';

// --------------------------  CONFIG COOKIE  --------------------------- //
$config['cookie']['pre'] = '0c3a_';
$config['cookie']['domain'] = '';
$config['cookie']['path'] = '/';

// --------------------------  CONFIG SETTING  --------------------------- //
$config['setting']['charset'] = 'utf-8';
$config['setting']['cache'] = 'mysql';
$config['setting']['timezone'] = 'Asia/Shanghai';
$config['setting']['memory_limit'] = '256M';
$config['setting']['filemode'] = 0644;
$config['setting']['authkey'] = '27f21dc7303e85db_';
$config['setting']['founder'] = '1';
$config['setting']['development'] = 0;
$config['setting']['referrer'] = 0;


// --------------------------  CONFIG UPLOAD  --------------------------- //
$config['upload']['image']['extentions'] = array('gif', 'jpg', 'jpeg', 'png');
$config['upload']['image']['limit'] = 5000;
$config['upload']['attachdir'] = 'resource/attachment/';