<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>我的订单</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/1/wei_canyin_v1.8.4.css?v=1.0" media="all">
    <link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/1/wei_dialog_v1.2.1.css?v=1.0" media="all">
    <script type="text/javascript" src="./source/modules/idish/template/js/1/wei_dialog_v1.9.9.js"></script>
    <script type="text/javascript" src="./source/modules/idish/template/js/2/jQuery.js"></script>
    <script type="text/javascript" src="./source/modules/idish/template/js/1/wei_webapp_v2_common_v1.9.4.js"></script>
</head>
<body id="page_intelOrder" class="myOrderCon">
    <style>
        .headselect {
            float: none;
            width: 100%;
            display: block;
            font-size: 14px;
            height: 40px;
            margin: 0px;
            padding: 0px;
            margin-bottom: 10px;
        }

        .headtext {
            -webkit-background-clip: border-box;
            -webkit-background-origin: padding-box;
            -webkit-background-size: auto;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            background-attachment: scroll;
            background-clip: border-box;
            background-color: rgb(234, 89, 70);
            background-image: none;
            background-origin: padding-box;
            background-size: auto;
            color: rgb(255, 255, 255);
            cursor: pointer;
            display: block;
            font-size: 18px;
            font-style: normal;
            height: 40px;
            line-height: 40px;
            margin: 0px;
            overflow-x: hidden;
            overflow-y: hidden;
            padding: 0px;
            position: relative;
            text-align: center;
            text-decoration: none;
        }

        #container {
            padding-left: 5px!important;
            padding-right: 5px!important;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        #page_intelOrder section article ul li section.bbox input[type=text] {
            background: none;
        }
        #container > div > section {
            height: 73px;
            -webkit-animation-duration: .3s;
            -webkit-animation-timing-function: ease-in;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-style: preserve-3d;
            -webkit-animation-fill-mode: both;
            overflow: hidden;
        }
            /* #container>section>*:nth-of-type(n+2){
            margin-top:3px;
        }*/
            #container > div > section.on {
                -webkit-animation-name: slideDown;
            }

                #container > div > section.on .arrow:after {
                    -webkit-transform: rotate(90deg);
                }

            #container > div > section.off {
                -webkit-animation-name: slideUp;
            }

        .yuyue {
            margin-top: 35px;
            text-indent: 10px;
        }

            .yuyue label {
                display: block;
                line-height: 35px;
                border-bottom: 1px solid #ddd;
                margin-bottom: 15px;
            }

        .price {
            position: absolute;
            right: 50px;
            top: 50%;
            margin-top: -15px;
            line-height: 30px;
            color: #f00;
            font-size: 20px;
        }

        @-webkit-keyframes slideDown {
            0% {
                height: 73px;
            }

            99.9% {
                height: 150px;
            }

            100% {
                height: auto;
            }
        }

        @-webkit-keyframes slideUp {
            0% {
                height: 150px;
            }

            100% {
                height: 73px;
            }
        }

        .group_card ul {
            overflow: hidden;
            border-radius: 5px 5px 0 0;
            border: 1px solid #ccc;
            border-bottom: 0;
        }

        .group_card li {
            text-align: center;
            line-height: 35px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
            width: 25%;
            float: left;
            height: 35px;
            -webkit-box-sizing: border-box;
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#efefef));
        }

        .group_card li.on {
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#efefef), to(#fff));
        }

        .group_card li:nth-of-type(1) {
            border-right: 1px solid #ccc;
        }

        .group_list {
            border: 1px solid #ccc;
            padding-top: 10px;
            display: none;
            -webkit-box-shadow: 0 0 3px #ccc;
        }

        .group_list.on {
            display: block;
        }

        .footFix {
            width: 100%;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            z-index: 99;
        }

        .footFix a{
            padding: 9px 8px;
            float: right;
            color: #fff;
            border: 0;
            cursor: pointer;
            background-color: #39b868;
            border-radius: 2px;
            margin-right: 20px;
            font-size: 13px;
            box-shadow: 0 0 5px #969c9b;
        }

        #page_intelOrder .footFix .btn_change {
            background-color: #f46b30;
            margin-right: 15px;
        }



        #page_intelOrder .footFix .btn_change:active {
            background-color: #d84e01;
        }
        .btn_2 {
            display: block;
            width: 150px;
            margin: auto;
            line-height: 35px;
            text-align: center;
            padding: 0 5px;
            color: #fff;
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#2ec366), to(#2ec366));
            border: 1px solid #40bb6e;
            border-radius: 3px;
            font-size: 15px;
        }
        .select_orderType {
            background: url(./source/modules/idish/template/images/btn3.png) no-repeat right 0;
            -webkit-background-size: auto 105%;
            -webkit-appearance: button;
            width: 100%;
            padding: 13px 50px 13px 20px;
            height: 44px;
            border: 1px solid #dedede;
            border-radius: 3px;
            background-color: #ffffff;
            -webkit-box-sizing: border-box;
            outline: none;
            overflow: hidden;
        }
    </style>
    <div class="headselect">
        <a class="link_tel icon-phone headtext">我的订单</a>
    </div>
    <div class="center" id="container">
    <nav class="group_card">
        <ul>
            <li class="card1 on" onclick="changeType('card1');">已完成(<span id="counts"><?php  echo $order_total_part1;?></span>)</li>
            <li class="card2" onclick="changeType('card2');">待完成(<span id="counts2"><?php  echo $order_total_part2;?></span>)</li>
            <!-- <li class="card3" onclick="changeType('card3');">已付款(<span id="counts3"><?php  echo $order_total_part3;?></span>)</li>
            <li class="card4" onclick="changeType('card4');">已结算(<span id="counts4"><?php  echo $order_total_part4;?></span>)</li> -->
        </ul>
    </nav>
    <div class="card1 group_list on">
        <?php  if(is_array($order_list_part1)) { foreach($order_list_part1 as $items) { ?>
        <section id="des<?php  echo $items['id'];?>" style="margin-bottom: 10px; padding: 0;" class="off">
            <article>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;float: left;color: #000;font-size: 14px;">
                        订单号:<?php  echo $items['ordersn'];?>
                    </label>
                    <label style="margin-top: 0;">
                      
                            <span style="background-color:green;color: #fff;border-radius: 5px;padding: 2px;">
                                已完成
                            </span>
                      
                    </label>
                </header>
                <ul class="shot_orderInfo">
                    <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                订单类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['dining_mode']==1) { ?>店内<?php  } else if($items['dining_mode']==2) { ?>外卖<?php  } else { ?>预订<?php  } ?>
                                    </span>
                                下单日期:<?php  echo date('Y-m-d h:i:s',$items['dateline'])?>
                            </p>
                        </a>
                    </li>
                   <!--  <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                支付类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['paytype']==0) { ?>线下支付<?php  } else if($items['paytype']==1) { ?>余额支付<?php  } else if($items['paytype']==2) { ?>在线支付<?php  } ?>
                                    </span>
                            </p>
                        </a>
                    </li> -->
                </ul>
            </article>
            <article>
                <label>我的菜单</label>
                <ul id="Ul<?php  echo $items['id'];?>" class="myorder">
                    <?php  if(is_array($items['goods'])) { foreach($items['goods'] as $item) { ?>
                    <li>
                        <span class="dishName"><?php  echo $item['title'];?></span>
                        <i><?php  echo $item['price'];?>元/份</i>
                        <section class="bbox">
                            <input class="numBox" name="numBox" type="text" value="<?php  echo $item['total'];?>" readonly="readonly">
                        </section>
                    </li>
                    <?php  } } ?>
                </ul>
                <?php  if($items['dining_mode']==3) { ?>
                <div class="yuyue">
                    <label>预约时间</label>
                    <div> <?php  echo $items['meal_time'];?></div>
                </div>
                <?php  } ?>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;">
                        <i>应付金额：</i>
                        <b class="duiqi"><span><?php  echo $items['totalprice'];?></span>元</b>
                    </label>
                </header>
                <div style="padding-top: 10px;padding-left: 10px;">
                    <?php  if($items['dining_mode']!=1) { ?>
                    <p style="font-size: 12px;">姓名:<?php  echo $items['username'];?></p>
                    <p style="font-size: 12px;">电话:<?php  echo $items['tel'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==2) { ?>
                    <p style="font-size: 12px;">地址:<?php  echo $items['address'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']!=2) { ?>
                    <p style="font-size: 12px;">人数: <?php  echo $items['counts'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==1 || $items['dining_mode']==3) { ?>
                    <p style="font-size: 12px;">就餐形式: <?php  if($items['seat_type']==1) { ?>大厅<?php  } else { ?>包厢<?php  } ?></p>
                    <?php  } ?>
                    <?php  if($items['seat_type']==1 && $items['dining_mode']==1) { ?><p style="font-size: 12px;">桌号: <?php  echo $items['tables'];?></p><?php  } ?>
                    <?php  if($items['dining_mode']==3) { ?>
                    <?php  if(!empty($items['carports'])) { ?>
                    <p style="font-size: 12px;">预订车位: <?php  echo $items['carports'];?></p>
                    <?php  } ?>
                    <?php  } ?>
                    <?php  if(!empty($items['remark'])) { ?>
                    <p style="font-size: 12px;">备注: <?php  echo $items['remark'];?></p>
                    <?php  } ?>
                    <?php  if(!empty($items['reply'])) { ?>
                    <p style="font-size: 12px;">店家回复: <span style="color:#f00;"><?php  echo $items['reply'];?></span></p>
                    <?php  } ?>
                </div>
            </article>
        </section>
        <?php  } } ?>
    </div>
    <div class="card2 group_list">
        <?php  if(is_array($order_list_part2)) { foreach($order_list_part2 as $items) { ?>
        <section id="des<?php  echo $items['id'];?>" style="margin-bottom: 10px; padding: 0;" class="off">
            <article>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;float: left;color: #000;font-size: 14px;">
                        订单号:<?php  echo $items['ordersn'];?>
                    </label>
                    <label style="margin-top: 0;">
                        <?php  if($items['status']==0) { ?>
                            <span style="background-color:#b7b7b7;color: #fff;border-radius: 5px;padding: 2px;">
                                	等待用户确认
                            </span>
                          <?php  } else { ?>
                           <span style="background-color:#b7b7b7;color: #fff;border-radius: 5px;padding: 2px;">
                                	正在配送...
                            </span>
                         <?php  } ?>
                         
                      
                    </label>
                </header>
                <ul class="shot_orderInfo">
                    <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                订单类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['dining_mode']==1) { ?>店内<?php  } else if($items['dining_mode']==2) { ?>外卖<?php  } else { ?>预订<?php  } ?>
                                    </span>
                                下单日期:<?php  echo date('Y-m-d h:i:s',$items['dateline'])?>
                            </p>
                        </a>
                    </li>
                   <!--  <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                支付类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['paytype']==0) { ?>线下支付<?php  } else if($items['paytype']==1) { ?>余额支付<?php  } else if($items['paytype']==2) { ?>在线支付<?php  } ?>
                                    </span>
                            </p>
                        </a>
                    </li> -->
                </ul>
            </article>
            <article>
                <label>我的菜单</label>
                <ul id="Ul<?php  echo $items['id'];?>" class="myorder">
                    <?php  if(is_array($items['goods'])) { foreach($items['goods'] as $item) { ?>
                    <li>
                        <span class="dishName"><?php  echo $item['title'];?></span>
                        <i><?php  echo $item['price'];?>元/份</i>
                        <section class="bbox">
                            <input class="numBox" name="numBox" type="text" value="<?php  echo $item['total'];?>" readonly="readonly">
                        </section>
                    </li>
                    <?php  } } ?>
                </ul>
                <?php  if($items['dining_mode']==3) { ?>
                <div class="yuyue">
                    <label>预约时间</label>
                    <div> <?php  echo $items['meal_time'];?></div>
                </div>
                <?php  } ?>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;">
                        <i>应付金额：</i>
                        <b class="duiqi"><span><?php  echo $items['totalprice'];?></span>元</b>
                    </label>
                </header>
                <div style="padding-top: 10px;padding-left: 10px;">
                    <?php  if($items['dining_mode']!=1) { ?>
                    <p style="font-size: 12px;">姓名:<?php  echo $items['username'];?></p>
                    <p style="font-size: 12px;">电话:<?php  echo $items['tel'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==2) { ?>
                    <p style="font-size: 12px;">地址:<?php  echo $items['address'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']!=2) { ?>
                    <p style="font-size: 12px;">人数: <?php  echo $items['counts'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==1 || $items['dining_mode']==3) { ?>
                    <p style="font-size: 12px;">就餐形式: <?php  if($items['seat_type']==1) { ?>大厅<?php  } else { ?>包厢<?php  } ?></p>
                    <?php  } ?>
                    <?php  if($items['seat_type']==1 && $items['dining_mode']==1) { ?><p style="font-size: 12px;">桌号: <?php  echo $items['tables'];?></p><?php  } ?>
                    <?php  if($items['dining_mode']==3) { ?>
                    <?php  if(!empty($items['carports'])) { ?>
                    <p style="font-size: 12px;">预订车位: <?php  echo $items['carports'];?></p>
                    <?php  } ?>
                    <?php  } ?>
                    <?php  if(!empty($items['remark'])) { ?>
                    <p style="font-size: 12px;">备注: <?php  echo $items['remark'];?></p>
                    <?php  } ?>
                    <?php  if(!empty($items['reply'])) { ?>
                    <p style="font-size: 12px;">店家回复: <span style="color:#f00;"><?php  echo $items['reply'];?></span></p>
                    <?php  } ?>
                </div>
                  <?php  if($items['status']==0) { ?>
                <div style="padding-top: 10px; ">
                    <a href="<?php  echo $this->createMobileUrl('OrderConfirm', array('orderid' => $items['id'], 'storeid' => $item['storeid'], 'from_user' => $page_from_user))?>" class="btn_2">确认订单</a>
                </div>
                 <?php  } ?>
            </article>
        </section>
        <?php  } } ?>
    </div>
   <!--  <div class="card3 group_list">
        <?php  if(is_array($order_list_part3)) { foreach($order_list_part3 as $items) { ?>
        <section id="des<?php  echo $items['id'];?>" style="margin-bottom: 10px; padding: 0;" class="off">
            <article>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;float: left;color: #000;font-size: 14px;">
                        订单号:<?php  echo $items['ordersn'];?>
                    </label>
                    <label style="margin-top: 0;">
                        <?php  if($items['sign']==1) { ?>
                            <span style="background-color:green;color: #fff;border-radius: 5px;padding: 2px;">
                                已处理
                            </span>
                        <?php  } else if($items['sign']==-1) { ?>
                            <span style="background-color: #f00;color: #fff;border-radius: 5px;padding: 2px;">
                                已拒绝
                            </span>
                        <?php  } else { ?>
                            <span style="background-color:#b7b7b7;color: #fff;border-radius: 5px;padding: 2px;">
                                未处理
                            </span>
                        <?php  } ?>
                    </label>
                </header>
                <ul class="shot_orderInfo">
                    <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                订单类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['dining_mode']==1) { ?>店内<?php  } else if($items['dining_mode']==2) { ?>外卖<?php  } else { ?>预订<?php  } ?>
                                    </span>
                                下单日期:<?php  echo date('Y-m-d h:i:s',$items['dateline'])?>
                            </p>
                        </a>
                    </li>
                    <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                支付类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['paytype']==0) { ?>线下支付<?php  } else if($items['paytype']==1) { ?>余额支付<?php  } else if($items['paytype']==2) { ?>在线支付<?php  } ?>
                                    </span>
                            </p>
                        </a>
                    </li>
                </ul>
            </article>
            <article>
                <label>我的菜单</label>
                <ul id="Ul<?php  echo $items['id'];?>" class="myorder">
                    <?php  if(is_array($items['goods'])) { foreach($items['goods'] as $item) { ?>
                    <li>
                        <span class="dishName"><?php  echo $item['title'];?></span>
                        <i><?php  echo $item['price'];?>元/份</i>
                        <section class="bbox">
                            <input class="numBox" name="numBox" type="text" value="<?php  echo $item['total'];?>" readonly="readonly">
                        </section>
                    </li>
                    <?php  } } ?>
                </ul>
                <?php  if($items['dining_mode']==3) { ?>
                <div class="yuyue">
                    <label>预约时间</label>
                    <div> <?php  echo $items['meal_time'];?></div>
                </div>
                <?php  } ?>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;">
                        <i>应付金额：</i>
                        <b class="duiqi"><span><?php  echo $items['totalprice'];?></span>元</b>
                    </label>
                </header>
                <div style="padding-top: 10px;padding-left: 10px;">
                    <?php  if($items['dining_mode']!=1) { ?>
                    <p style="font-size: 12px;">姓名:<?php  echo $items['username'];?></p>
                    <p style="font-size: 12px;">电话:<?php  echo $items['tel'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==2) { ?>
                    <p style="font-size: 12px;">地址:<?php  echo $items['address'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']!=2) { ?>
                    <p style="font-size: 12px;">人数: <?php  echo $items['counts'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==1 || $items['dining_mode']==3) { ?>
                    <p style="font-size: 12px;">就餐形式: <?php  if($items['seat_type']==1) { ?>大厅<?php  } else { ?>包厢<?php  } ?></p>
                    <?php  } ?>
                    <?php  if($items['seat_type']==1 && $items['dining_mode']==1) { ?><p style="font-size: 12px;">桌号: <?php  echo $items['tables'];?></p><?php  } ?>
                    <?php  if($items['dining_mode']==3) { ?>
                    <?php  if(!empty($items['carports'])) { ?>
                    <p style="font-size: 12px;">预订车位: <?php  echo $items['carports'];?></p>
                    <?php  } ?>
                    <?php  } ?>
                    <?php  if(!empty($items['remark'])) { ?>
                    <p style="font-size: 12px;">备注: <?php  echo $items['remark'];?></p>
                    <?php  } ?>
                    <?php  if(!empty($items['reply'])) { ?>
                    <p style="font-size: 12px;">店家回复: <span style="color:#f00;"><?php  echo $items['reply'];?></span></p>
                    <?php  } ?>
                </div>
            </article>
        </section>
        <?php  } } ?>
    </div>
    <div class="card4 group_list"> -->
        <?php  if(is_array($order_list_part4)) { foreach($order_list_part4 as $items) { ?>
        <section id="des<?php  echo $items['id'];?>" style="margin-bottom: 10px; padding: 0;" class="off">
            <article>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;float: left;color: #000;font-size: 14px;">
                        订单号:<?php  echo $items['ordersn'];?>
                    </label>
                    <label style="margin-top: 0;">
                        <?php  if($items['sign']==1) { ?>
                            <span style="background-color:green;color: #fff;border-radius: 5px;padding: 2px;">
                                已处理
                            </span>
                        <?php  } else if($items['sign']==-1) { ?>
                            <span style="background-color: #f00;color: #fff;border-radius: 5px;padding: 2px;">
                                已拒绝
                            </span>
                        <?php  } else { ?>
                            <span style="background-color:#b7b7b7;color: #fff;border-radius: 5px;padding: 2px;">
                                未处理
                            </span>
                        <?php  } ?>
                    </label>
                </header>
                <ul class="shot_orderInfo">
                    <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                订单类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['dining_mode']==1) { ?>店内<?php  } else if($items['dining_mode']==2) { ?>外卖<?php  } else { ?>预订<?php  } ?>
                                    </span>
                                下单日期:<?php  echo date('Y-m-d h:i:s',$items['dateline'])?>
                            </p>
                        </a>
                    </li>
                    <li style="border-top: 0;height: 18px; margin-top: 0;width: 100%;">
                        <a href="javascript:;" style="color: #888; display: block;">
                            <p style="font-size: 12px;">
                                支付类型:
                                    <span style="color:#f00;">
                                        <?php  if($items['paytype']==0) { ?>线下支付<?php  } else if($items['paytype']==1) { ?>余额支付<?php  } else if($items['paytype']==2) { ?>在线支付<?php  } ?>
                                    </span>
                            </p>
                        </a>
                    </li>
                </ul>
            </article>
            <article>
                <label>我的菜单</label>
                <ul id="Ul<?php  echo $items['id'];?>" class="myorder">
                    <?php  if(is_array($items['goods'])) { foreach($items['goods'] as $item) { ?>
                    <li>
                        <span class="dishName"><?php  echo $item['title'];?></span>
                        <i><?php  echo $item['price'];?>元/份</i>
                        <section class="bbox">
                            <input class="numBox" name="numBox" type="text" value="<?php  echo $item['total'];?>" readonly="readonly">
                        </section>
                    </li>
                    <?php  } } ?>
                </ul>
                <?php  if($items['dining_mode']==3) { ?>
                <div class="yuyue">
                    <label>预约时间</label>
                    <div> <?php  echo $items['meal_time'];?></div>
                </div>
                <?php  } ?>
                <header style="border-bottom: 1px solid #ddd; overflow: hidden; margin: 0;">
                    <label style="margin-top: 0;">
                        <i>应付金额：</i>
                        <b class="duiqi"><span><?php  echo $items['totalprice'];?></span>元</b>
                    </label>
                </header>
                <div style="padding-top: 10px;padding-left: 10px;">
                    <?php  if($items['dining_mode']!=1) { ?>
                    <p style="font-size: 12px;">姓名:<?php  echo $items['username'];?></p>
                    <p style="font-size: 12px;">电话:<?php  echo $items['tel'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==2) { ?>
                    <p style="font-size: 12px;">地址:<?php  echo $items['address'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']!=2) { ?>
                    <p style="font-size: 12px;">人数: <?php  echo $items['counts'];?></p>
                    <?php  } ?>
                    <?php  if($items['dining_mode']==1 || $items['dining_mode']==3) { ?>
                    <p style="font-size: 12px;">就餐形式: <?php  if($items['seat_type']==1) { ?>大厅<?php  } else { ?>包厢<?php  } ?></p>
                    <?php  } ?>
                    <?php  if($items['seat_type']==1 && $items['dining_mode']==1) { ?><p style="font-size: 12px;">桌号: <?php  echo $items['tables'];?></p><?php  } ?>
                    <?php  if($items['dining_mode']==3) { ?>
                    <?php  if(!empty($items['carports'])) { ?>
                    <p style="font-size: 12px;">预订车位: <?php  echo $items['carports'];?></p>
                    <?php  } ?>
                    <?php  } ?>
                    <?php  if(!empty($items['remark'])) { ?>
                    <p style="font-size: 12px;">备注: <?php  echo $items['remark'];?></p>
                    <?php  } ?>
                    <?php  if(!empty($items['reply'])) { ?>
                    <p style="font-size: 12px;">店家回复: <span style="color:#f00;"><?php  echo $items['reply'];?></span></p>
                    <?php  } ?>
                </div>
            </article>
        </section>
        <?php  } } ?>
    </div>
    <footer class="footFix footLeft">
        <a onclick="location.href='<?php  echo create_url('mobile/module', array('do' => 'waprestlist', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>'">门店列表</a>
        <a onclick="location.href='<?php  echo create_url('mobile/module', array('do' => 'waplist', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>'">菜品列表</a>
    </footer>
    </div>
    <script>
        window.addEventListener("DOMContentLoaded", function () {
            var container = document.getElementById("container");
            container.addEventListener("click", function (evt) {
                if ("container" == evt.target.getAttribute("id")) { return; }
                var sections = container.querySelectorAll("section");
                var section = getCloesestTagE(evt.target, "SECTION");
                for (var i = 0, ci; ci = sections[i]; i++) {
                    if (section == ci) {
                        (function (ci) {
                            section.className = section.className.replace(/on|off/g, function ($1) {
                                var style = "height:auto;";
                                var classType = "off";
                                switch ($1) {
                                    case "on":
                                        style = "";
                                        classType = "off";
                                        break;
                                    case "off":
                                        classType = "on";
                                        break;
                                }
                                setTimeout(function () {
                                    ci.style.height = ("off" == classType) ? "73px" : "auto";
                                }, 300);
                                return classType;
                            });
                        })(ci);
                    } else {
                        ci.className = ci.className.replace("on", "off");
                        //ci.style.height = "73";
                    }
                }
            }, false);
            function getCloesestTagE(tar, tag) {
                while (tag !== tar.tagName) {
                    tar = tar.parentNode;
                }
                return tar;
            }
        }, false);

        function changeType(obj) {
            $(".card1").removeClass("on");
            $(".card2").removeClass("on");
            $(".card3").removeClass("on");
            $(".card4").removeClass("on");

            $("."+obj).addClass("on");
            //$("#card1, #card2, #card3, #group_list_1, #group_list_2, #group_list_3").toggleClass("on");
        }

//        function changeType(thi, evt) {
//            $("#card1, #card2, #group_list_1, #group_list_2").toggleClass("on");
//        }
        function Dodel(id, type) {
            if (confirm("确定删除?")) {
                $.ajax({
                    url: '', type: "post", dataType: "json", timeout: "10000",
                    data: { "type": "del", "outletid": "", "acid": "7213", "wid": "426019", "oid": id },
                    success: function (data) {
                        alert(data.msg);
                        if (data.msg == "删除成功") {
                            $("#sec" + id).remove();
                            if (type == "1") { $("#counts").text(parseInt($("#counts").text()) - 1); } else {
                                $("#nocounts").text(parseInt($("#nocounts").text()) - 1);
                            }
                        }
                    },
                    error: function () {
                        alert("删除失败。。");
                    }
                });
            }
        }
    </script>
</body>
</html>
