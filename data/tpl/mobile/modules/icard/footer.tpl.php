<?php defined('IN_IA') or exit('Access Denied');?><script>
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        WeixinJSBridge.call('hideToolbar');
    });
</script>
<style>
    footer {
        height: 48px;
        padding: 6px 0;
        text-align: center;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 900;
        background-color: rgba(0,0,0,0.15);
    }

    footer ul{
        background-image: url(./source/modules/icard/template/images/menu_bg_border.png);
        border-top: 1px solid #3D3D46;
        position: fixed;
        z-index: 900;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        display: block;
        width: 100%;
        height: 48px;
        display: -webkit-box;
        display: box;
        -webkit-box-orient: horizontal;
        box-shadow: 0 1px 0 #949494 inset;
        background-size: 100% 100%;
        background-repeat: repeat;
        opacity: 0.95;
    }

    footer ul li{
        width: auto!important;
        height: 100%;
        position: static!important;
        margin: 0;
        border-radius: 0!important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-box-flex: 1;
        box-flex: 1;
        -webkit-box-sizing: border-box;
        box-shadow: none!important;
        background: none;
    }

    footer ul li a {
        color: #fff;
        font-size: 20px;
        line-height: 20px;
        text-align: center;
        display: block;
        text-decoration: none;
        padding-top: 2px;
        position:relative;
        text-shadow:0 1px rgba(0, 0, 0, 0.2);
        /*background-color: rgba(0,0,0,0.15);*/
    }

    footer ul li a.active {
        border: 1px solid rgba(148, 148, 148, 0.6);
        border-bottom:0;
        /*background-color: rgba(0,0,0,0.8);*/
        /*background-color: rgba(30,26,21,1);*/
        background-color: rgba(88,81,70,1);
    }

    footer ul li a img{
        width:24px;
        height:24px;
    }

    footer ul li a p{
        margin: 2px 0 0 0;
        font-size: 12px;
        display: block !important;
        line-height: 18px;
        color: #fff;
        text-align: center;
    }
</style>
<div style="height:40px"></div>
<footer>
    <ul>
        <li>
            <a <?php  if($do == 'index') { ?>class="active"<?php  } ?> href="<?php  echo create_url('mobile/module', array('do' => 'wapindex', 'from_user' => $page_from_user, 'name' => 'icard', 'weid' => $weid))?>">
            <img src="./source/modules/icard/template/images/icon_card.png">
            <p>会员卡</p>
            </a>
        </li>
        <li>
            <a <?php  if($do == 'privilege') { ?>class="active"<?php  } ?>  href="<?php  echo create_url('mobile/module', array('do' => 'wapprivilege', 'from_user' => $page_from_user, 'name' => 'icard', 'weid' => $weid))?>">
            <img src="./source/modules/icard/template/images/icon_privilege.png">
            <p>特权</p>
            </a>
        </li>
        <li>
            <a <?php  if($do == 'coupon') { ?>class="active"<?php  } ?>  href="<?php  echo create_url('mobile/module', array('do' => 'wapcoupon', 'from_user' => $page_from_user, 'name' => 'icard', 'weid' => $weid))?>">
            <img src="./source/modules/icard/template/images/icon_coupon.png">
            <p>优惠券</p>
            </a>
        </li>
        <li>
            <a <?php  if($do == 'gift') { ?>class="active"<?php  } ?>  href="<?php  echo create_url('mobile/module', array('do' => 'wapgift', 'from_user' => $page_from_user, 'name' => 'icard', 'weid' => $weid))?>">
            <img src="./source/modules/icard/template/images/icon_gift.png">
            <p>兑换</p>
            </a>
        </li>
        <li>
            <a <?php  if($do == 'sign') { ?>class="active"<?php  } ?> href="<?php  echo create_url('mobile/module', array('do' => 'wapsign', 'from_user' => $page_from_user, 'name' => 'icard', 'weid' => $weid))?>">
            <img src="./source/modules/icard/template/images/icon_sign.png">
            <p>签到</p>
            </a>
        </li>
    </ul>
</footer>
