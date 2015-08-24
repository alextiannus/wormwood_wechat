<?php defined('IN_IA') or exit('Access Denied');?><html lang="zh-CN"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no">
<title>我的菜单</title>
<link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/1/wei_canyin_v1.8.4.css?v=1.0" media="all">
<link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/1/wei_dialog_v1.2.1.css?v=1.0" media="all">
<script type="text/javascript" src="./source/modules/idish/template/js/1/wei_webapp_v2_common_v1.9.4.js"></script>
<style>abbr,article,aside,audio,canvas,datalist,details,dialog,eventsource,fieldset,figure,figcaption,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,small,time,video,legend{display:block;}</style>
<script type="text/javascript" src="./source/modules/idish/template/js/1/wei_dialog_v1.9.9.js"></script>
<script type="text/javascript" src="./source/modules/idish/template/js/2/jQuery.js"></script>
<link rel="stylesheet" type="text/css" href="./source/modules/idish/template/css/2/mobiscroll.custom-2.6.2.min.css" media="all">
<script type="text/javascript" src="./source/modules/idish/template/js/2/mobiscroll.custom-2.6.2.min.js"></script>

<script type="text/javascript">
    $(function () {
        var dat = new Date();
        var curr = dat.getFullYear();
        var currM = dat.getMonth();
        var currD = dat.getDate();
        var opt = {}
        opt.date = { preset: 'date', minDate: new Date(curr, currM, currD, 9, 22), maxDate: new Date(curr, currM + 1, currD, 15, 44), stepMinute: 5 };
        opt.datetime = { preset: 'datetime', minDate: new Date(2012, 3, 10, 9, 22), maxDate: new Date(2014, 7, 30, 15, 44), stepMinute: 5 };
        opt.time = { preset: 'time' };
        $('#sdate').scroller('destroy').scroller($.extend(opt['date'], { theme: 'ios', mode: 'scroller', display: 'bottom', lang: 'zh', dateOrder: 'yymmdd', dateFormat: 'yy-mm-dd' }));
    });
</script>
<style>
    .btn_1{
        display:block;
        border:1px solid #d8d8d8;
        border-radius:3px;
        padding:10px;
        color:#666;
        background:-webkit-gradient(linear, 0 0, 0 100%, from(#fefefe), to(#efefef));
    }

    .btn_2{
        display:block;
        width:150px;
        margin:auto;
        line-height:35px;
        text-align:center;
        padding:0 5px;
        color:#fff;
        background:-webkit-gradient(linear, 0 0, 0 100%, from(#2ec366), to(#2ec366));
        border:1px solid #40bb6e;
        border-radius:3px;
        font-size:15px;
    }

    .table_book{
        width:100%;
    }

    .table_book td{
        padding:5px 3px;
        white-space:nowrap;
    }

    .table_book input[type="text"], .table_book input[type="tel"], .table_book textarea{
        padding:8px;
        background:#eaeaea;
        border-radius:12px;
        border:1px solid #dedede;
        outline:none;
        resize:none;
        width:100%;
        -webkit-box-sizing:border-box;
        box-shadow:none;
    }

    .table_book select{
        display:inline-block;
        -webkit-appearance:button;
        border:1px solid #dedede;
        border-radius:12px;
        padding:8px;
        background:-webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#f2f2f2));
        background-size:auto auto;
        outline:none;
    }

    .group_radio{
        border:1px solid #dedede;
        border-radius:18px;
        display:inline-block;
        overflow:hidden;
    }

    .group_radio input[type="radio"]{
        -webkit-appearance:button;
        display:inline-block;
        width:50px;
        height:35px;
        border-radius:0;
        border:0;
        background:-webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#f2f2f2));
    }
    .group_radio span{
        position:relative;
        display:inline-block;
        height:35px;
        width:50px;
        float:left;
        border-right:1px solid #ccc;
    }
    .group_radio span:last-of-type{
        border:0;
    }
    .group_radio span:first-child input{
        border-radius:16px 0 0 16px;
    }
    .group_radio span:last-child input{
        border-radius:0 15px 15px 0;
    }
    .group_radio span label{
        content:attr(data-title);
        position:absolute;
        top:0;
        left:0;
        z-index:10;
        color:red;
        display:inline-block;
        width:50px;
        line-height:35px;
        text-align:center;
        overflow:hidden;
        color:#666666;
        pointer-events:none;
    }
    .group_radio input[type="radio"]:checked{
        background:-webkit-gradient(linear, 0 0, 0 100%, from(#0fa442), to(#1ebe5f));
    }
    .group_radio input[type="radio"]:checked+label{
        color:#fff;
    }
    .group_checkbox{
        overflow:hidden;
        border-radius:16px;
        position: relative;
    }
    .group_checkbox input[type="checkbox"]{
        -webkit-appearance:button;
        padding:8px;
        width:70px;
        border-radius:16px;
        border:1px solid #dedede;
        display:inline-block;
        height:35px;
        background:url(./source/modules/idish/template/images/btn1.png#1), -webkit-gradient(linear, 0 0, 0 100%, from(#0fa442), to(#1ebe5f));
        background-size:auto 32px, auto auto;
        background-position:right center;
        background-repeat: no-repeat;
    }
    .group_checkbox input[type="checkbox"]:checked{
        background-position:0px center;
    }
    .btn_myorder {
        padding: 5px 8px; border: 0; border-radius: 2px; cursor: pointer; background-color: #2ec366; color: #fff;
    }
</style>
</head>
<body id="page_intelOrder" class="myOrderCon">
<div class="center">
    <header>
        <span class="pCount">请叫服务员下单</span>
        <label><i>共计：</i><b class="duiqi" id="total">0</b><b class="duiqi">元</b></label>
    </header>
    <section style="margin-bottom: 10px;">
        <article style="overflow: hidden;">
            <a href="<?php  echo $this->createMobileurl('orderlist', array('from_user' => $page_from_user, 'storeid' => $storeid))?>" class="btn_add btn_myorder">我的订单</a>
            <span style="float: right;"><?php  echo $my_order_total;?></span>
        </article>
    </section>
    <section>
        <article>
            <h2>我的菜单
                <button class="btn_add emptyIt" id="clearBtn">清空</button>
                <button class="btn_add" onclick="location.href='<?php  echo create_url('mobile/module', array('do' => 'waplist', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>'">+加菜</button>
            </h2>
            <ul class="myorder" id="myorder">
                <?php  if(is_array($cart)) { foreach($cart as $item) { ?>
                <li>
                    <span class="dishName"><?php  echo $item['title'];?></span>
                    <?php  if($item['isspecial']==1) { ?>
                    <i><?php  echo $item['productprice'];?>元/<?php  echo $item['unitname'];?></i>
                    <?php  } else { ?>
                    <i><?php  echo $item['marketprice'];?>元/<?php  echo $item['unitname'];?><span class="yuanjia"><?php  echo $item['productprice'];?>元/<?php  echo $item['unitname'];?></span></i>
                    <?php  } ?>
                    <section class="bbox" dishid="<?php  echo $item['id'];?>" dishname="<?php  echo $item['title'];?>"> <input class="btn-reduce" type="button" value="-"><input class="numBox" name="numBox" type="text" value="<?php  echo $item['total'];?>" price="<?php  if($item['isspecial']==1) { ?><?php  echo $item['productprice'];?><?php  } else { ?><?php  echo $item['marketprice'];?><?php  } ?>" disabled="disabled"><input type="button" class="btn-plus" value="+"></section>
                </li>
                <?php  } } ?>
            </ul>
        </article>
    </section>

    <?php  if($setting['order_enable'] == 1 && !empty($setting)) { ?>
    <section style="margin-bottom: 20px;">
        <article>
            <div id="form_dish" target="hide">
                <input type="hidden" name="id" value="">
                <table class="table_book">
                    <tbody>
                    <tr>
                        <td width="80px" style="width: 80px;">订单类型：</td>
                        <td colspan="2">
                            <div class="group_radio">
                            <span>
                                <input type="radio" name="order_type" value="1" checked>
                                <label>店内</label>
                            </span>
                            <span>
                                <input type="radio" name="order_type" value="2">
                                <label>外卖</label>
                            </span>
                            <span>
                                <input type="radio" name="order_type" value="3">
                                <label>预订</label>
                            </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="80px" style="width: 80px;">手机号码：</td>
                        <td colspan="2">
                            <input type="tel" id="tel" name="tel" value="<?php  if(!empty($user['mobile'])) { ?><?php  echo $user['mobile'];?><?php  } else { ?>(必填*)请输入您的手机号码<?php  } ?>" maxlength="13" style="width: 200px;"></td>
                    </tr>
                    <tr>
                        <td style="width: 80px;">用户姓名：</td>
                        <td style="width: 50%;">
                            <input type="text" name="guest_name" id="name" value="<?php  if(!empty($user['realname'])) { ?><?php  echo $user['realname'];?><?php  } else { ?>(必填*)请输入您的真实姓名<?php  } ?>" maxlength="10" style="width: 100px;">
                        </td>
                        <td>
                            <div class="group_checkbox" style="width: 70px; display: inline;">
                                <input type="checkbox" value="1" name="sex" checked="checked">
                            </div>
                        </td>
                    </tr>
                    <tr class="book">
                        <td style="width: 80px;">预订时间：</td>
                        <td colspan="2">
                            <input id="sdate" name="sdate" type="text" style="width: 100px;" readonly="">
                            <select name="time_hour" id="hour">
                                <option value="01">01时</option>
                                <option value="02">02时</option>
                                <option value="03">03时</option>
                                <option value="04">04时</option>
                                <option value="05">05时</option>
                                <option value="06">06时</option>
                                <option value="07">07时</option>
                                <option value="08">08时</option>
                                <option value="09">09时</option>
                                <option value="10">10时</option>
                                <option value="11">11时</option>
                                <option value="12">12时</option>
                                <option value="13">13时</option>
                                <option value="14">14时</option>
                                <option value="15">15时</option>
                                <option value="16">16时</option>
                                <option value="17">17时</option>
                                <option value="18">18时</option>
                                <option value="19">19时</option>
                                <option value="20">20时</option>
                                <option value="21">21时</option>
                                <option value="22">22时</option>
                                <option value="23">23时</option>
                                <option value="24">24时</option>
                            </select>
                            <select name="time_second" id="minute">
                                <option value="00">00分</option>
                                <option value="10">10分</option>
                                <option value="20">20分</option>
                                <option value="30">30分</option>
                                <option value="40">40分</option>
                                <option value="50">50分</option>
                                <option value="60">60分</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="in">
                        <td style="width: 80px;">人数：</td>
                        <td colspan="2">
                            <input type="tel" id="counts" name="counts" value="1" maxlength="3" style="width: 100px;">
                        </td>
                    </tr>
                    <tr class="in" id="tr_tables">
                        <td style="width: 80px;">桌号：</td>
                        <td colspan="2">
                            <input type="tel" id="tables" name="tables" value="" maxlength="3" style="width: 100px;">
                        </td>
                    </tr>
                    <tr class="in">
                        <td style="width: 80px;">就餐形式：</td>
                        <td colspan="2">
                            <div class="group_radio">
                                <span>
                                    <input type="radio" name="seat_type" value="2">
                                    <label>包间</label>
                                </span>
                                <span>
                                    <input type="radio" name="seat_type" value="1">
                                    <label>大厅</label>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="book">
                        <td style="width: 80px;">预定车位：</td>
                        <td colspan="2">
                            <input type="text" id="carports" name="carports" value="0" maxlength="3" style="width: 100px;">
                        </td>
                    </tr>
                    <tr class="out">
                        <td width="80px" style="width: 80px;">地址：</td>
                        <td colspan="2">
                            <input type="text" id="address" name="address" value="<?php  if(!empty($order['address'])) { ?><?php  echo $order['address'];?><?php  } else { ?>(必填*)请输入您的联系地址！<?php  } ?>" style="width: 200px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 80px; vertical-align: top; line-height: 25px;">备注说明：</td>
                        <td colspan="2">
                            <textarea name="remark" id="remark" style="height: 60px;" maxlength="100"></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <footer>
                    <input type="button" value="立即预定" class="btn_2" id="submit_form">
                </footer>
            </div>
        </article>
    </section>
    <?php  } ?>
    <!--<footer class="footFix">-->
        <!--&lt;!&ndash;<a onclick="shareMenu()">分享给好友</a>&ndash;&gt;-->
        <!--<a onclick="location.href='<?php  echo create_url('mobile/module', array('do' => 'waplist', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>'">继续点菜</a>-->
    <!--</footer>-->
</div>
<script>var pageName = 'menuFilled';</script>
<script type="text/javascript">
var reduce = _qAll('.btn-reduce');
var plus = _qAll('.btn-plus');
var share = _qAll('.shareBtn');
//金额累加操作
function tototal(){
    var total = 0;
    var nums = _qAll('.numBox');
    for( var j = 0; j < nums.length; j++){
        total = total + nums[j].value * nums[j].getAttribute('price');
    }
    endTotal = parseFloat(total).toFixed(2) * 100/100;
    // endTotal = endTotal == parseInt(endTotal) ? parseInt(endTotal) : endTotal;
    _q('#total').innerHTML = endTotal;
    return endTotal;
}
tototal();//初始化金额
function doSelectBtn(){
    var btn = _qAll("article ul li .bbox");
        var btnIndex = 0,btnLength = btn.length;
    for(btnIndex;btnIndex<btnLength;btnIndex++){
        var countNumText=parseInt(btn[btnIndex].children[1].value),
            btnAdd=btn[btnIndex].children[2],
            btnMin=btn[btnIndex].children[0];
        var iTimeout,iInterval,originalNum,
            beforeRemoveDish = false;
        btnAdd.addEventListener(_movestartEvt,function(){
            var _self = this;
            originalNum = parseInt(_self.parentNode.children[1].value, 10);
            countNumText =  originalNum +1;
            _self.parentNode.children[1].value = countNumText;
            iTimeout = setTimeout(function(){
                iInterval = setInterval(function(){
                    countNumText++;
                    _self.parentNode.children[1].value = countNumText;
                },100)
            },1000)
        })
        btnAdd.addEventListener(_moveendEvt,function(){
            //alert(countNumText)
            //_doAjax()...
            clearTimeout(iTimeout);
            clearInterval(iInterval);
            tototal();
            var _self = this;
            var countNumText =  parseInt(_self.parentNode.children[1].value, 10);
            var dishid = _self.parentNode.getAttribute('dishid');
            ajaxDishReset(dishid, countNumText, function(){}, function() {
                _self.parentNode.children[1].value = originalNum;
                tototal();
            });
            // countNumText = 0;
        })

        btnMin.addEventListener(_movestartEvt,function(){
            var _self = this;
            originalNum = parseInt(_self.parentNode.children[1].value, 10);
            countNumText =  originalNum -1;
            if(countNumText <= 0){
                beforeRemoveDish = true;
            }else{
                _self.parentNode.children[1].value = countNumText;
                iTimeout = setTimeout(function(){
                    iInterval = setInterval(function(){
                        if(countNumText<=0){
                            beforeRemoveDish = true;
                            _self.parentNode.children[1].value = originalNum;
                            clearInterval(iInterval);
                            return;
                        }
                        countNumText--;
                        _self.parentNode.children[1].value = countNumText;
                    },100)
                },1000)
            }
        })

        btnMin.addEventListener(_moveendEvt,function(){
            clearTimeout(iTimeout);
            clearInterval(iInterval);
            _self = this;

            var dishid = _self.parentNode.getAttribute('dishid');
            var dishName = _self.parentNode.getAttribute('dishName');
            var countNumText =  parseInt(_self.parentNode.children[1].value, 10);

            if(beforeRemoveDish){
                setTimeout(function(){
                    MDialog.confirm(
                        '', '是否删除' + dishName +'？', null,
                        '确定', function(){
                            ajaxDishRemove(dishid, function(){
                                var li = _self.parentNode.parentNode;
                                li.parentNode.removeChild(li);
                                var total = tototal();
                                // 没有数据后刷新页面
                                if (total == 0) {
                                    location.reload();
                                }
                            }, function() {
                                _self.parentNode.children[1].value = originalNum;
                                tototal();
                            });
                        }, null,
                        '取消', null, null,null, true, true
                    );
                },500)
                beforeRemoveDish = false;
            } else {
                tototal();
                ajaxDishReset(dishid, countNumText, function(){}, function() {
                     _self.parentNode.children[1].value = originalNum;
                    tototal();
                });
            }
        })
    } // for

    //更新分类菜品数量
    function ajaxDishReset(dishid, o2uNum, successCallback, errorCallback) {
        var params = {
            'dishid' : dishid,
            'o2uNum' : o2uNum
        };
        var url = "<?php  echo create_url('mobile/module', array('do' => 'UpdateDishNumOfCategory', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>";

        _doAjax(url, 'POST', params, function(ret) {
            if (ret['message']['code'] != 0) {
                errorCallback();
                alert(ret['message']['msg']);
                return;
            } else {
                successCallback();
            }
            successCallback();
        });
    } // ajaxDishReset

    function ajaxDishRemove(dishid, successCallback, errorCallback) {
        var params = {
            'dishid' : dishid,
            'action' : 'remove'
        };

        var url = "<?php  echo create_url('mobile/module', array('do' => 'RemoveDishNumOfCategory', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>";
        _doAjax(url, 'POST', params, function(ret) {
            if (ret['message']['code']!= 0) {
                errorCallback();
                alert(ret['message']['msg']);
                return;
            } else {
                successCallback();
            }
        });
    } // ajaxDishRemove
} // doSelectBtn

function shareMenu(){
    var params = {
        'qrcode' : qrcode,
        'ticket' : ticket,
        'ticketSource' : ticketSource
    };
    MLoading.show('加载中');
    setTimeout(function(){MLoading.hide();},3000);
    _doAjax('/weixin/dish/share', 'POST', params, function(ret){
        MLoading.hide();
        if (ret['code'] != 0) {
            alert(ret['message']);
            return;
        }
        var result = ret['result']['data'];
        WeixinJSBridge.invoke('sendAppMessage',{
            "appid":result.appid,
            "img_url":result.img_url,
            "img_width":"640",
            "img_height":"640",
            "link":result.link,
            "desc":result.desc,
            "title":result.title
            }, function(res) {
                if (res.err_msg == 'send_app_msg:ok' || res.err_msg == 'send_app_msg:confirm') {
            }
        });
    }); // _doAjax
}

_onPageLoaded(function(){
    var reduce = _qAll('.btn-reduce');
    var plus = _qAll('.btn-plus');
    tototal();//初始化金额
    doSelectBtn();

    var url = "<?php  echo create_url('mobile/module', array('do' => 'clearmenu', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>";
    _q('#clearBtn').onclick = function() {
        MDialog.confirm(
            '', '是否清空菜单？', null,
            '确定', function(){
                window.location.href = url;
            }, null,
            '取消', null, null,
            null, true, true
        );
    };

    $("#tel").focus(function () {
        if (this.value == "(必填*)请输入您的手机号码") { this.value = ''; }
    }).blur(function () {
        if (this.value == "") {this.value = "(必填*)请输入您的手机号码"; }
    });

    $("#name").focus(function () {
        if (this.value == "(必填*)请输入您的真实姓名") {
            this.value = '';
        }
    }).blur(function () {
        if (this.value == "") {this.value = "(必填*)请输入您的真实姓名";}
    });

    $("#address").focus(function () {
        if (this.value == "(必填*)请输入您的联系地址！") { this.value = ''; }
    }).blur(function () {
        if (this.value == "") {this.value = "(必填*)请输入您的联系地址！"; }
    });

    $("#submit_form").click(function () {
        var bool = checkItem();
        if (bool) {
            MDialog.confirm(
                '', '确认提交吗？', null,
                '确定', function(){
                    postmain();
                }, null, '取消', null, null,null, true, true
            );
        }
    });
});

function checkItem() {
    var ordertype = $(':radio[name="order_type"]:checked').val();
    if ($("#tel").val() == "" || $("#tel").val() == "(必填*)请输入您的手机号码") { alert("请输入您的电话号码！"); return false; }
    if (!/^1[3|4|5|8][0-9]\d{8}$/.test($("#tel").val())) { alert("请输入正确的电话号码！"); return false; }
    if ($("#name").val() == "" || $("#name").val() == "(必填*)请输入您的真实姓名") { alert("请输入您的真实姓名！"); return false; }
    if ($("#total").text() == "0") { alert("金额为0，请选择菜品！"); return false; }
    if (ordertype == 1) {
        if ($("#counts").val() == "") { alert("请输入预定人数！"); return false; }
        if (!new RegExp("^[0-9]*$").test($("#counts").val())) { alert("预定人数只能为数字！"); return false; }
        if ($("input:radio[name='seat_type']:checked").attr("checked") == undefined) { alert("请选择就餐形式！"); return false; }
        if ($("#tables").val() == "") { alert("请输入桌号！"); return false; }
    } else if (ordertype == 2){
        if ($("#address").val() == "" || $("#address").val() == "(必填*)请输入您的联系地址！") { alert("请输入您的联系地址！"); return false; }
    } else {
        if ($("#counts").val() == "") { alert("请输入预定人数！"); return false; }
        if (!new RegExp("^[0-9]*$").test($("#counts").val())) { alert("预定人数只能为数字！"); return false; }
        if ($("input:radio[name='seat_type']:checked").attr("checked") == undefined) { alert("请选择就餐形式！"); return false; }
        if (!new RegExp("^[0-9]*$").test($("#carports").val())) { alert("预定车位只能为数字！"); return false; }
        if (parseInt($("#carports").val()) > 2) { alert("预定车位不能超过2个！"); return false; }
        if (parseInt($("#carports").val()) < 0) { alert("预定车位不能为负数"); return false; }
    }
    return true;
}

function postmain() {
    $("#submit_form").hide();
    if (true) {
        var data = "[";
        var myfoodlist = $("#myorder li");
        if (myfoodlist.length == 0) { return; }
        for (var i = 0; i < myfoodlist.length; i++) {
            data += "{"; data += "\"sid\":\"" + myfoodlist.eq(i).attr("name") + "\",";
            data += "\"counts\":\"" + myfoodlist.eq(i).find(".numBox").val() + "\""; data += "},";
        }
        data = data.substring(0, data.length - 1); data += "]";
        var url = "<?php  echo create_url('mobile/module', array('do' => 'addtoorder', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>";
        //alert(url);
        var address = $("#address").val();
        if (address == "(必填*)请输入您的联系地址！") address = "";
        $.ajax({
            url: url, type: "post", dataType: "json", timeout: "10000",
            data: {
                "type": "add", "total": $("#total").text(), "ordertype":$(':radio[name="order_type"]:checked').val(),"tables": $("#tables").val(),
                "guest_name": $("#name").val(), "tel": $("#tel").val(), "sex": $("input:checkbox[name='sex']").attr("checked") == "checked" ? "1" : "0",
                "time": $("#sdate").val() + " " + $("#hour").val() + ":" + $("#minute").val(), "counts": $("#counts").val(),
                "seat_type": $("input:radio[name='seat_type']:checked").val(), "remark": $("#remark").val(), "data": data, "carports": $("#carports").val(), "address":address
            },
            success: function (data) {
                if (data.message['code'] != 0) {
                    //alert(data.message['msg']);
                    //跳转去我的订单
                    window.location.href = "<?php  echo create_url('mobile/module', array('do' => 'orderconfirm', 'from_user' => $page_from_user, 'name' => 'idish', 'weid' => $weid, 'storeid' => $storeid))?>"+"&orderid="+data.message['orderid'];
                } else {
                    alert(data.message['msg']);
                    //'网络不稳定，请重新尝试!'
                }
                $("#submit_form").show();
            },error: function () {
                alert("订单提交失败！");
            }
        });
    } else {
        $("#submit_form").show();
    }
}

$(':radio[name="order_type"]').click(function () {
    order_type = $(':radio[name="order_type"]:checked').val();
    if(order_type == 1){
        $(".in").show();
        $(".out").hide();
        $(".book").hide();
    } else if(order_type == 2){
        $(".in").hide();
        $(".book").hide();
        $(".out").show();
    } else {
        $(".in").show();
        $(".book").show();
        $(".out").hide();
        $("#tr_tables").hide();
        //$("#tables").hide();
    }
});
order_type = $(':radio[name="order_type"]:checked').val();
if(order_type == 1){
    $(".in").show();
    $(".out").hide();
    $(".book").hide();
} else if(order_type == 2){
    $(".in").hide();
    $(".book").hide();
    $(".out").show();
} else {
    $(".in").show();
    $(".book").show();
    $(".out").hide();
    $("#tr_tables").hide();
}
</script>
</body>
</html>