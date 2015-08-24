<?php defined('IN_IA') or exit('Access Denied');?><html><head>
	<meta charset="utf-8">
	<title>首页</title>
	<meta name="viewport" id="viewport" content="width=device-width, height=931, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">

	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/common.min.css?v=1.0">	
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/home.css?v=1.4" />	
	<script type="text/javascript" src="<?php echo RES;?>js/jQuery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/wei_canyin.css" media="all" />

	
</head>
<body>
	
  <section id="page-index" class="__page__" style="display: block;">
		<div class="header">
			<p><?php  echo $set['shop_name'];?></p>
		</div>
		<div id="page-index-content">
			<div id="scroller1" style="-webkit-transition: 200ms cubic-bezier(0.1, 0.57, 0.1, 1); transition: 200ms cubic-bezier(0.1, 0.57, 0.1, 1); -webkit-transform: translate(0px, 0px) translateZ(0px);">
				<div id="slider">
					<?php  if(is_array($set['thumbArr'])) { foreach($set['thumbArr'] as $row) { ?>
					<img src="<?php  echo $row;?>" style="width:100%;height:auto;min-height:200px;">			
					<?php  } } ?>
  				</div>
				
				<div class="lewaimai-layout">
					<div class="lewaimai-title">
						<p>公告</p>
					</div>
					<div class="notice-content">
						<p><?php  echo $set['shop_notice'];?></p>
					</div>
				</div>
				
				<!--div id="hotfood" class="index-btn">
					<p>热卖排行</p>
				</div>
								
										
				<div id="message" class="index-btn">
					<p>店铺留言</p>
				</div-->
				
							 	
				<div class="lewaimai-layout">
					<div class="lewaimai-title">
						<p>店铺信息</p>
					</div>
					<div class="shopinfo-content">
						<div id="gogooglemap" class="shopinfo-item">
								<p class="shopinfo-name">店铺地址：</p>
								<p class="shopinfo-value"><a href="http://api.map.baidu.com/marker?location=<?php  echo $set['lat'];?>,<?php  echo $set['lng'];?>&title=<?php  echo $set['shop_name'];?>&name=<?php  echo $set['shop_name'];?>&content=<?php  echo $set['shop_address'];?>&output=html&src=weiba|weiweb"><?php  echo $set['shop_address'];?></a></p>
								<div class="arrow-right arrow-position"></div>
							</div>
												
						<div class="shopinfo-item">
							<p class="shopinfo-name">电话：</p>
							<p class="shopinfo-value"><a href="tel:<?php  echo $set['shop_tel'];?>"><?php  echo $set['shop_tel'];?></a></p>
						</div>
					</div>
				</div>
				
			 
				<div style="height: 80px;"></div>
			 </div>
		</div>
	</section>
		<div id="footer_menu" class="footer footer_menu">
            <ul class="clear">
				<li><a href="<?php  echo  $this->createMobileUrl('wlgenius')?>" ><span class="icons icons_1"></span><label>智能选餐</label></a></li>				
				<li><a  href="<?php  echo  $this->createMobileUrl('wlindex')?>" ><span class="icons icons_2"></span><label>点菜</label></a></li>
				<li><a href="<?php  echo  $this->createMobileUrl('wlmember')?>" ><span class="icons icons_3"></span><label>我的订单</label></a></li>
                <li><a href="<?php  echo  $this->createMobileUrl('wlmylike')?>" ><span class="icons icons_4"></span><label>我喜欢</label></a></li>
                <li><a href="<?php  echo  $this->createMobileUrl('wlmylike')?>" id="my_menu"><span class="icons icons_5"><label id="num" class="num"><?php  echo $totalnum;?></label></span></a></li>
            </ul>
        </div>
</div>
        <script>
			$("a").click(function(){
				MLoading.show('加载中');
			});	
        </script>
 


</body></html>