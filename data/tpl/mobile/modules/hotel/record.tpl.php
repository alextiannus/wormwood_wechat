<?php defined('IN_IA') or exit('Access Denied');?><html>
  <head>
    <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>在线预订管理</title>
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <link href="./source/modules/hotel/template/style/css/hotels.css" rel="stylesheet" type="text/css" />
  </head>
  <body id="hotelslist" class="mode_webapp">
    <div class="qiandaobanner">

        <img src="<?php  echo $pic['picture'];?>" />

    </div>
	
    <div class="cardexplain">

	  <?php  if($ordernum == 0 ) { ?>
	  
	  <div class="detailcontent">
        <h2>提示</h2>
        <div class="content" style="text-align:center" >您目前还没有订单</div>
      </div>
	  
	  <?php  } else { ?>
	  
	  
	  <?php  if(is_array($reply)) { foreach($reply as $item) { ?>
      <ul class="round">
        <li class="title">
          
            <span><?php  echo date("m月d日 H点i分",$item['time']); ?>订单详情
            <?php  if($item['status']==0) { ?><em class="no">未处理</em><?php  } else if($item['status']==1) { ?>
			<em class="ok">成功</em><?php  } else { ?>
			<em class="error">失败</em><?php  } ?>
			</span>
          
        </li>
		
        <li>
		  <a href="<?php  if ($item['status']==0) echo $this->createMobileUrl('orderdetail', array('id' => $item['id'],'rid' => $item['rid'])); else echo $this->createMobileUrl('orderinfo', array('id' => $item['id'],'rid' => $item['rid'])); ?> ">
          <div class="text">
            <p>
              <span>预约商家：<?php  echo $item['shop'];?></span>
            </p>
            <p>
              <span>类型：<?php  echo $item['style'];?></span>
            </p>
            <p>
              <span>预订数量：<?php  echo $item['nums'];?>间</span>
            </p>
            <p>
              <span>到店日期：<?php  echo date("m月d日",$item['btime']); ?></span>
            </p>
          </div>
		  </a>
        </li>
      </ul>
	  
	  <?php  } } ?>

	  <?php  } ?>
    </div>
	
    <span><script src="./source/modules/hotel/template/style/js/plugback.js" type="text/javascript"></script></span>
    
	<div class="footermenu">
      <ul>
        <li>
          <span>
            <a href="javascript:history.go(-1);">
              <img src="http://bcs.duapp.com/baeimg/9uKCykhUSh.png" />
              <p>
                <span>返回</span>
              </p>
            </a>
          </span>
        </li>
        <li>
          <span>
            <a href="<?php  echo $this->createMobileUrl('index', array('rid' => $rid));?>">
              <img src="http://bcs.duapp.com/baeimg/3YQLfzfunJ.png" />
              <p>
                <span>首页</span>
              </p>
            </a>
          </span>
        </li>
        <li>
          <span>
            <a href="<?php  echo $this->createMobileUrl('about', array('rid' => $rid));?>">
              <img src="http://bcs.duapp.com/baeimg/xxyX63YryG.png" />
              <p>
                <span>关于</span>
              </p>
            </a>
          </span>
        </li>
        <li>
          <span>
            <a class="active" href="<?php  echo $this->createMobileUrl('record', array('rid' => $rid));?>">
            <?php  if($ordernum!= 0 ) { ?><span class="num" ><?php  echo $ordernum;?></span><?php  } ?>
            <img src="http://bcs.duapp.com/baeimg/s22KaR0Wtc.png" />
            <p>订单</p></a>
          </span>
        </li>
      </ul>
    </div>
    <script type="text/javascript">
document.addEventListener(&#39;WeixinJSBridgeReady&#39;, function onBridgeReady() {
WeixinJSBridge.call(&#39;hideToolbar&#39;);
});
</script>
  </body>
</html>
