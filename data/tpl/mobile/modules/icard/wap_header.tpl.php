<?php defined('IN_IA') or exit('Access Denied');?><style>
    header {
        height: 32px;
        padding: 6px 0;
        text-align: center;
        background-color: rgba(0,0,0,0.15);
    }
    header >a:nth-of-type(1) {
        position: absolute;
        left: 10px;
    }
    header >span {
        font-size: 24px;
        line-height: 32px;
        color: white;
        display: inline-block;
    }
    header >a:nth-of-type(2) {
        position: absolute;
        right: 10px;
    }
</style>
<header>
    <a href="javascript:history.go(-1);">
        <img src="./source/modules/icard/template/images/icon-back.png">
    </a>
    <span>
        <?php  if($do == 'index') { ?>
        会员中心
        <?php  } else if($do == 'privilege') { ?>
        会员特权       　
        <?php  } else if($do == 'coupon') { ?>
        优惠券       　
        <?php  } else if($do == 'gift') { ?>
        礼品券       　
        <?php  } else if($do == 'sign') { ?>
        会员签到
        <?php  } else if($do == 'recharge') { ?>
        充值中心
        <?php  } else if($do == 'announce') { ?>
        会员通知       　
        <?php  } else if($do == 'shoppinglog') { ?>
        消费记录
        <?php  } else if($do == 'store') { ?>
        适用门店
        <?php  } else if($do == 'userinfo') { ?>
        个人资料
        <?php  } else if($do == 'cardinfo') { ?>
        会员卡说明
        <?php  } else if($do == 'makesncode_type_privilege') { ?>
        使用特权
        <?php  } else if($do == 'makesncode_type_coupon') { ?>
        使用优惠券
        <?php  } else if($do == 'makesncode_type_gift') { ?>
        使用礼品券
        <?php  } ?>
    </span>
    <a href="<?php  echo create_url('mobile/module', array('do' => 'wapindex', 'from_user' => $page_from_user, 'name' => 'icard', 'weid' => $weid))?>">
        <img src="./source/modules/icard/template/images/icon-person.png">
    </a>
</header>