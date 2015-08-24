<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/ionicons.min.css">
	<script type="text/javascript" src="./source/modules/jdg_pub/template/style/simplemodal.min.js"></script>
	<script type="text/javascript" src="./source/modules/jdg_pub/template/style/nearby.js"></script>
		<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/dawn-gallery.css" />

	<script type="text/javascript" src="./source/modules/jdg_pub/template/style/dawn-gallery.js"></script>
	

    <style type="text/css">
   /*li .to-left span{
	background-image: url(./source/modules/jdg_pub/template/style/icon-to-left.png);
	background-repeat: no-repeat;
	background-size: 40px;
	background-position: 50% 50%;
	}*/
    </style>
<body>
<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>
	<div class="content">

		<!-- 12小时邻座的TA START -->
		<section id="people-nearby">
			<p>12小时邻座的TA</p>
	
			<!-- 头像slider START -->
			<div id="headimg-slider" data-item="three" class="swipe">

				<div class="swipe-wrap">


					<!-- slider单元 START -->
					<div class="swipe-item">
						<!-- 上部分，3个头像 START -->
						<!-- 特别说明：此处为盒子布局，每ul下面必须有3个li，就算li是空的，也必须占位 -->
						<ul class="upside">
							<!-- 即将入座的用户，先显示默认用户 -->
							
							<?php  if(is_array($list_upside)) { foreach($list_upside as $row) { ?>
							<?php  $updown=$updown+1; if($updown%2==1){?>
						            <li>
							            <img class="headimg" src="<?php  echo toimage($row['head_img'])?>" data-phone="<?php  echo $row['phone'];?>" data-wxid="<?php  echo $row['wx'];?>" />
							            <!-- 昵称 -->
							            <p class="nickname"><?php  echo $row['user_name'];?></p>
						            </li>
						            <?php  } ?>
						         <?php  } } ?>
						</ul>
						<!-- 上部分，3个头像 START -->

						<!-- 下部分，3个头像 START -->
						<?php  if(count($list_upside)>1 ) { ?>
						<ul class="downside">
							<!-- 即将入座的用户，先显示默认用户 -->
							<?php  $updown =0;?>
								<?php  if(is_array($list_upside)) { foreach($list_upside as $row) { ?>
							<?php  $updown=$updown+1; if($updown%2==0){?>
						            <li>
							            <img class="headimg" src="<?php  echo toimage($row['head_img'])?>" data-phone="<?php  echo $row['phone'];?>" data-wxid="<?php  echo $row['wx'];?>" />
							            <!-- 昵称 -->
							            <p class="nickname"><?php  echo $row['user_name'];?></p>
						            </li>
						            <?php  } ?>
						         <?php  } } ?>
						</ul>
						<?php  } ?>
						<!-- 下部分，3个头像 START -->
					</div>
				</div><!-- swipe-wrapr -->

			</div><!-- headimage-slider -->			

			<!-- 控制器，控制slider左右滑动和用户就坐 -->
			
			<ul class="controller">
				<li class="to-left"></li>
				<?php  if(empty($ifin)) { ?>
				<li class="add"></li>
				<?php  } ?>
				<li class="to-right"></li>
			</ul>
	
			<label><?php  if(empty($ifin)) { ?>我要就坐<?php  } else { ?>您已就坐<?php  } ?></label>

			<!-- 首次就坐时需要题写表单 -->
			<form id="sitting-form" style="display: none">
				<div class="simplemodal-close">×</div>
				<legend>首次就坐需要完善如下信息用于他人联系，24小时后将隐藏。</legend>
				<!-- 姓名 -->
				<input type="tel" id="tel" name="tel" placeholder="手机号"/>
				<!-- 微信号 -->
				<input type="text" id="wx-id" name="wx-id" placeholder="微信号"/>
				<input type="submit" value="提交" />
			</form>

			<div id="usr-contact">
				<p>
					<span>手机号：</span>
					<a id="usr-phone" href=""></a>
				</p>
				<p>
					<span>微信号：</span>
					<a href="#" id="usr-id"></a>
				</p>
			</div>
		</section>
		<!-- 12小时邻座的TA END -->

		<!-- 邻座心语 START -->
		<section id="wish">
			<p>邻座心语</p>

			<!-- 成功提交心语后，应立即将新发表的心语置顶 -->
			<form id="wish-form" action="###">
				<textarea id="my-wish" name="my-wish" placeholder="我要发表心语（就坐后才可以发心语哦）" disabled="true"></textarea>
				<input type="submit" value="提交" />
			</form>

			<div class="article-wrap">
			<?php  if(is_array($list_comment)) { foreach($list_comment as $row) { ?>
				<!-- 一条心语 START -->
				<article>
					<!-- 头像，居左 -->
					<img class="headimg" src="<?php  echo toimage($row['head_img'])?>">

					<!-- 文字，居右 -->
					<div class="text">
						<p class="caption">
							<!-- 昵称 -->
							<span class="nickname"><?php  echo $row['user_name'];?></span>
							<span><?php  echo date('Y-m-d H:i:s',$row['createtime'])?></span>
						</p>
						<!-- 心语正文 -->
						<p class="content">
							<?php  if($row['isok']==0&&$config==1) { ?>
							等待审核<?php  } else { ?><?php  echo $row['txt'];?><?php  } ?>
						</p>
					</div>
				</article>
				<!-- 一条心语 END -->
				<?php  } } ?>
				<div id="page-ctrl-wrap">
				<!-- 照片大图 -->
		<!-- 超过20个项目则分页 -->
			<?php  echo $pager;?>
            		</div>
				<div class="loading">
					<i class="icon ion-ios7-reloading"></i>
				</div>
			</div>
		</section>
		<!-- 邻座心语 END -->
	</div>

    <!-- 需要改动 -->
    <input type="hidden" value="<?php  echo $this->createMobileUrl('chatit',array('foo'=>'inseat'))?>" id="myurl" name="myurl" />
    <input type="hidden" value="<?php  echo $this->createMobileUrl('chatit',array('foo'=>'comment'))?>" id="myurl_1" name="myurl_1" />
    <input type="hidden" value="<?php  echo $list['id'];?>" id="id" name="id">
    <input type="hidden" value="<?php  if(empty($ifin)) { ?>0<?php  } else { ?>1<?php  } ?>" id="inseat" name="inseat">
    <input type="hidden" value="<?php  echo $user['nickname'];?>" id="wx-nickname" name="wx-nickname">
    <input type="hidden" value="<?php  echo $user['headimgurl'];?>" id="wx-headimg" name="wx-headimg">
	<!-- 心语模板 -->
	<script id="wish-article-template" type="text/template">
		<article>
			<!-- 头像，居左 -->
			<img class="headimg" src="">

			<!-- 文字，居右 -->
			<div class="text">

				<p class="caption">
					<!-- 昵称 -->
					<span class="nickname"></span>
					<span>，刚刚</span>
				</p>

				<!-- 心语正文 -->
				<p class="content"></p>
			</div>
		</article>
	</script>
</body>
 	<script type="text/javascript">
 	 $(function () {
 	 	      // 上传按钮点按
	        $(".to-left").click(function () {
	        	var  upindex= <?php  echo $upindex;?>;
				
	        if(upindex>1){
	        	upindex=upindex-1;
	        	 window.location.href="<?php  echo $this->createMobileUrl('chatit',array('id'=>$list['id']));?>"+"&ipage="+upindex;
	        }else{
	        	alert("这是首页");
	        }
	    	
	        });
	       
	         $(".to-right").click(function () {
	         	var upindex = <?php  echo $upindex;?>;
				var  size=<?php  echo $usize;?>;
				
	         	 if((upindex*size)<<?php  echo $utotal;?>){
	         	 	upindex=upindex+1;
	         	 	window.location.href="<?php  echo $this->createMobileUrl('chatit',array('id'=>$list['id']));?>"+"&ipage="+upindex;
	         	 }else{
	        		alert("这是最后一页");
	       		 }
	    		
	        });
 	 })
 
		function onBridgeReady() {
			WeixinJSBridge.call('hideOptionMenu');
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