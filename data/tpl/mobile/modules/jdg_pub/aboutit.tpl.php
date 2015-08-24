<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
<body>
	<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>
	<div id="content">
		<article class="about">
			<img src="<?php  echo toimage($list['header_img'])?>">
			<p><?php  echo $list['txt'];?></p>
		</article>

        <p style="margin:20px 10px 10px;">
        <a href="<?php  echo $map;?>" class="ui-button button-36 button-orange">导 航</a>

           
        </p>

        <p style="margin:10px;">
            <a href="tel:<?php  echo $list['tel'];?>" class="ui-button button-36 button-orange">电话:<?php  echo $list['tel'];?></a>
        </p>

	</div>

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