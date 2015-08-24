<?php defined('IN_IA') or exit('Access Denied');?><html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>在线预订</title>

<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">

<meta name="apple-mobile-web-app-capable" content="yes">

<meta name="apple-mobile-web-app-status-bar-style" content="black">

<meta name="format-detection" content="telephone=no">

<link href="./source/modules/hotel/template/style/css/hotels.css" rel="stylesheet" type="text/css">

</head>

<body id="hotels"  class="mode_webapp">

	<div class="qiandaobanner">

		<img src="<?php  echo $row['picture'];?>"  />

	</div>

<div class="cardexplain"> 

	<ul class="round">

		<li>
		
			<a href="<?php  echo $this->createMobileUrl('record', array('rid' => $rid));?>">
			
				<span>我的订单<?php  if($ordernum!= 0 ) { ?><em class="ok"><?php  echo $ordernum;?></em><?php  } ?></span>
			
			</a>
		
		</li>

	</ul>
  
	<ul class="round">

		<li class="title"><span class="none"><?php  echo $row['shop'];?></span></li>

			<li class="biaotou">

				<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr><td>类型</td><td class="yuanjia">原价</td><td class="youhuijia">优惠价</td></tr>

				</table>

			</li>
			
			
			<?php  if(is_array($style)) { foreach($style as $item) { ?>

			<li class="dandanb">

				<a href="<?php  echo $this->createMobileUrl('order', array('id' => $item['id'],'rid' => $item['rid']));?>">
				
					<span>

						<table class="jiagebiao" width="100%" border="0" cellspacing="0" cellpadding="0">

							<tr>
							
								<td>
								
									<img src="<?php  echo $_W['attachurl'] . $item['thumb']; ?>" class="showimg">

									<div><?php  echo $item['style'];?></div>

								</td>
								
								<td class="yuanjia">￥<?php  echo $item['oprice'];?></td>
								
								<td class="youhuijia">￥<?php  echo $item['cprice'];?></td>
							
							</tr>

						</table>
					
					</span>
				
				</a>

			</li>
			
			<?php  } } ?>
			
	</ul>


	<div class="detailcontent">

		<h2>订单说明</h2>

		<div class="content"><?php  echo $row['content'];?></div>

	</div>
    

	<ul class="round">

		<li class="addr">

			<a href="http://api.map.baidu.com/geocoder?address=<?php  echo $row['address'];?>&output=html"><span><?php  echo $row['address'];?></span></a>

		</li>

		<li class="tel">

			<a href="tel:<?php  echo $row['phone'];?>"><span><?php  echo $row['phone'];?> 电话预订</span></a>

		</li>

		<li class="detail">

			<a href="<?php  echo $this->createMobileUrl('about', array('rid' => $rid));?>"><span>查看商家详情</span></a>

		</li>

	</ul>

</div>

<script src="./source/modules/hotel/template/style/js/plugback.js" type="text/javascript" type="text/javascript"></script>

<div class="footermenu">

    <ul>
	
		<li>
		
				<a href="javascript:history.go(-1);">
				
				<img src="http://bcs.duapp.com/baeimg/9uKCykhUSh.png">
				
				<p>返回</p>
				
				</a>
				
		</li>
		
		<li>
		
				<a class="active" href="<?php  echo $this->createMobileUrl('index', array('rid' => $rid));?>">
				
				<img src="http://bcs.duapp.com/baeimg/3YQLfzfunJ.png">
				
				<p>首页</p>
			   
				</a>
				
		</li>
		
		<li>
				
				<a href="<?php  echo $this->createMobileUrl('about', array('rid' => $rid));?>">
				
				<img src="http://bcs.duapp.com/baeimg/xxyX63YryG.png">
				
				<p>关于</p>
				
				</a>
				
		</li>

		<li>
				
				<a href="<?php  echo $this->createMobileUrl('record', array('rid' => $rid));?>">
				
				<?php  if($ordernum!= 0 ) { ?><span class="num" ><?php  echo $ordernum;?></span><?php  } ?>
				
				<img src="http://bcs.duapp.com/baeimg/s22KaR0Wtc.png">
				
				<p>订单</p>
				
				</a>
				
		</li>
	
    </ul>
	
</div>

<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
WeixinJSBridge.call('hideToolbar');
});
</script>

</body>
</html>
