<?php defined('IN_IA') or exit('Access Denied');?><html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php  echo $detail['shop'];?></title>
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <link href="./source/modules/hotel/template/style/css/hotels.css" rel="stylesheet" type="text/css" />
  </head>
  <body id="hotelsdetail" class="mode_webapp">
	<div class="qiandaobanner">

		<img src="<?php  echo $detail['picture'];?>"  />

	</div>

    <div class="cardexplain">
      <ul class="round">
        <li class="addr">
		  <a href="http://api.map.baidu.com/geocoder?address=<?php  echo $detail['address'];?>&output=html">
            <span><?php  echo $detail['address'];?></span>
		  </a>
        </li>
        <li class="tel">
          <a href="tel:<?php  echo $detail['phone'];?>">
            <span><?php  echo $detail['phone'];?> 电话预订</span>
          </a>
        </li>
      </ul>
      <div class="detailcontent">
        <h2>商家介绍</h2>
        <div class="content"><?php  echo $detail['description'];?></div>
      </div>
    </div>
    <script src="./source/modules/hotel/template/style/js/plugback.js" type="text/javascript"></script>
    <div class="footermenu">
      <ul>
        <li>
          <a href="javascript:history.go(-1);">
            <img src="http://bcs.duapp.com/baeimg/9uKCykhUSh.png" />
            <p>返回</p>
          </a>
        </li>
        <li>
          <a href="<?php  echo $this->createMobileUrl('index', array('rid' => $rid));?>">
            <img src="http://bcs.duapp.com/baeimg/3YQLfzfunJ.png" />
            <p>首页</p>
          </a>
        </li>
        <li>
          <a class="active" href="<?php  echo $this->createMobileUrl('about', array('rid' => $rid));?>">
            <img src="http://bcs.duapp.com/baeimg/xxyX63YryG.png" />
            <p>关于</p>
          </a>
        </li>
        <li>
          <a href="<?php  echo $this->createMobileUrl('record', array('rid' => $rid));?>">
          <?php  if($ordernum!= 0 ) { ?><span class="num" ><?php  echo $ordernum;?></span><?php  } ?>
          <img src="http://bcs.duapp.com/baeimg/s22KaR0Wtc.png" />
          <p>订单</p></a>
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
