<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/wei_canyin.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/wei_dialog.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>js/wei_webapp_v2_common.js"></script>
<title><?php  echo $set['shop_name'];?>---我喜欢</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
</head>
<body id="page_allMenu">
    
<div class="center">
    <section id="infoSection" style="float:none;width:100%;">
        <article>
            <!--div class="h2">推荐菜</div-->
            
                <div id="pInfo">
					<?php  if(empty($likearr)) { ?><dl>您还没有选择您喜欢的菜品</dl><?php  } ?>
						<?php  if(is_array($likearr)) { foreach($likearr as $row) { ?>
                        <dl id="list_<?php  echo $row['id'];?>" dunitname="例" dsubcount="1" dishid="<?php  echo $row['id'];?>" dname="<?php  echo $row['title'];?>" dtaste="" ddescribe="<?php  echo $row['description'];?>" dprice="<?php  echo $row['marketprice'];?>" dishot="" dspecialprice="<?php  echo $row['marketprice'];?>" disspecial="1" onclick="selectOne(this, '<?php  echo $row['id'];?>', '<?php  echo $row['marketprice'];?>0');"> 
							<dt><h3><?php  echo $row['title'];?></h3></dt>                    
                        <dd>
                            <a href="javascript:void(0)" class="dataIn" onclick="showImgDetail(this);event.stopPropagation();">
                                <img src="<?php  echo $row['thumb'];?>" alt="" title="">
                                <span style="font-size:10px;">推荐</span></a>
                        </dd>
                        <dd>
                            <em><?php  echo $row['marketprice'];?>元/{unit}</em>
                        </dd> 
                        <input type="checkbox" class="favourite" value="<?php  echo $row['id'];?>" checked onclick="favourite(this, event);">
						<?php  if($cart[$row['id']]['total']>0) { ?>
							<button shopinfo="" class="selectBtn choose choosen"></button>
						<?php  } else { ?>
							<button shopinfo="" class="selectBtn choose  unchoose"></button>
						<?php  } ?>						
                        </dl>
						<?php  } } ?> 
                                    </div>
        </article>
    </section>
 <?php  include $this->template(wl_footer, TEMPLATE_INCLUDEPATH);?> 
</div>
    <script type="text/javascript">
        window.selected = {
            total:0,
            dishes:{}
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
				$.ajax({
					'url':"<?php  echo  $this->createMobileUrl('wladdorder',array('subcp'=>'unchoose'))?>",
                    'data':{'goodsid':dishid,'price':price},
					'type':'POST',
					'async':'false',
					'success':function(db){
						_removeClass(btn, 'choosen');
						_addClass(btn, 'unchoose');	
					}
				});				
                
                //unselected
                //delete window.selected.dishes[dishid];
				
                window.selected.total -=1;
            } else {
				$.ajax({
					'url':"<?php  echo  $this->createMobileUrl('wladdorder',array('subcp'=>'choosen'))?>",
                    'data':{'goodsid':dishid,'price':price},
					'type':'POST',
					'async':'false',
					'success':function(db){
						_removeClass(btn, 'unchoose');
						_addClass(btn, 'choosen');
					}
				});					

                //selected
                /*window.selected.dishes[dishid] = {
                    price:price,
                    num:1
                }*/
				
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
           /* var params = '[';
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
            });*/
			location.href='<?php  echo  $this->createMobileUrl('wlcart')?>';
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
            //getAllList();
            setHeight();
        }, false);
        window.onresize = function(){setHeight();}
        function favourite(thi, evt){
            evt.stopPropagation();
            var checkeds = '';
            if($(thi).is(':checked')){
                checkeds = '1';
            }else{
                checkeds = '0';
            }
            MDialog.confirm(
                '', '您确定要从喜欢栏目中移除？', null,
                '确定', function() {
                    
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
                            if(msgObj.status == '1'){
                                $("#list_"+id).remove();
                            }else{
                                return false;
                            }
                        }
                    });

                }, null,
                '取消', function(){thi.checked = true;}, null,
                    null, true, true
                );
        }
    </script>

<script>
    $(document).ready(function(){
        $('#my_menu').click(function(){
            addToMenu();

	    });
        
    });

</script>
 
</html>
