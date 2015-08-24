<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
	<title><?php  if($title) { ?><?php  echo $title;?><?php  } else { ?><?php  if(!empty($_W['account']['name'])) { ?><?php  echo $_W['account']['name'];?><?php  } ?><?php  } ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- Mobile Devices Support @begin -->
	<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
	<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
	<meta content="no-cache" http-equiv="pragma">
	<meta content="0" http-equiv="expires">
	<meta content="telephone=no, address=no" name="format-detection">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<!-- Mobile Devices Support @end -->
	<meta name="keywords" content="<?php  if(empty($_W['setting']['copyright']['keywords'])) { ?>WORMWOOD,微信,微信公众平台<?php  } else { ?><?php  echo $_W['setting']['copyright']['keywords'];?><?php  } ?>" />
	<meta name="description" content="<?php  if(empty($_W['setting']['copyright']['description'])) { ?>微信公众平台自助引擎，WORMWOOD是一款免费开源的微信公众平台管理系统。<?php  } else { ?><?php  echo $_W['setting']['copyright']['description'];?><?php  } ?>" />
	<script type="text/javascript" src="./resource/script/jquery-1.7.2.min.js"></script>
	<?php  if($bootstrap_type == 3) { ?>
	<link type="text/css" rel="stylesheet" href="./themes/mobile/default/style/bootstrap.css">
	<script type="text/javascript" src="./themes/mobile/default/script/bootstrap.min.js"></script>
	<?php  } else { ?>
	<link type="text/css" rel="stylesheet" href="./resource/style/bootstrap.css">
	<script type="text/javascript" src="./resource/script/bootstrap.js"></script>
	<?php  } ?>
	<link type="text/css" rel="stylesheet" href="./resource/style/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="./themes/mobile/default/style/common.mobile.css">
	<script type="text/javascript" src="./resource/script/cascade.js"></script>
	<script type="text/javascript" src="./themes/mobile/default/script/jquery.touchwipe.js"></script>
	<script type="text/javascript" src="./themes/mobile/default/script/swipe.js"></script>
	<!--[if IE 7]>
	<link rel="stylesheet" href="./resource/style/font-awesome-ie7.min.css">
	<![endif]-->
</head>
<body id="cate57">
<style>
html, body {
	color:#222;
	font-family:Microsoft YaHei,Helvitica,Verdana,Tohoma,Arial,san-serif;
	margin:0;
	padding: 0;
	text-decoration: none;
}
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td {
	margin:0;
	padding:0;
}
img {
	border:0;
}
ol, ul {
	list-style: none outside none;
	margin:0;
	padding: 0;
}
a {
	color:#000000;
	text-decoration: none;
}
.clr {
	display:block;
	clear:both;
	height:0;
	overflow:hidden;
}
.copyright{padding:8px;text-align:center;font-size:14px;color:#666;}
.copyright a{color:#666;}

#cate57 {background-color: #eee; }

#cate57  .mainmenu { width:96%; margin:10px auto 0px;display: block;overflow: hidden;}
#cate57  .mainmenu li{ float:left; width:50%;height: 100px; overflow:hidden;}
#cate57  .mainmenu li a{ display:block;  color:#FFF; margin:0px 10px 0px 10px; position:relative ; height: 130px;    }
#cate57  .mainmenu li a p{ height:50%; padding-top:10px; overflow:hidden; text-align:center; position: relative; display: block;}
#cate57  .mainmenu li a img{ width:90%; border-radius:9px;-webkit-transform: rotate(-7deg) ; box-shadow:0 -1px 3px rgba(0, 0, 0, 0.24); margin-top: 10px;}
#cate57  .mainmenu li a i{ position: absolute;
z-index: 2;
bottom: -1px;
display: block;
height: 1px;
width: 100%; box-shadow:0 -1px 3px rgba(0, 0, 0, 0.46)}
#cate57  .mainmenu li a span{ display:block;line-height:30px; font-size:14px; color:#505359; text-align:center;  padding:0px 10px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap}

</style>

<?php  include template('slide', TEMPLATE_INCLUDEPATH);?>
<div id="insert1"></div>
<ul class="mainmenu">
<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
<li><a href="<?php  echo $nav['url'];?>"><p><img src="<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>"><i></i></p><span><?php  echo $nav['name'];?></span></a></li>
<?php  } } ?>
</ul>
<div id="insert2"></div>

<div class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>WORMWOOD团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></div>


<?php  if($_W['quickmenu']['menus']) { ?>
	<?php  include template($_W['quickmenu']['template'], TEMPLATE_INCLUDEPATH);?>
<?php  } ?>
<script type="text/javascript">
$(function() {
	$(".user-box .box-item").each(function(i) {
		i = i +1;
		if(i%3 == 0) $(this).css("border-right", "0");
	});
	$(window).scroll(function(){
		$(".menu-button").find("i").removeClass("icon-minus-sign").addClass("icon-plus-sign");
		$(".menu-main").hide();
	});
	$(".menu-main a").click(function(){ $(".menu-main").hide(); });

	//控制tab宽度
	var profile_tab = $(".nav-tabs li");
	profile_tab.css({"width": 100/profile_tab.length+"%", "text-align": "center"});

	//手机表单处理
	$(".form-table").delegate(".checkbox input[type='checkbox']", "click", function(){
		$(this).parent().toggleClass("btn-inverse");
	});
	$(".form-table").delegate(".file input[type='file']", "change", function(){
		var a = $(this).next("button");
		a.html(a.html() +' '+  $(this).val());
	});

	//处理固定横向导航条
	var navbarFixedTop = false, navbarFixedBottom = false;
	navbarFixedTop = $(".navbar").hasClass("navbar-fixed-top");
	navbarFixedBottom = $(".navbar").hasClass("navbar-fixed-bottom");
	if(navbarFixedTop) $("body").css("padding-top", "41px");
	if(navbarFixedBottom) $("body").css("padding-bottom", "41px");
});

//对分享时的数据处理
function _removeHTMLTag(str) {
	str = str.replace(/<script[^>]*?>[\s\S]*?<\/script>/g,'');
	str = str.replace(/<style[^>]*?>[\s\S]*?<\/style>/g,'');
    str = str.replace(/<\/?[^>]*>/g,'');
    str = str.replace(/\s+/g,'');
    str = str.replace(/&nbsp;/ig,'');
    return str;
}
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	<?php
		$_share = array();
		$_share['title'] = (empty($title)) ? $_W['account']['name'] : $title;
		$_share['link'] = 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '&wxref=mp.weixin.qq.com';
		$_share['img'] = $_W['siteroot'] . 'source/modules/' . $_GPC['name'] . '/icon.jpg';
	?>
	var _share_img = $('body img:eq(0)').attr("src");
	if(typeof(_share_img) == "undefined") _share_img = "<?php  echo $_share['img'];?>";
	var _share_content = _removeHTMLTag($('body').html()).replace("<?php  echo $_share['title'];?>",'');

	window.shareData = {
		"imgUrl": _share_img,
		"timeLineLink": "<?php  echo $_share['link'];?>",
		"sendFriendLink": "<?php  echo $_share['link'];?>",
		"weiboLink": "<?php  echo $_share['link'];?>",
		"tTitle": "<?php  echo $_share['title'];?>",
		"tContent":  _share_content,
		"fTitle": "<?php  echo $_share['title'];?>",
		"fContent":  _share_content,
		"wContent":  "<?php  echo $_share['title'];?>"
	};

	// 发送给好友
	WeixinJSBridge.on('menu:share:appmessage', function (argv) {
		WeixinJSBridge.invoke('sendAppMessage', {
			"img_url": window.shareData.imgUrl,
			"img_width": "640",
			"img_height": "640",
			"link": window.shareData.sendFriendLink,
			"desc": window.shareData.fContent,
			"title": window.shareData.fTitle
		}, function (res) {
			_report('send_msg', res.err_msg);
		})
	});

	// 分享到朋友圈
	WeixinJSBridge.on('menu:share:timeline', function (argv) {
		WeixinJSBridge.invoke('shareTimeline', {
			"img_url": window.shareData.imgUrl,
			"img_width": "640",
			"img_height": "640",
			"link": window.shareData.timeLineLink,
			"desc": window.shareData.tContent,
			"title": window.shareData.tTitle
		}, function (res) {
			_report('timeline', res.err_msg);
		});
	});

	// 分享到微博
	WeixinJSBridge.on('menu:share:weibo', function (argv) {
		WeixinJSBridge.invoke('shareWeibo', {
			"content": window.shareData.wContent,
			"url": window.shareData.weiboLink
		}, function (res) {
			_report('weibo', res.err_msg);
		});
	});
}, false);
</script>
</body>
</html>
