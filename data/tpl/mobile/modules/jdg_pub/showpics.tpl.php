<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
	<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/dawn-gallery.css" />
	<link rel="stylesheet" href="./source/modules/jdg_pub/template/style/ionicons.min.css" />
	<script type="text/javascript" src="./source/modules/jdg_pub/template/style/simplemodal.min.js"></script>
	<script type="text/javascript" src="./source/modules/jdg_pub/template/style/lazyload.js"></script>
    <script src="./source/modules/jdg_pub/template/style/jquery.form.min.js"></script>
    
            
	<style type="text/css">
		/*页面头部样式*/
		body >header{
			height: 45px;
			background-color: rgba(255,255,255,0.2);
		}
		body >header p.title{
			color: white;
			font-size: 20px;
			line-height: 45px;
			text-align: center;
		}
		body >header span{
			color: white;
			font-size: 35px;
			position: absolute;
			top: 5px;
			right: 10px;
		}
	</style>
</head>
<body>
	<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>

	<!-- 相册查看弹出层 -->
	<div id="slider-view" class="slider-view beauty-slider-view">
		<div id="slider" class="swipe">
			<div class="swipe-wrap dawn-gallery-theme-a">
			<?php  if(is_array($listall)) { foreach($listall as $key => $row) { ?>
				<div class="slider-item dawn-gallery-item-details" data-index="<?php  echo $key;?>">
					<!-- 这里面是大图（原图） -->
					<img data-img-src="<?php  echo toimage($row['img_url'])?>" src="">
					<div class="descripe">
						<p class="nickname"><?php  echo $row['user_name'];?></p>
					</div>
				</div>
			<?php  } } ?>
			</div>
		</div>
		<div class="slider-img-loading" style="display: none">
			<i class="icon ion-loading-c"></i>
		</div>
	</div>
	<header>
		<p class="title">相册</p>
		<!-- 点击上传照片 -->
		<span class="add-photo">+</span>
	</header>
	<div id="content">
		<div id="beauty-gallery" class="dawn-gallery clearfix">
			<!-- 此处为瀑布流布局，相册分为左右两栏，后台填充数据时，左边放一个，然后右边一次，左右交替； -->

			
			<div class="left">
				<?php  if(is_array($list_left)) { foreach($list_left as $row) { ?>
                <div class="dawn-gallery-item"  data-id="<?php  echo $row['id'];?>">
					<!-- 小图懒加载，请剪裁图片宽度到300px，高度按比例缩放 -->
					<img class="lazyload" data-original="<?php  echo toimage($row['smallimg_url'])?>" />
					<div>
						<!-- 昵称 -->
						<span class="nickname"><?php  echo $row['user_name'];?></span>
						<!-- 点赞人数 -->
						<!-- 如果当前用户对此照片已点赞，则加上liked的类名 -->

						<p class="like-count "data-id="<?php  echo $row['id'];?>"><span></span><span><?php  echo $row['likeit'];?></span></p>
					</div>
				</div>
				<?php  } } ?>
			</div><!-- left -->
			<div class="right">
				<?php  if(is_array($list_right)) { foreach($list_right as $row) { ?>
                <div class="dawn-gallery-item"  data-id="<?php  echo $row['id'];?>">
				    <img class="lazyload" data-original="<?php  echo toimage($row['smallimg_url'])?>" />
				    <div>
						<!-- 昵称 -->
						<span class="nickname"><?php  echo $row['user_name'];?></span>
						<!-- 点赞人数 -->
						<!-- 如果当前用户对此照片已点赞，则加上liked的类名 -->

						<p class="like-count " data-id="<?php  echo $row['id'];?>"><span></span><span><?php  echo $row['likeit'];?></span></p>
					</div>
			    </div>
			    <?php  } } ?>
			</div><!-- right -->

		</div>
		<!-- 照片大图 -->
		<!-- 超过20个项目则分页 -->
		
		<div id="page-ctrl-wrap">
			<?php  echo $pager;?>
            		</div>


		<!-- 上传照片的模态窗口 -->
		<div id="upload-modal">
			<header>
				<p>上传照片</p>
				<div class="simplemodal-close">×</div>
			</header>
			<form id="form1" action="" method="post" enctype="multipart/form-data">
				<p id="filepath">请浏览本地照片，并选择</p>
				<!-- 加wrap，覆盖浏览器的文件上传样式 -->
				<div id="input-file-wrap">
					<p>浏览</p>
					<input id="browse" type="file" value="浏览" accept="image/*" name="imgFile"  />
				</div>
                <input type="hidden" value="<?php  echo $list['id'];?>" id="pubid" name="pubid" />
				<input type="submit" value="上传" id="btn-upload" />
			</form>
		</div>

	</div>	
		<!-- <script type="text/javascript" src="./source/modules/jdg_pub/template/style/dawn-gallery.js"></script> -->

	<script type="text/javascript">
	    $(function () {
	        // 图片懒加载
	        $('.lazyload').lazyload();

	        $("#browse").change(function () {
	            var filePath = $(this).val();

	            $("p#filepath").text(filePath);
	        });

            // 上传按钮点按
	        $("#btn-upload").click(function () {
	            var val = $("#browse").val();
	            if (!val) {
	                showToastInfo("请选择要上传的文件");
	                return false;
	            }

	            if ($(this).hasClass("disabled")) {
	                return false;
	            }

                // 禁用，避免连续点击
	            $(this).addClass("disabled");
	            $(this).val("上传中...");

	            var url = "<?php  echo $this->createMobileUrl('imgUpload');?>"+'&id='+$('#pubid').val();

	            $("#form1").ajaxSubmit({
	                type: "post",
	                url: url,
	                dataType: "json",
	                success: function (jd) {
	                    // 取消禁用
	                    $("#btn-upload").removeClass("disabled");
	                    $("#btn-upload").val("上传");
	                    if (jd.IsActionSuccess) {
	                        showToastInfo("上传成功");
	                        setTimeout("window.location.reload()", 1500);

	                    } else {
	                        showToastInfo(jd.ActionMsg);
	                    }

	                }
	            });

	            return false;
	        });

	        // 点赞
	        $(".like-count").on('tap', function (event) {
	            event.preventDefault();
	            var url = "<?php  echo $this->createMobileUrl('showpics',array('foo'=>'likeit'))?>";
	            var pid = $(this).attr("data-id");

                // 点赞的数字
	            var span = $(this).find('span').eq(1);
	            var p = $(this);
	            if ($(this).hasClass('liked')) {
	                p.toggleClass('liked');
	                span.text(span.text() - 0 - 1);
	                if (span.text() - 0 == 0) {
	                    span.text("");
	                }

	                var data = {
	                    pid:pid,
	                };

	                $.post(url, data, function (jd) {
	                    if (jd.IsActionSuccess) {
	                    } else {
	                        showToastInfo(jd.ActionMsg);
	                    }
	                },'json');
	            } else {
	                p.toggleClass('liked');
	                span.text(span.text() - 0 + 1);
	                var data = {
	                    pid:pid,
	                };

	                $.post(url, data, function (jd) {
	                    if (jd.IsActionSuccess) {
	                    } else {
	                        showToastInfo(jd.ActionMsg);
	                    }
	                },'json');
	            }
	        });

	        // 上传照片
	        // 上传完后刷新页面，将用户上传的照片置顶，即照片按上传时间降序排列（此后来居上也）
	        $("header span.add-photo").on('click', function (event) {
	            event.preventDefault();
	            event.stopPropagation();

	            $("#upload-modal").modal({
	                "overlayClose": true,
	                "opacity": 80
	            });
	        });
	    });
	</script>
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