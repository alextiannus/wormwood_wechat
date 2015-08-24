<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('myheader', TEMPLATE_INCLUDEPATH);?>
<style type="text/css">
#mask {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10;
    background: url(./source/modules/jdg_pub/template/style/opacity_6.png);
    display: none;
}

#mask img {
    float: right;
    width: 80%;
}
</style>
<body>
	<?php  include $this->template('nav', TEMPLATE_INCLUDEPATH);?>
	<div id="content">
		<img src="./source/modules/jdg_pub/template/style/invitation-header.jpg" style="display: block; width: 100%;">
		<!-- 邀友帖列表 -->
		<div class="outer-wrap">
			<div class="inner-wrap invitation-details">
				<P>不够嗨？还是把那群叽叽歪歪的哥们闺蜜喊出来，请选择一个雷人的请帖主题：</P>
				<img src="<?php  echo toimage($img_url)?>" class="invitation-img">
				<p>来自酒吧的呼唤</p>
				<div>
					<p>
						亲，夜色太美，
						<br>
						人生太快，
						<br>
						来与不来，给个回信。
					</p>
					<img src="<?php  echo toimage($user['headimgurl'])?>" />
					<p><?php  echo $user['nickname'];?></p>
					<a href="#" class="ui-button button-30 button-orange" id="button-share">马上喊人</a>
				</div>
				<a href="<?php  echo $this->createMobileUrl('aboutit',array('id'=>$list['id']));?>" class="ui-button button-36 button-orange">酒吧介绍</a>
			</div>
		</div>
	</div>

    <div id="mask"><img src="./source/modules/jdg_pub/template/style/share0.png" /></div>

<script>
$(function () { 
    $("#mask").click(function () {
        $(this).hide();
    });


    $("#button-share").click(function () {
        //$.modal.close();

        var h = $(document).height();
        $("#mask").height(h);
        $("#mask").show();

        return false;
    });
});
</script>


</body>
 	<script type="text/javascript">
	  var imgUrl = "<?php  echo toimage($user['avatar'])?>";  //注意必须是绝对路径
       var lineLink = "<?php  echo $url;?>";   //同样，必须是绝对路径
       var descContent = '快来加入我们吧 还等什么 一起嗨爆全场...'; //分享给朋友或朋友圈时的文字简介
       var shareTitle = "<?php  echo $list['pub_name'];?>";  //分享title
       var appid = ''; //apiID，可留空
        
       function shareFriend() {
           WeixinJSBridge.invoke('sendAppMessage',{
               "appid": appid,
               "img_url": imgUrl,
               "img_width": "200",
               "img_height": "200",
               "link": lineLink,
               "desc": descContent,
               "title": shareTitle
           }, function(res) {
               //_report('send_msg', res.err_msg);
           })
       }
       function shareTimeline() {
           WeixinJSBridge.invoke('shareTimeline',{
               "img_url": imgUrl,
               "img_width": "200",
               "img_height": "200",
               "link": lineLink,
               "desc": descContent,
               "title": shareTitle
           }, function(res) {
                  //_report('timeline', res.err_msg);
           });
       }
       function shareWeibo() {
           WeixinJSBridge.invoke('shareWeibo',{
               "content": descContent,
               "url": lineLink,
           }, function(res) {
               //_report('weibo', res.err_msg);
           });
       }
       // 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
       document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
           // 发送给好友
           WeixinJSBridge.on('menu:share:appmessage', function(argv){
               shareFriend();
           });
           // 分享到朋友圈
           WeixinJSBridge.on('menu:share:timeline', function(argv){
               shareTimeline();
           });
           // 分享到微博
           WeixinJSBridge.on('menu:share:weibo', function(argv){
               shareWeibo();
           });
       }, false);
	</script></html>