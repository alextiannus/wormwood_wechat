<?php defined('IN_IA') or exit('Access Denied');?><html>
<head>
	<meta charset="utf-8">
	<title>微夜店</title>
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1" />
	<meta content="telephone=no" name="format-detection" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="stylesheet" href="./source/modules/jdg_pub/template/css/reset.css" />
	<link rel="stylesheet" href="./source/modules/jdg_pub/template/css/bar.css" />
    <style type="text/css">
        div#deposit-card {
            margin-bottom:12px;
        }

    </style>
</head>
<body>
	<!-- app底部导航栏 START -->
	<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>
	<!-- app底部导航栏 END -->
	<div id="content">
		<div id="deposit-page">
			<p>存酒卡</p>
                <a href="#" class="ui-button button-36 button-gray" style="color:#666;" id="deposit">我要存酒</a>
            <br />
				<div id="deposit-card">
				<ul>
					<li>
						<p>存酒卡号：</p>
						<p><?php  echo $result['snid'];?></p>
					</li>
                    <li>
                        <p>使用说明：</p>
                        <p>请前往前台，报存酒卡号进行存酒。</p> 
                    </li>
                    <li>
                        <p>状　　态：</p>
                        <p><span style='color:blue;'><?php  echo $result['status'];?></span></p>
                    </li>
                    <li>
                        <p>申请时间：</p>
                        <p><?php  echo $result['creattime'];?></p>
                    </li>                         
				</ul>
			</div>

			<!-- 存酒规则 -->
			<div id="deposit-rule">
                <?php  echo $select['content'];?>
			</div>

		</div>
	</div>

    <input type="hidden" id="uid" name="uid" value="oM0mfjoiJSDuPFkTMDWlws0mC64g"  />
    <input type="hidden" id="oid" name="oid" value="gh_e5'' />
    <input type="hidden" id="id" name="id value="<?php  echo $list['id'];?>" />


	<!-- app底部导航栏 END -->
	
    
    <script src="./source/modules/jdg_pub/template/js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="./source/modules/jdg_pub/template/js/swipe.js"></script>
	<script type="text/javascript" src="./source/modules/jdg_pub/template/js/tocca.min.js"></script>
	<script type="text/javascript" src="./source/modules/jdg_pub/template/js/bar.js"></script>

<script>
$(function () {
    
    $("#deposit-wine").click(function () {
        var uid = $("#uid").val();
        var oid = $("#oid").val();
        var data = {
            uid: uid,
            oid: oid
        };

        var url = "<?php  echo $this->createMobileUrl('s')?>";

        $.post(url, data, function (json) {
        	var jd=$.parseJSON(json);
        	//alert(jd.success);
        	//alert(JSON.stringify(jd));
           if (jd.IsSuccess) {
                showToastInfo("申请成功！");
                
                
                $("#deposit-wine").after(jd.div);
                $("#deposit-wine").remove();
                $("#deposit-card'").prepend("<a href='#' class='ui-button button-36 button-orange' id='deposit-wine'>我要存酒</a>");
                //$(".button-orange").css("background-color","#999");               
                //$("#deposit-wine").css('color','#666');
                //$('#deposit-wine').attr('deposit-wine','deposit');

            } else {
                showToastInfo("申请失败！系统内部错误！");
            }
        });
    });

    $("#deposit").click(function () {
        showToastInfo("请前往前台进行存酒。");
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