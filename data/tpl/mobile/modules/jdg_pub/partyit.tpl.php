<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
<body>
<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>
	<div class="content">
		<!-- 派对时间轴 START -->
		<div class="party-time-axis">
			<!-- 时间轴左边信息栏 START -->
			<div class="box-1">
			<?php  if(is_array($listall)) { foreach($listall as $row) { ?>
				<div class="party-brief">
					<p class="party-date"><?php  echo date('Y.m.d',$row['begintime'])?></p>
					<p class="party-subject"><?php  echo $row['title'];?></p>
					<!-- 时间轴上的红色小圆点 -->
					<div class="dot"></div>
				</div>
				<?php  } } ?>
			</div>
			<!-- 时间轴左边信息栏 END -->
			<!-- 时间轴右边海报栏 START -->
			<div class="box-2">
			<?php  if(is_array($listall)) { foreach($listall as $row) { ?>
				<div class="party-post">
					<a href="<?php  echo $this->createMobileUrl('partydetailit',array('pid'=>$row['id'],'id'=>$id))?>">
						<img src="<?php  echo toimage($row['cover'])?>">
					</a>
				</div>
				<?php  } } ?>
			</div>
			<!-- 时间轴右边海报栏 END -->
		</div>
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