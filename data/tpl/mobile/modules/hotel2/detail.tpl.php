<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>酒店详情</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-title" content="酒店预定"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta content="telephone=no" name="format-detection"/>
    <link href="<?php  echo $this->_css_url?>css.css" rel="stylesheet"/>
    <script language='javascript' src='<?php  echo $this->_script_url?>jquery.js'></script>
    <script language='javascript' src='<?php  echo $this->_script_url?>common.js'></script>
    <script language='javascript' src='<?php  echo $this->_script_url?>photoswipe/simple-inheritance.min.js'></script>
    <script language='javascript' src='<?php  echo $this->_script_url?>photoswipe/photoswipe-1.0.11.min.js'></script>
    <link href="<?php  echo $this->_script_url?>photoswipe/photoswipe.css" rel="stylesheet" />
    <!--<script type="application/x-javascript">addEventListener('DOMContentLoaded', function () {-->
        <!--setTimeout(function () {-->
            <!--scrollTo(0, 1);-->
        <!--}, 0);-->
    <!--}, false);</script>-->
    <style type="text/css">.slide-back:active {
        opacity: 0.7;
    }

    .slide-back {
        position: absolute;
        left: 0;
        top: 0;
        width: 68px;
        height: 48px;
        background-color: #15a4d5;
        z-index: 999;
    }

    .slide-back:before {
        position: absolute;
        content: "";
        left: 25px;
        top: 16px;
        width: 12px;
        height: 20px;
        background: url(./source/modules/hotel2/template/style/css/comm_bg.png) no-repeat -100px -105px;
        background-size: 242px 260px;
    }

    .slide-back em {
        display: none;
    }

    /*modify by pp 0926*/
    .slide-view-page {
        background: #fff;
    }

    .slide-head {
        background-color: #1491c5;
        height: 48px;
        line-height: 48px;
    }

    .slide-cont {
        padding: 5px 0px 40px;
    }

    .cui-slide-list {
        background-color: #fff;
    }

    .slide-title {
        color: #fff;
        font-size: 18px;
        font-weight: bold;
        position: absolute;
        top: 0;
        width: 100%;
        text-align: center;
    }

    .cui-slide-bottom {
        background-color: #31a9e9;
        height: 30px;
        line-height: 30px;
    }

    .canbook {
        -webkit-appearance: none;
        border-radius: 0px;
    }

    .nobook {
        width: 50px;
        height: 25px;
        background: #f2f2f2;
        color: #999999;
        -webkit-appearance: none;
        border-radius: 0px;
    }

    #hotelImgList {
        height: 100%;
    }

    .topic-list dd {
        text-align: center;
    }

    body #room .ui-grid-b .oneline {
        width: auto !important;
    }

    .ui-btn-up-c {
        border: 1px solid #cecece;
        text-shadow: none;
        font-weight: normal;
        margin: 0px;
        margin-top: 10px;
    }

    .main {
        clear: both;
    }

    #menu {
        width: 100%;
        height: 45px;
        line-height: 45px;
        text-align: center;
        background: #f2f2f2;
        color: #afafaf;
        margin: 0px !important;
    }

    #menu li.hover {
        background: #fff;
        color: #ec4e00;
    }

    #content ul {
        display: none;
    }

    #room .ui-grid-b {
        border-bottom: 1px solid #F5F5F5;
        height: auto;
        margin: 5px 0;
    }

    #room .ui-grid-b .ui-block-a {
        width: 24%;
        margin: 5px 0 0 10px;
    }

    #room .ui-grid-b .ui-block-b {
        width: 45%;
        margin: 5px 0;
    }

    #room .ui-grid-b .ui-block-c {
        width: 25%;
        text-align: right;
        margin: 5px 0;
        position: relative;
    }

    .right {
        float: right;
        padding-right: 40px;
    }

    .info .ui-grid-a .ui-block-a {
        width: 70%;
    }

    .info .ui-grid-a .ui-block-b {
        width: 30%;
    }

    .ui-grid-d .ui-block-a {
        width: 24%;
    }

    .ui-grid-d .ui-block-b {
        width: 22%;
    }

    .ui-grid-d .ui-block-c {
        width: 8%;
    }

    .ui-grid-d .ui-block-d {
        width: 24%;
    }

    .ui-grid-d .ui-block-e {
        width: 22%;
    }

    .status {
        width: 55px;
        height: 8px;
        background: #ebf4fa;
        margin-top: 5px;
    }

    .status div {
        background-color: #2a97e3;
        width: 95%;
        height: 100%;
    }

    #hotelpic img, #room .ui-block-a img {
        background: rgba(0, 0, 0, 0.5) url(./source/modules/hotel2/template/style/css/loading2.gif) 50% 50% no-repeat;
    }

    #hotelpic .wrap, #gallery .wrap {
        margin-left: 4px;
        white-space: nowrap;
        -webkit-transition: all 1s;
        -o-transition: all 1s;
        -moz-transition: all 1s;
        transition: all 1s;
    }

    #hotelpic {
        width: 300px;
        height: 180px;
        margin: 0 auto;
        overflow: hidden;
    }

    #gallery {
        width: 300px;
        height: 320px;
        margin: -160px 0 0 -150px;
        overflow: hidden;
        position: absolute;
        left: 50%;
        top: 45%;
    }

    #hotelpic .topic-list, #gallery .topic-list {
        font-size: 16px;
        display: inline-block;
        width: 300px;
        height: 180px;
        background: #444 50% 50% no-repeat;
        position: relative;
        margin: 0 0 0 -4px;
    }

    #hotelpic .topic-list dd {
        position: absolute;
        margin: 0;
        width: 100%;
        height: 100%;
        max-width: 300px;
    }

    #hotelpic .topic-list dt {
        color: #fff;
        text-align: center;
        z-index: 100;
        width: 90px;
        height: 30px;
        line-height: 30px;
        background: rgba(0, 0, 0, 0.5);
        float: right;
        position: relative;
        top: 140px;
    }

    #hotelpic .topic-list img {
        width: 100%;
        min-height: 185px;
        max-width: 300px;
    }

    #gallery .topic-list {
        height: 320px;
    }

    #gallery .topic-list dd {
        margin: 0;
        position: absolute;
    }

    #gallery .topic-list dt {
        bottom: 0;
        position: absolute;
        width: 100%;
        line-height: 20px;
        height: 20px;
        color: #fff;
    }

    #gallery .des {
        float: left;
        padding-left: 12px;
    }

    #gallery .int {
        float: right;
        padding-right: 12px;
    }

    #gallery strong {
        font-weight: normal;
    }

    #gallery .topic-list img {
        width: 300px;
        height: 300px;
    }

    #content .hide {
        display: none;
    }

    #content .block {
        display: block;
    }

    #content ul div.text_ct:hover {
        background: #f2f2f2;
    }

    #address, #checkinout {
        height: 45px;
        line-height: 45px;
        background: #fff;
        padding-left: 10px;
        overflow: hidden;
        font-size: 15px;
        font-weight: bold;
    }

    #checkinout {
        border-top: 1px solid #e8ebef;
        margin-bottom: 10px;
        padding-left: 0px;
    }

    #address:active, #checkinout:active {
        background: #f2f2f2;
    }

    #mask {
        z-index: 999;
        position: absolute;
        left: 0;
        background-color: #fff;
        width: 100%;
        visibility: hidden;
    }

    #mask .single {
        position: absolute;
        height: 320px;
        left: 50%;
        top: 110px;
        margin-left: -150px;
        overflow: hidden;
        text-align: center;
    }

    #mask .single img {
        width: 300px;
        background: #7D7A74 url(./source/modules/hotel2/template/style/css/loading2.gif) 50% 50% no-repeat;
        vertical-align: bottom;
        margin: 0 auto;
        display: block;
    }

    #mask p {
        text-align: center;
        color: #fff;
        line-height: 30px;
        width: 300px;
        margin: 20px auto 0;
        background: #31a9e9;
    }

    #mask .returnurl {
        position: absolute;
        z-index: 10;
    }

    header {
        text-align: center;
    }

    header h1 {
        text-align: center !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .time {
        height: 45px;
        line-height: 45px;
        background: #fff;
        margin-bottom: 10px;
        overflow: hidden;
        border-top: 1px solid #F5F5F5;
        text-align: center;
    }

    body .ico_time {
        margin: 10px;
    }

    .time .ui-block-a:active, .time .ui-block-b:active {
        background: #f2f2f2;
    }

    .hotbluetip {
        border-top: 30px solid #31A9E9;
        border-right: 10px solid transparent;
        height: 0;
        width: 100px;
        color: #fff;
        text-align: center;
        position: relative;
        margin: 10px 0 10px -15px;
    }

    .hotbluetip span {
        position: absolute;
        bottom: 15px;
        right: -5px;
        height: 10px;
        width: 100px;
    }

    .iconlist p {
        margin-bottom: 7px;
    }

    .roomlist {
        position: relative;
        overflow: hidden;
    }

    .room_btn {
        padding: 5px 0;
        margin-top: 30px;
    }

    .roomdetailinfo {
        background-color: #fff;
        color: #666666;
        font-size: 14px;
        clear: both;
        margin-bottom: 10px;
        position: relative;
    }

    .roomdetailinfo li {
        line-height: 25px;
    }

    .roomdetailinfo p {
        margin-top: 10px;
    }

    .roomdetailinfo .hotel_fan, .roomdetailinfo .hotel_li, .roomdetailinfo .hotel_cu, .roomdetailinfo .hotel_quan {
        margin: 3px 5px 0 0;
    }

    .infotop {
        width: 100%;
        height: 208px;
        background: #eef2f3;
        position: relative;
    }

    .infotop2 {
        width: 100%;
        height: 50px;
        background-color: #1491c5;
        position: relative;
        overflow: hidden;
    }

    .toptxt {
        text-overflow: ellipsis;
        white-space: nowrap;
        padding-top: 15px;
        text-indent: 15px;
        font-size: 15px;
        font-weight: bold;
        color: #fff;
        position: absolute;
        left: 50%;
        top: 0px;
        margin-left: -150px;
        width: 220px;
        overflow: hidden;
        z-index: 2;
    }

    body .imgempty {
        margin: 0px;
        left: 0px;
        width: auto;
        margin-right: 30px;
        position: static;
    }

    .imgclose {
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        position: absolute;
        right: 15px;
        z-index: 2;
    }

    .imgclose em {
        display: inline-block;
        background: rgba(0, 0, 0, 0.5);
        width: 25px;
        height: 25px;
        line-height: 23px;
        border-radius: 50px;
    }

    .infocontent {
        padding: 10px 15px;
    }

    .infobottom {
        width: 100%;
        height: 42px;
        background-color: #F0F0F0;
    }

    .infobottom .ui-block-a {
        line-height: 42px;
        text-indent: 15px;
    }

    .infobottom .ui-block-b {
        text-align: right;
    }

    .btn-order {
        background: #ff7800;
        color: #fff;
        width: 115px;
        height: 42px;
        font-size: 16px;
        border: none;
        -webkit-appearance: none;
        border-radius: 0px;
    }

    .icomobile {
        width: 60px;
        height: 15px;
        line-height: 15px;
        padding: 1px;
        text-align: center;
        font-family: "STHEITI";
        font-size: 12px;
        font-weight: bold;
        background-color: #FB4C2E;
        color: #ffffff;
        display: inline-block;
    }

    body .roomdetail-view-page {
        background: rgba(0, 0, 0, 0.3);
    }

    .roomdetail-box {
        padding: 10px 0px;
        margin: 0px 10px;
    }

    .slide {
        width: 300px;
        height: 100%;
        margin: auto;
    }

    .roomdetail-box {
        padding-top: 60px;
    }

    .hoteltitle {
        width: 58%;
        height: 60px;
        overflow: hidden;
    }

    .hm {
        text-align: center;
    }

    header h1 {
        position: relative !important;
    }

    .hot_ico {
        width: 300%;
        position: absolute;
        right: 0;
    }

    .hot_ico .fantxt:last-child {
        margin-right: 0;
    }</style>
</head>
<body style='padding-bottom:40px'>
<div id="roomdetail"></div>
<div id="ctripPage">
<section id="ydwxcsH"></section>
<header>
    <h1 class="hoteltitle"><?php  echo $reply['title'];?></h1>
    <!--<h1 class="hoteltitle">酒店详情</h1>-->
    <div class="lefthead" onClick="location.href='javascript:history.back();'">
        <div class="header_return"></div>
    </div>
    <div class="righthead"> 
        <a class="header_home" href="<?php  echo $this->createMobileUrl('index')?>">&nbsp;</a>
        <a class="header_tel __hreftel__" href="tel:<?php  echo $tel;?>"></a>
    </div>
</header>
<menu style="padding:10px">
<div id="hotelpic">
    <div class="wrap">
        <dl class="topic-list">
            <dt>共<span class="bold span1"><?php  echo $thumbcount;?></span>&nbsp;张</dt>
            <dd index="0" des="<?php  echo $reply['title'];?>" alt="<?php  echo $reply['title'];?>">
                <a href="<?php  echo img_url($reply['thumb'])?>" rel="external"><img id="hotelImgList" index="0" des="<?php  echo $reply['title'];?>" alt="<?php  echo $reply['title'];?>"
                 src="<?php  echo img_url($reply['thumb'])?>"></a>
                <?php  if(is_array($thumbs)) { foreach($thumbs as $thumb) { ?>
                <a href="<?php  echo img_url($thumb['attachment'])?>" rel="external"><img id="hotelImgList" index="0" des="<?php  echo $reply['title'];?>" alt="<?php  echo $reply['title'];?>"
                                                                                  src="<?php  echo img_url($thumb['attachment'])?>"></a>
                <?php  } } ?>
            </dd>
        </dl>
    </div>
</div>
    <script language="JavaScript">
        $(function(){
            $(".topic-list a").photoSwipe();
        });
    </script>
    <a  href="http://api.map.baidu.com/geocoder?address=<?php  echo $reply['address'];?>&output=html">
        <div id="address"><span class="ico_map"></span><?php  echo $reply['address'];?>
            <span class="icon_arrow" style="position:relative; right: 10px; top:15px;"></span>
        </div>
    </a>
<div id="checkinout">
    <div id="selinTime" onClick="location.href='<?php  echo $this->createMobileUrl('date')?>'">
        <span class="ico_time"></span>入住&nbsp;<span id="CheckInDay"><?php  if(($search_array['bdate'] != '')) { ?><?php  echo $search_array['bdate'];?><?php  } else { ?>--<?php  } ?></span>
        <span class="span2" id="CheckOutDay"><?php  if(($search_array['day'] != '')) { ?>住<?php  echo $search_array['day'];?>晚<?php  } else { ?>--<?php  } ?></span><span
            class="icon_arrow" style="position:relative; right:10px; top:15px;"></span>
    </div>
</div>
<select id="CheckInDaysDom" style="display:none"></select>

<div class="conlist" style="width:100%; padding:0px; display:inline-block;">
<ul class="ui-grid-b" id="menu">
    <li class="ui-block-a tab-click hover" id="liOrder">房型预订</li>
    <!--<li class="ui-block-b" id="liDp">客户点评</li>-->
    <li class="ui-block-c tab-click" id="liMore">酒店详情</li>
</ul>
<div id="content" style="padding:0px;">
<ul class="block" id="room">

    <div id="d_list"></div>

    <div class="text_ct hide block" id="d_page" style="display: none;">
        <a href="javascript:;" id="d_more" class="ui-link" style="height:45px; line-height:45px;">点击加载更多房型</a>
    </div>
</ul>

<ul id="detail">
    <li>
        <div class="conlist">
            <div class="bold size16 hm" data-hoteldatatype="1"><?php  echo $reply['title'];?></div>

            <!--<div class="hotbluetip"><span>促销信息</span></div>-->
            <!--<p>豪华间此房型需从2014-3-3 9:08:00到2014-12-31 23:59:59预订方可享受优惠价，如您延住也需此时间预订，否则延住部分需按原价支付。;</p>-->
 

            <!--<div class="hotbluetip"><span>位置交通</span></div>-->
            <!--<div class="info">-->

                <!--<div class="ui-grid-a">-->
                    <!--<div class="ui-block-a">西单、金融街地区</div>-->
                    <!--<div class="ui-block-b text-right">3.8公里</div>-->
                <!--</div>-->

                <!--<div class="ui-grid-a">-->
                    <!--<div class="ui-block-a">南苑机场</div>-->
                    <!--<div class="ui-block-b text-right">20.4公里</div>-->
                <!--</div>-->

                <!--<div class="ui-grid-a">-->
                    <!--<div class="ui-block-a">首都国际机场</div>-->
                    <!--<div class="ui-block-b text-right">34.4公里</div>-->
                <!--</div>-->

                <!--<div class="ui-grid-a">-->
                    <!--<div class="ui-block-a">北京南站</div>-->
                    <!--<div class="ui-block-b text-right">9.3公里</div>-->
                <!--</div>-->

                <!--<div class="ui-grid-a">-->
                    <!--<div class="ui-block-a">北京西站</div>-->
                    <!--<div class="ui-block-b text-right">6.2公里</div>-->
                <!--</div>-->

                <!--<div class="ui-grid-a">-->
                    <!--<div class="ui-block-a">市中心</div>-->
                    <!--<div class="ui-block-b text-right">7.8公里</div>-->
                <!--</div>-->

            <!--</div>-->

            <?php  if($device != '') { ?>
            <div class="hotbluetip"><span>酒店设施</span></div>
            <p><span class="bold size15">服务项目</span><span class="span2"><?php  echo $device;?></span></p>
            <?php  } ?>

            <!--<p><span class="bold size15">通用设施</span><span class="span2">自助早餐价: RMB 160 </span>-->
            <!--</p><br>-->

            <?php  if($reply['content'] != '') { ?>
            <div class="hotbluetip"><span>订房说明</span></div>
                <p style="word-wrap:break-word;"><?php  echo $reply['content'];?></p>
            <?php  } ?>

            <div class="hotbluetip"><span>酒店介绍</span></div>
                <p style="word-wrap:break-word;"><?php  echo $reply['description'];?></p>
            </div>

    </li>
</ul>
</div>
</div>
<div id="waring"></div>
</menu>
</div>
<div id="calendar" class="ui-overlay-shadow ui-corner-all ui-body-c pop none"></div>
<script>
    $(function(){
//        $(window).scroll(function() {
//            if($(window).scrollTop() >= 100){
//                $('.actGotop').fadeIn(300);
//            }else{
//                $('.actGotop').fadeOut(300);
//            }
//        });

        $(".tab-click").click(function () {
            $(".tab-click").removeClass("hover");
            $(this).addClass("hover");
            if ($(this).attr("id") == "liOrder") {
                $("#room").show();
                $("#detail").hide();
                //alert("123");
            } else if ($(this).attr("id") == "liMore") {

                $("#room").hide();
                $("#detail").show();
            }
        });
    });

    function clear_device() {
        $("#waring").empty();
        $('html,body').animate({scrollTop: '300px'}, 800);
    }

    function show_room_device(hid, id, has, price, total_price) {
        show_loading();
        $.post("<?php  echo $this->createMobileUrl('roomdevice')?>",{hid:hid,id:id,has:has,price:price,total_price:total_price},function(data){
            //alert(data);return false;
            hide_loading();
            data  =eval("(" + data +")");
            if(data.result==1){
                $("#waring").html(data.code);
                $('html,body').animate({scrollTop: '0px'}, 200);
            }
        });
    }
</script>

<input type="hidden" id="page_id" value="212094"/>
<section id="ydwxcsF"></section>
<div id="footer"></div>
<!--<div id="cui-cid14550357" class="cui-view-page roomdetail-view-page emptyImage"-->
     <!--style=" display:none;position: absolute; left: 0px; top: 0px; width: 1903px; z-index: 6355; height: 979px;">-->
    <!--<div class="cui-view-page-content">-->
        <!--<div class="roomdetail-box">-->
            <!--<section class="roomdetailinfo">-->
                <!--<span class="imgclose"><em>x</em></span>-->
                <!--&lt;!&ndash;有图片时&ndash;&gt;-->

                <!--&lt;!&ndash;无图片时&ndash;&gt;-->
                <!--<ul class="infotop2">-->
                    <!--<li class="toptxt imgempty" data-title="豪华间(特价)">豪华间(特价)</li>-->
                <!--</ul>-->

                <!--<ul class="infocontent">-->

                    <!--<li class="ui-grid-a">-->

                        <!--<div class="ui-block-a"><span class="list area"></span>24-28平方米</div>-->


                        <!--<div class="ui-block-b"><span><span class="list floor"></span>3-19楼</span></div>-->

                    <!--</li>-->


                    <!--<li class="ui-grid-a">-->

                        <!--<div class="ui-block-a"><span class="list nosmoking"></span>该房型有无烟房；该房可无烟处理</div>-->


                        <!--<div class="ui-block-b"><span class="list bed"></span>大床1.80米，双床1.35米</div>-->

                    <!--</li>-->


                    <!--<li class="ui-grid-a">-->

                        <!--<div class="ui-block-a"><span><span class="list people"></span>2人</span></div>-->


                        <!--<div class="ui-block-b"><span class="list extrabed"></span>该房型不可加床</div>-->

                    <!--</li>-->


                    <!--<li><span class="list internet"></span>全部房间支持免费有线和无线宽带上网</li>-->


                    <!--<p><span class="hotelicon hotel_fan">返</span><br>2014/1/29 0:00:00至2014/12/31-->
                        <!--0:00:00期间入住，每间夜最多可以使用40元消费券，下单后将验证码通过微信发给我们，入住成功后即可获得等额返现;</p>-->


                <!--</ul>-->
                <!--&lt;!&ndash;<ul class="infobottom ui-grid-a">&ndash;&gt;-->
                    <!--&lt;!&ndash;<li class="ui-block-a"><dfn>¥</dfn><strong class="price size20" data-cny="RMB">728</strong></li>&ndash;&gt;-->
                    <!--&lt;!&ndash;<li class="ui-block-b"><input type="button" class="btn-order" value="预订"&ndash;&gt;-->
                                                  <!--&lt;!&ndash;style="-webkit-appearance: none;border-radius:0px;" roomsize="8"&ndash;&gt;-->
                                                  <!--&lt;!&ndash;remark="" data-hoteldatatype="" data-subpaytp="0" paytype="1"&ndash;&gt;-->
                                                  <!--&lt;!&ndash;roomname="豪华间(特价)" roomid="203806" roomstatus="9" isfan="1"&ndash;&gt;-->
                                                  <!--&lt;!&ndash;extension="" gifttype="6" giftvalue="40"></li>&ndash;&gt;-->
                <!--&lt;!&ndash;</ul>&ndash;&gt;-->
            <!--</section>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->

<script type="text/javascript">
$(function(){
    var next_page  = 0;
    
    function get_list(page) {
        show_loading();
        $.post("<?php  echo $this->createMobileUrl('detail')?>",{ac:'getDate',hid:<?php  echo $hid;?>,page:page},function(data){
            //alert(data);return false;
            hide_loading();
            data  =eval("(" + data +")");
            if(data.result == 1){
                $("#top-title").html(data.title);
                $("#d_list").append(data.code);

                if (data.isshow == 1) {
                    next_page = data.nindex;
                    $("#d_page").show();
                } else {
                    $("#d_page").hide();
                }
                
            }else{

            }
        });
    }
    get_list(1);

    $("#d_more").click(function () {
        get_list(next_page);
    });

});
</script>

<?php  include $this->template('hotelfooter', TEMPLATE_INCLUDEPATH);?>

<?php  include $this->template('hotel_msg', TEMPLATE_INCLUDEPATH);?>
</body>
<!--<script src="http://res.m.ctrip.com/html5/scripts/require.min.js"></script>-->
<!--<script type="text/javascript">-->
<!--var libs = 'libs_r_3.js';-->
<!--if (!('__proto__' in {})) {libs = 'libs_jq_r_1.1.js';}-->
<!--document.write('<script type="text/javascript" src="http://res.m.ctrip.com/html5/scripts/' + libs + '"></' + 'script>');-->
<!--</script>-->
<!--<script src="/html5/Scripts/Common/m.ctrip.com.core.min.js?v=3.0"></script>-->
<!--<script src="/html5/Scripts/Common/m.ctrip.com.calendar.min.js?v=2.3"></script>-->
<!--<script src="http://m.ctrip.com/html5/Scripts/Common/m.ctrip.com.image.min.js?v=2.2"></script>-->
<!--<script src="/html5/Scripts/Common/m.ctrip.com.slide.min.js?v=2.6"></script>-->
<!--<script src="/html5/hotel/Scripts/Hotel/m.ctrip.com.hotel.detail-1.0.min.js?v=2.8"></script>-->
<!--<script>(function () { var slist = document.getElementsByTagName('script') || []; var reg = /_bfa\.min\.js/i; for (var i = 0; i < slist.length; i++) { if (reg.test(slist[i].src)) { return; } } if (window.$_bf || window.$LAB || window.CtripJsLoader) { return; }; var bf = document.createElement('script'); bf.type = 'text/javascript'; bf.charset = 'utf-8'; bf.async = true; try { var p = 'https:' == document.location.protocol; } catch (e) { var p = 'https:' == document.URL.match(/[^:]+/) + ":"; } bf.src = (p ? "https://s.c-ctrip.com/_bfa.min.js" : 'http://webresource.c-ctrip.com/code/ubt/_bfa.min.js'); var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(bf, s); })();</script> -->
<!--<script>var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-3748357-1']); _gaq.push(['_setDomainName', '.ctrip.com']); _gaq.push(['_setAllowHash', false]); _gaq.push(['_addOrganic', 'soso', 'w']); _gaq.push(['_addOrganic', 'sogou', 'query']); _gaq.push(['_addOrganic', 'youdao', 'q']); _gaq.push(['_addOrganic', 'so.360.cn', 'q']); _gaq.push(['_addOrganic', 'so.com', 'q']); _gaq.push(['_addOrganic', 'm.baidu.com', 'word']); _gaq.push(['_addOrganic', 'wap.baidu.com', 'word']); _gaq.push(['_addOrganic', 'wap.soso.com', 'key']); _gaq.push(['_trackPageview']); (function () { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })(); </script>-->
<!--<script src="/webapp/app/1.0/web/ui/c.ui.ad.js"></script>-->
</html>