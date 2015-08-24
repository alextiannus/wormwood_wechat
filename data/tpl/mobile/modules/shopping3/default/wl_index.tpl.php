<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/wei_canyin.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/wei_dialog.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>js/wei_webapp_v2_common.js"></script>
<title><?php  echo $set['shop_name'];?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
</head>
<body id="page_allMenu">
    
<div class="center">
    <nav id='navBar'>
        <dl>
            <!--<dt>分类</dt>-->
        </dl>
    </nav>

    <section id="infoSection">
        <article>
            <!--div class="h2">推荐菜</div-->
            <div id="pInfo">
                <!--current list-->
            </div>
        </article>
    </section>
    <?php  include $this->template(wl_footer, TEMPLATE_INCLUDEPATH);?> 
</div>
    <script type="text/javascript">
        window.selected = {
            total:<?php  echo $totalnum;?>,
            dishes: <?php  if(empty($idstr)) { ?>{}<?php  } else { ?><?php  echo $idstr;?><?php  } ?>,
        };
        var cardid = '3414907165';
        var view_const_dish_SPECIAL_PRICE_YES = '2';
        var view_const_dish_HOT_YES = '2';

        function setHeight(){
            var  cHeight;
            cHeight = document.documentElement.clientHeight;
            cHeight = cHeight +"px"
            document.getElementById("navBar").style.height =  cHeight;
            document.getElementById("infoSection").style.height =  cHeight;
        }
        function getAllList(){
            var params = {
            }
            MLoading.show('加载中');
             _doAjax("<?php  echo  $this->createMobileUrl('wldishlist')?>", "POST", params, function(res) {
                MLoading.hide();
                window.res = res;
                if(res && res.length){
                    switchList();
                    var navBar = document.getElementById("navBar");
                    var TPL = '<dd categoryid="{id}" class="{selectedClass}" onclick="switchList({id});">{name}</dd>';
                    (function(){
                       var dds_HTML = iTemplate.makeList(TPL, res, function(k,v){
                            return {
                                selectedClass: 0 ==k?"active":""
                            }
                       });
                       navBar.innerHTML = "<dl>" + dds_HTML + "</dl>";
                    })();
                }
            });
        }
        //
        function switchList(id){
            var ai = {};
            if(id){
                var dds = _qAll('#navBar dd');
                for(var i = 0;ci=window.res[i]; i++){
                    dds[i].className = null;
                    if(id == ci.id){
                        ai = ci;
                        dds[i].className = "active";
                    }
                }
            }else{
                ai = window.res[0];
            }
//            alert(id);return false;
            var checkHtml = '';
            var TPL = '<dl dunitname="例" dsubcount="1" dishid="{id}" dname="{name}" dtaste="" ddescribe="{note}" dprice="{price}" dishot="{tag_name}" dspecialprice="{discount_price}" disspecial="1" onclick="selectOne(this, {id}, {price});">\
                    <dt><h3>{name}{html_name}</h3></dt>\
                    <dd>\
                        <a href="javascript:void(0)" class="dataIn" onclick="showImgDetail(this);event.stopPropagation();">\
                            <img src="{pic}" alt="" title="">';

					TPL += '<span style="font-size:10px;">{tag_name}</span>';
                 TPL +='</a>\
                    </dd>\
                    <dd>\
                        <em>{price}元/{unit}</em>\
                    </dd>\
                     <input type="checkbox" class="favourite" style="border:0;" value="{id}" {check} onclick="favourite(this, event);">\
                    <button shopinfo="" class="{curState}"></button>\
                </dl>';
            document.getElementById("pInfo").innerHTML = iTemplate.makeList(TPL, ai.dishes, function(k,v){
				if(v.discount_price){
					v.price = v.discount_price;
				}
                return {
                    curState: (v.id in window.selected.dishes)? "selectBtn choose choosen":"selectBtn choose  unchoose",
                    check : (v.check == '1') ? "checked" : ''
                }
            });
        }
        //show img detail
        function showImgDetail(thi){
            var parentDl = thi.parentNode.parentNode;
            var childImg = thi.childNodes[0]
            if(childImg.nodeType == 3){
                childImg = thi.childNodes[1];
            }
            popPic(childImg.src,
                    parentDl.getAttribute('dname'),
                    parentDl.getAttribute('dprice') + '元/' + parentDl.getAttribute('dunitName'),
                    parentDl.getAttribute('dIsSpecial'),
                    parentDl.getAttribute('dSpecialPrice') + '元/' + parentDl.getAttribute('dunitName'),
                    parentDl.getAttribute('dsubCount'),
                    parentDl.getAttribute('dtaste'),
                    parentDl.getAttribute('ddescribe'),
                    parentDl.getAttribute('dishot')
                );
        }
        //

       function selectOne(container, dishid, price) {
            var btn = container.querySelectorAll("button")[0];
            if (btn.className.indexOf("choosen")>-1) {
                _removeClass(btn, 'choosen');
                _addClass(btn, 'unchoose');
                //unselected
                delete window.selected.dishes[dishid];
                window.selected.total -=1;
            } else {
                _removeClass(btn, 'unchoose');
                _addClass(btn, 'choosen');
                //selected
                window.selected.dishes[dishid] = {
                    price:price,
                    num:1
                }
                window.selected.total +=1;

            }
            if(!("origTotal" in window.selected)){
                window.selected.origTotal = parseInt(_q(".footer_menu .num").innerHTML);
            }
            _q(".footer_menu .num").innerHTML = window.selected.origTotal + window.selected.total;
            console.log(window.selected);
        }
        //
        function addToMenu(){
            var params = '[';
            for(var key in window.selected.dishes){
                params += '{"dishes_id":'+ key + ",",
                params += '"price":'+ window.selected.dishes[key].price + ",",
                params += '"nums":'+ window.selected.dishes[key].num + "},"
            }
            params = params.replace(/,$/, "");
            params += ']';

            $.ajax({
                'url':'<?php  echo  $this->createMobileUrl('wladdorder')?>',
                'data':{'order':params},
                'type':'POST',
                'async':'false',
                'success':function(db){
                    location.href='<?php  echo  $this->createMobileUrl('wlcart')?>';
                }
            });

        }

        //后台可自行扩展参数
        //调用自定义弹层
        function popPic(imgUrl,title,price, isSpecial, specialPrice, people,teast,assess,isHot){
            var _title = title,
                _price = price,
                _people = null;//people,
                _teast = teast,
                _assess = assess;

                var hotHtml = '<b>'+isHot+'</b>';
                _tmpHtml = "<div class='content'>"+hotHtml+"<img src='"+imgUrl+"' alt='' title=''><h2>"+_title;

                 if (isSpecial == view_const_dish_SPECIAL_PRICE_YES) {
                     _tmpHtml += "<i>"+specialPrice+"</i><del>"+_price+"</del>";
                 } else {
                     _tmpHtml += "<i>"+_price+"</i>";
                 }

                if (_people) {
                    _tmpHtml += "<span>"+_people+"人点过</span>";
                }
                _tmpHtml += "</h2>";

                if (_teast) {
                    _tmpHtml += "<h3>口味："+_teast+"</h3>";
                }

                if (_assess) {
                    _tmpHtml += "<p>"+_assess+"</p>";
                }

                _tmpHtml += '</div>';
            MDialog.popupCustom(_tmpHtml,true,true);
        }

        window.addEventListener("DOMContentLoaded", function(){
            getAllList();
            setHeight();
        }, false);
        window.onresize = function(){setHeight();}
        function favourite(thi, evt){
            evt.stopPropagation();
            var id = $(thi).val();
            var check = '';
            if($(thi).is(':checked')){
                check = '1';
            }else{
                check = '0';
            }
            $.ajax({
                url:"<?php  echo  $this->createMobileUrl('wllike')?>",
                data:{'id':id,'check':check},
                type:'POST',
                dataType:'json',
                cache:false,
                beforeSend:function(){
                    MLoading.show('加载中');
                },
                success:function(msgObj){
                    MLoading.hide();
                    if(msgObj.status == '0'){
                        return false;
                    }
                }
            });
        }
    </script>

<script>
$(document).ready(function(){
	$('#my_menu').click(function(){
		addToMenu();
	});

});
	
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>
</body>
</html>
