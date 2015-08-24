<?php defined('IN_IA') or exit('Access Denied');?><!--<!DOCTYPE html>-->
<!-- saved from url=(0067)http://vc.softcomz.com/nightclubui/cabinet.aspx?oid=gh_e5f739c3f550 -->
<!--<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>微夜店</title>
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
	<meta content="telephone=no" name="format-detection">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/reset.css">
	<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/bar.css">
	
	
</head>-->
<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/dawn-gallery.css">
	<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/ionicons.min.css">
<?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
<body>
	<!-- app底部导航栏 START -->
	
<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>
	<!-- app底部导航栏 END -->
	<!-- 相册查看弹出层 -->
	<div id="slider-view" class="slider-view" style="display: none; height: 919px; width: 930px;">
		<div id="slider" class="swipe" style="visibility: visible;">
			<div class="swipe-wrap dawn-gallery-theme-a" style="width: 0px;">
				<?php  if(is_array($Winlist)) { foreach($Winlist as $row) { ?>
				<div class="slider-item dawn-gallery-item-details" data-index="0" style="left: 0px; transition: 0ms; -webkit-transition: 0ms; -webkit-transform: translate(0px, 0px) translateZ(0px); height: 919px; width: 0px; line-height: 919px;">
					<img data-img-src="<?php  echo $row['thumb'];?>" src="<?php  echo $row['thumb'];?>">
					<div class="descripe">
						<p class="clearfix">
							<span class="title"><?php  echo $row['title'];?></span>
							<span class="price">￥1288.00</span>
						</p>
						<p><!-- 描述文字，忘记实现了 --></p>
					</div>
				</div>
				<?php  } } ?>
			
				
			</div>	
		</div>
		<div class="slider-img-loading" style="display: none">
			<i class="icon ion-loading-c"></i>
		</div>
	</div>
	<div id="content">
		<!-- 顶部导航栏 START-->
		<div class="tab-links-wrap">
			<ul class="tab-links clearfix">                
				<li <?php  if($wineid==1 ) { ?>class="active"<?php  } ?>>
					<a href="<?php  echo $this->createMobileUrl('Wineark',array('wineid'=>'1','id'=>$list['id']));?>">全部</a>
				</li>
				<li <?php  if($wineid==2 ) { ?>class="active"<?php  } ?> >
					<a href="<?php  echo $this->createMobileUrl('Wineark',array('wineid'=>'2','id'=>$list['id']));?>">小吃</a>
				</li>
				<li <?php  if($wineid==3 ) { ?>class="active"<?php  } ?> >
					<a href="<?php  echo $this->createMobileUrl('Wineark',array('wineid'=>'3','id'=>$list['id']));?>">酒水</a>
				</li>
			</ul>
		<!-- 顶部导航栏 END-->			
		</div>
		<!-- 所有酒品 START -->
		<!-- 超过20个酒品，请做分页 -->
		<div class="dawn-gallery dawn-gallery-theme-a clearfix">
			<!-- 此处酒所用图片为响应式设计，方形尺寸，300*300大小 -->
			<?php  if(is_array($Winlist)) { foreach($Winlist as $row) { ?>
			<div class="dawn-gallery-item" data-id="1">
				
			
			<!--<a href="http://www.jiaduiguo.net/mobile.php?act=module&id=<?php  echo $row['id'];?>&name=shopping&do=detail&weid=<?php  echo $row['weid'];?>">-->
			<a href="<?php  echo create_url('mobile/module/detail', array('weid' => $row['weid'],'id'=>$row['id'],'name'=>'shopping'));?>">
				<img class="lazyload" data-original="#" src="<?php  echo $_W['attachurl'];?><?php  echo $row['thumb'];?>" style="display: block;">
				</a>
				<p style="white-space:nowrap;text-overflow:ellipsis;">
					<span class="title" style="white-space:nowrap;text-overflow:ellipsis;"><?php  echo $row['title'];?></span>
					<span class="price">￥<?php  echo $row['marketprice'];?></span>
				</p>
			</div>
			<?php  } } ?>
			
		<!-- 超过20个酒品则分页 -->
		<div id="page-ctrl-wrap">
				<!-- 照片大图 -->
		<!-- 超过20个项目则分页 -->
			<?php  echo $pager;?>
            		</div>
		<!-- 所有酒品 END -->
	</div>

	<script type="text/javascript" src="./source/modules/jdg_pub/template/style/lazyload.js"></script>

	<script type="text/javascript" src="./source/modules/jdg_pub/template/style/dawn-gallery.js"></script>

	<script type="text/javascript">
	    $(function () {
	        // 图片懒加载
	        $('.lazyload').lazyload();
	    });
	</script>

 	<script type="text/javascript">
		function onBridgeReady() {
			WeixinJSBridge.call('showOptionMenu');
		}

		if (typeof WeixinJSBridge == "undefined") {
			if (document.addEventListener) {
				document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
			} else if (document.attachEvent) {
				document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
				document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
			}
		} else {
			onBridgeReady();
		}
	</script></body></html>