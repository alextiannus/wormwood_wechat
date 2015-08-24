<?php defined('IN_IA') or exit('Access Denied');?><html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/2/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/2/reset.css" media="all">
    <link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/2/home-33.css" media="all">
    <script type="text/javascript" src="./source/modules/idish/template/js/2/maivl.js"></script>
    <script type="text/javascript" src="./source/modules/idish/template/js/2/jQuery.js"></script>
    <title><?php  echo $title;?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="Keywords" content="微点餐">
    <meta name="Description" content="微点餐">
    <!-- Mobile Devices Support @begin -->
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes"> <!-- apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <!-- Mobile Devices Support @end -->
</head>
<body onselectstart="return true;" ondragstart="return false;">
<link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/2/font-awesome.css" media="all">
<style>
    .body{
	    display:block;
        background:url('<?php  if($setting['thumb']) { ?><?php  echo $_W['attachurl'];?><?php  echo $setting['thumb'];?><?php  } else { ?>./source/modules/idish/template/images/bg.jpg<?php  } ?>') no-repeat 0 0;
	    background-size:100% 100%;
    }
</style>
<div class="body">
    <!--用户分类管理-->
	<section>
		<ul class="list_ul">
            <?php  if(is_array($nave)) { foreach($nave as $row) { ?>
            <li>
                <?php  if($row['type']==-1) { ?>
                <a href="<?php  echo $row['link'];?>&from_user=<?php  echo $page_from_user;?>">
                <?php  } else if($row['type']==2) { ?>
                <a href="<?php  echo create_url('mobile/module', array('do' => 'waprestlist', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid))?>">
                <?php  } else if($row['type']==3) { ?>
                <a href="<?php  echo create_url('mobile/module', array('do' => 'waplist', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>">
                <?php  } else if($row['type']==4) { ?>
                <a href="<?php  echo create_url('mobile/module', array('do' => 'wapmenu', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>">
                <?php  } else if($row['type']==5) { ?>
                <a href="<?php  echo create_url('mobile/module', array('do' => 'wapselect', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>">
                <?php  } else if($row['type']==6) { ?>
                <a href="<?php  echo create_url('mobile/module', array('do' => 'orderlist', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>">
                <?php  } ?>
                <label><?php  echo $row['name'];?></label>
			    </a>
            </li>
            <?php  } } ?>
		</ul>
	</section>
</div>
<!--导航菜单 后台设置的快捷菜单-->
<footer style="overflow:visible;">
    <div style="color: #fff;">
        <?php  echo $_W['account']['name'];?>
	</div>
</footer>
</body>
</html>