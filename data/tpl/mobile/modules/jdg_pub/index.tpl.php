<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
 <style type="text/css">
	body{
		width: 100%; 
		height: 100%;
		overflow: hidden;			
		/*background-image: url(images/nurse.jpg);*/
		background-repeat: no-repeat;
		background-size: cover;
	}
	</style>

<body style="background-image: url(<?php  echo toimage($list['background_img'])?>);">

<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>

	<script type="text/javascript">
	    $(document).ready(function () {
	        // 初始化底部导航栏swipe控件
	        window.navSwipe = new Swipe(document.getElementById('nav-slider'), {
	            continuous: false,
	        });

	        // 底部菜单向前一屏
	        $("nav.app").on('tap', 'span.nav-prev', function (event) {
	            event.preventDefault();
	            navSwipe.prev();
	        });

	        // 顶部菜单向后一屏
	        $("nav.app").on('tap', 'span.nav-next', function (event) {
	            event.preventDefault();
	            navSwipe.next();
	        });
	        $.ajax({
	        	url: "getIndexBgImage.aspx", data: {}, type: "GET",
	        	success: function (data) {
	        		if (data == null || data == undefined) {
	        			$("body").css("background-image", "url(<?php  echo toimage($list['background_img'])?>)");
	        		} else {
	        			$("body").css("background-image", "url(" + data + ")");
	        		}
	        	}, error: function () { $("body").css("background-image", "url(<?php  echo toimage($list['background_img'])?>)"); }
	        });
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
	</script>
		<div style="position: fixed;right: 15px;bottom: 60px;" class="returnBtn">
		<a id="rta" style="display: block;width: 45px;height: 45px;text-align: center;line-height: 45px;border-radius: 50%;-webkit-border-radius: 50%;background: rgba(255,255,255,0.6);color: black;font-weight: bold;font-size: 2em;-webkit-box-shadow: 0 0 10px 0 black;" href="javascript:history.back();"> &lt; </a>
	</div>
</body></html>