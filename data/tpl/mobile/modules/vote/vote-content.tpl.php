<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
		<meta http-equiv="Cache-Control" content="no-cache"> 
        <title>Vote</title>
        <link type="text/css" rel="stylesheet" href="./source/modules/vote/style/vote.css" />
        <script type="text/javascript" src="./source/modules/vote/style/js/jquery.js"></script>
        <script type="text/javascript" src="./source/modules/vote/style/js/alert.js"></script>

        <script type="text/javascript">

            document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
                window.shareData = {
                    "imgUrl": "<?php  echo $shareimg;?>",
                    "timeLineLink": "<?php  echo $sharelink;?>",
                    "sendFriendLink": "<?php  echo $sharelink;?>",
                    "weiboLink":  "<?php  echo $sharelink;?>",
                    "tTitle":  "<?php  echo $sharetitle;?>",
                    "tContent": "<?php  echo $sharedesc;?>",
                    "fTitle":  "<?php  echo $sharetitle;?>",
                    "fContent": "<?php  echo $sharedesc;?>",
                    "wContent": "<?php  echo $sharedesc;?>",
                };
                // 发送给好友
                WeixinJSBridge.on('menu:share:appmessage', function (argv) {
                    WeixinJSBridge.invoke('sendAppMessage', {
                        "img_url": window.shareData.imgUrl,
                        "img_width": "640",
                        "img_height": "640",
                        "link": window.shareData.sendFriendLink,
                        "desc": window.shareData.fContent,
                        "title": window.shareData.fTitle
                    }, function (res) {
                        _report('send_msg', res.err_msg);
                    })
                });
                alert( window.shareData.tTitle);
                // 分享到朋友圈
                WeixinJSBridge.on('menu:share:timeline', function (argv) {
                    WeixinJSBridge.invoke('shareTimeline', {
                        "img_url": window.shareData.imgUrl,
                        "img_width": "640",
                        "img_height": "640",
                        "link": window.shareData.timeLineLink,
                        "desc": window.shareData.tContent,
                        "title": window.shareData.tTitle
                    }, function (res) {
                        _report('timeline', res.err_msg);
                    });
                });

                // 分享到微博
                WeixinJSBridge.on('menu:share:weibo', function (argv) {
                    WeixinJSBridge.invoke('shareWeibo', {
                        "content": window.shareData.wContent,
                        "url": window.shareData.weiboLink,
                    }, function (res) {
                        _report('weibo', res.err_msg);
                    });
                });
            }, false)




            var votetype = "<?php  echo $reply['votetype'];?>";
            function divClick(obj) {
                obj = $(obj);

                if (votetype == '0') {
                    //单选
                    $(".oimg").show();
                    $(".oimg-sel").hide();
                    $(".option").attr("sel", "false");
                }
                var sel = obj.attr("sel");
                if (sel == "false") {
                    obj.attr("sel", "true");
                    $(".oimg-sel", obj).show();
                    $(".oimg", obj).hide();
                }
                else {
                    obj.attr("sel", "false");
                    $(".oimg-sel", obj).hide();
                    $(".oimg", obj).show();
                }
            }
            function submit() {

                var ids = "";
                $(".option").each(function() {
                    if ($(this).attr("sel") === "true") {
                        if (ids !== "") {
                            ids += ",";
                        }
                        ids += $(this).attr("val");

                    }
                });
                if (ids == '') {
                    alert('Please Choose One Singer to Vote!');
                    return;
                }
                $.ajax({
                    url: "<?php  echo $this->createMobileUrl('submit', array('id' => $rid))?>",
                    data: {
                        t: Math.random(),
                        ids:ids ,
                        id:"<?php  echo $rid;?>",
                        from_user:"<?php  echo $from_user;?>"
                    },
                    beforeSend: function () {
                       $(".submit").attr("disabled","true");
                    },
                    success: function (data) {
                        
                       if(data!=''){
                           alert(data);
                           return;
                       }
                       alert("vote sucess!");
                       $(".submit").removeAttr("disabled");
                       setTimeout(function(){
                           location.href="<?php  echo $this->createMobileUrl('result', array('id' => $rid))?>";
                           
                       },500);
                    },
                    error: function () {
                        
                    },
                    timeout: 15000
                });
			 
      

            }
        </script>
    </head>
    <body>
        <div class="wrapper" style="margin-top:-8px;">
            <img class="bg" src="./source/modules/vote/style/images/bg.jpg">
            <input type='hidden' name='select_id' />
            <div class="top fn-clear">

                <div class="title-cont">
                    <p class="title"><?php  echo $reply['title'];?></p>
                    <p class="timeout" style='padding-left:15px;'><img class="clock" src="./source/modules/vote/style/images/clock.png"><span class="text"><?php  echo $limits;?></span></p>
                    <p>&nbsp;</p>
                </div>
            </div>
            <?php  if(!empty($reply['thumb'])) { ?>
            <div class="cover">
                <img class="line" src="./source/modules/vote/style/images/ctline.jpg">
                <img class="cimg" src="<?php  echo img_url($reply['thumb'])?>">
                <img class="line" src="./source/modules/vote/style/images/cbline.jpg">
            </div>
            <?php  } ?>


            <?php  if($isshare==1) { ?>
                <div class="summary">参与方法:</div>
                <div class="tip-cont"><?php  echo htmlspecialchars_decode($reply['share_txt'])?></div>
	<div class="option-cont">
    
             <?php  if(is_array($list)) { foreach($list as $row) { ?>
		<div class="option fn-clear option-statis" data-value="0">
                     <?php  if(!empty($row['thumb']) && $reply['isimg']==1) { ?>
					 <div style="text-align: center;">
                    <div><image class="lazy" src="./resource/script/grey.gif" style="width:100%;margin:10px 0;" data-original="<?php  echo $_W['attachurl'];?><?php  echo $row['thumb'];?>" /></div></div>
                    <?php  } ?>
				
			<div><div style="float:left"><?php  echo $row['title'];?></div>
			<div style="float:right"><?php  echo $row['vote_num'];?>票</div></div>
			
			<div class="progress"><div data-per="<?php  echo $row['percent'];?>" class="bar bar0" style="width: <?php  echo $row['percent'];?>%;"></div></div><span class="per" style="margin-left:15px;"><?php  echo $row['num'];?>(<?php  echo $row['percent'];?>%)</span>
		</div>
		
                <?php  } } ?>
		 
	</div>
            <?php  } else { ?>
                <div class="summary"><?php  echo $reply['description'];?></div>
                <div class="tip-cont">
                    <img class="icon" src="./source/modules/vote/style/images/tip_icon.png">
                    After vote,You Can See The Result | <?php  echo $selects;?> <?php  if(!empty($reply['votetimes'])) { ?><br/> You can vote <?php  echo $canvotetimes;?> times<?php  } ?>
                </div>
				

                <div class="option-cont">
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <div class="option" val="<?php  echo $row['id'];?>" onclick="divClick(this)" sel ="false">
                        <?php  if(!empty($row['thumb']) && $reply['isimg']==1) { ?>
                        <div><image class="lazy" src="./resource/script/grey.gif" style="width:100%;margin:10px 0;" data-original="<?php  echo $_W['attachurl'];?><?php  echo $row['thumb'];?>" /></div>
                        <?php  } ?>
                        <img id="img<?php  echo $row['id'];?>" class="oimg" src="./source/modules/vote/style/images/checkimg.png">
                        <img id="img<?php  echo $row['id'];?>_sel" class="oimg-sel" src="./source/modules/vote/style/images/checkimg_check.png">

                        <div><?php  echo $row['title'];?></div>
                    </div>
                    
                    <?php  } } ?>
                </div>

                <div class="vote-cont" style="bottom: 0;position: fixed;">
                    <div style="height: 10px;"></div>
                    <img class="vote-btn" src="./source/modules/vote/style/images/vote1.png" onclick="submit()" style="width: 95%;" />
                    <div style="height: 10px;"></div>
                </div>
            <?php  } ?>

            <p class="page-url">

            </p>
        </div>
	<script type="text/javascript" src="./resource/script/jquery.lazyload.js"></script>
	<script type="text/javascript">
	  $(function() {
		 $("img.lazy").lazyload({
			 effect : "fadeIn",
			 threshold : 200
		 });

	  });
        
    </script>
    </body>
</html>
