<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
<body>
	<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>
	<div id="content">
		<img src="./source/modules/jdg_pub/template/style/invitation-header.jpg" style="display: block; width: 100%;">
		<div class="outer-wrap">
			<div class="inner-wrap" >
				<P>不够嗨?还是把那群叽叽歪歪的哥们闺蜜喊出来，请选择一个雷人的请帖主题：</P>
				<!-- 邀友帖列表 -->
				<ul id="invitation-list">
					<li>
						<a href="<?php  echo $this->createMobileUrl('inviteit',array('id'=>$list['id'],'foo'=>'01'));?>">
							<img src="./source/modules/jdg_pub/template/style/invitation-01.png" />
						</a>
					</li>
					<li>
						<a href="<?php  echo $this->createMobileUrl('inviteit',array('id'=>$list['id'],'foo'=>'02'));?>">
							<img src="./source/modules/jdg_pub/template/style/invitation-02.png" />
						</a>
					</li>
					<li>
						<a href="<?php  echo $this->createMobileUrl('inviteit',array('id'=>$list['id'],'foo'=>'03'));?>">
							<img src="./source/modules/jdg_pub/template/style/invitation-03.png" />
						</a>
					</li>
					<li>
						<a href="<?php  echo $this->createMobileUrl('inviteit',array('id'=>$list['id'],'foo'=>'04'));?>">
							<img src="./source/modules/jdg_pub/template/style/invitation-04.png" />
						</a>
					</li>
					<li>
						<a href="<?php  echo $this->createMobileUrl('inviteit',array('id'=>$list['id'],'foo'=>'05'));?>">
							<img src="./source/modules/jdg_pub/template/style/invitation-05.png" />
						</a>
					</li>
					<li>
						<a href="<?php  echo $this->createMobileUrl('inviteit',array('id'=>$list['id'],'foo'=>'06'));?>">
							<img src="./source/modules/jdg_pub/template/style/invitation-06.png" />
						</a>
					</li>
					<li>
						<a href="<?php  echo $this->createMobileUrl('inviteit',array('id'=>$list['id'],'foo'=>'07'));?>">
							<img src="./source/modules/jdg_pub/template/style/invitation-07.png" />
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- app底部导航栏 END -->

</body>
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
	</script></html>