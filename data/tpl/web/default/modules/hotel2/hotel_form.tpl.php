<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  include $this->template('common', TEMPLATE_INCLUDEPATH);?>
<div class="main">
    <ul class="nav nav-tabs">	 	
      <li <?php  if($op=='list' || empty($op)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('hotel',array('op'=>'list'));?>">酒店管理</a></li>    
      <li <?php  if($op=='edit' && empty($item['id'])) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('hotel',array('op'=>'edit'));?>">添加酒店</a></li>	
       <?php  if($op=='edit' && !empty($item['id'])) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('hotel', array('op'=>'edit','id'=>$id));?>">编辑酒店</a></li><?php  } ?>
    </ul>
    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <h4>酒店编辑信息</h4>
       <table class='tb'>
        <tbody>	
             <tr>
                <th>排序：</th>
                <td><input type="text" id="displayorder" name="displayorder"  class="span7" value="<?php  echo $item['displayorder'];?>">
                    <span class='help-block'>数字越大排名越高</span></td>
            </tr>
            <tr>
                <th><span class="red">*</span>酒店名称：</th>
                <td><input type="text" name="title" id="title"  class="span7" value="<?php  echo $item['title'];?>"> </td>
            </tr>
              <tr>
                <th><span class="red">*</span><label for="">缩略图</label></th>
                <td>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                            <img src="./resource/attachment/<?php  echo $item['thumb'];?>" alt="" onerror="$(this).remove();"></div>
                        <div>
                            <span class="btn btn-file"  id="thumb_div" tabindex="-1"><span class="fileupload-new">选择图片</span>
                                <span class="fileupload-exists">更改</span><input name="thumb" id="thumb" type="file" />
                            <input name="thumb-old" id="thumb-old" type="hidden" value="<?php  echo $item['thumb'];?>" /></span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
                        </div>
                    </div>
                    <span class="help-block">列表的缩略图</span>
                </td>
            </tr>
             <tr>
           <th>其他图片</th>
		<td><!---批量上传-->
	<div class="photo_list">
	<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
        <span id="selectimage" tabindex="-1" class="btn btn-primary"><i class="icon-plus"></i> 上传照片</span><span style="color:red;">
	<input name="piclist" type="hidden" value="<?php  echo $item['piclist'];?>" />
	*建议尺寸：宽720像素，高350像素</span>
	<div id="file_upload-queue" class="uploadify-queue"></div>
	<ul class="ipost-list ui-sortable" id="fileList">

	<?php  if(is_array($piclist)) { foreach($piclist as $v) { ?>
	<li class="imgbox" style="list-type:none">
            <a class="item_close" href="javascript:;" onclick="deletepic(this);" title="删除">删除
</a>
<span class="item_box">
	<img src="<?php  echo $_W['attachurl'];?><?php  echo $v['attachment'];?>" style="max-height:100%;">
</span>
 <input type="hidden" value="<?php  echo $v['attachment'];?>" name="attachment[]">
</li>
	<?php  } } ?>
	</ul>

</td>

<!--批量上传结束-->
		
		</tr>
           <tr>
                <th><span class="red">*</span>酒店星级：</th>
                        <td><select class='span3' id='level' name='level'>
                                <option value=''>--请选择酒店星级--</option>
                                  <?php  if(is_array($hotel_level_config)) { foreach($hotel_level_config as $key => $value) { ?>
                            <option value ="<?php  echo $key;?>" <?php  if($item['level'] == $key) { ?>selected="selected"<?php  } ?>><?php  echo $value;?></option>
                        <?php  } } ?>
                    </select>
                       
                        </td>
            </tr>

             <tr>
                 <th><span class="red">*</span>酒店设施：</th>
                 <td style='padding-top:5px;padding-bottom:5px;'>
                     <div id="hotel_device">
                         <?php  $device_num = 0?>
                         <?php  if(is_array($device)) { foreach($device as $key => $value) { ?>
                         <?php  $device_num++?>
                         <div class="input-append input-prepend" id="add_device_<?php  echo $key;?>" style='margin:2px;'>
                                <span class="add-on">
                                    <label class='checkbox inline'> <input type="checkbox" name="show_device[<?php  echo $key;?>]" <?php  if($value['isshow'] == 1) { ?>checked<?php  } ?> value="1"> </label></span>
                             <input type="text" class="span2" name="device[<?php  echo $key;?>]" value="<?php  echo $value['value'];?>"/>
                             <?php  if(($value['isdel'] != 0)) { ?> <span class="add-on"><a href="javascript:;" id="del_device" onclick="del_device('<?php  echo $key;?>')"><i class="icon-remove"></i> 删除</a></span><?php  } ?>
                         </div>
                         <?php  } } ?>

                     </div>
                     <div id="hotel_add_device"></div>
                     <a href="javascript:;" id="add_device"><i class="icon-plus"></i> 添加</a>
                 </td>
             </tr>
             
             <tr>
                <th><span class="red">*</span>酒店品牌：</th>
                        <td><select class='span3' id='brandid' name='brandid'>
                                <option value=''>独立品牌</option>
                                  <?php  if(is_array($brands)) { foreach($brands as $b) { ?>
                            <option value ="<?php  echo $b['id'];?>" <?php  if($item['brandid'] == $b['id']) { ?>selected="selected"<?php  } ?>><?php  echo $b['title'];?></option>
                        <?php  } } ?>
                    </select>
                       
                        </td>
            </tr>
           
          
            
            <tr>
                <th><span class="red">*</span>酒店电话：</th>
                <td><input type="text" id="phone" name="phone"  class="span7" value="<?php  echo $item['phone'];?>"> </td>
            </tr>
            <tr>
                <th><span class="red">*</span>酒店地址：</th>
                <td><input type="text" id="address" name="address"  class="span7" value="<?php  echo $item['address'];?>"> </td>
            </tr>
             <tr>
                <th><label for="">所在地区：</label></th>
                <td>
                    <select name="location_p" id="location_p" class="location span2"></select>
                    <select name="location_c" id="location_c" class="location span2"></select>
                    <select name="location_a" id="location_a" class="location span2"></select>
                    <script type="text/javascript" src="./source/modules/hotel2/template/style/js/region_select.js"></script>
                    <script type="text/javascript">
                        var location_p = "<?php  if(!empty($item['location_p'])) { ?><?php  echo $item['location_p'];?><?php  } else { ?><?php  } ?>";
                        var location_c = "<?php  if(!empty($item['location_c'])) { ?><?php  echo $item['location_c'];?><?php  } else { ?><?php  } ?>";
                        var location_a = "<?php  if(!empty($item['location_a'])) { ?><?php  echo $item['location_a'];?><?php  } else { ?><?php  } ?>";
                        new PCAS("location_p", "location_c", "location_a", location_p, location_c, location_a);
                        $(function(){ getBusiness() });
                    </script>
                </td>
            </tr>
              <tr>
                <th>酒店商圈：</th>
                <td>
                    <select class='span3' id='businessid' name='businessid'>
                                <option value=''>不限</option>
                                  <?php  if(is_array($business)) { foreach($business as $b) { ?>
                            <option value ="<?php  echo $b['id'];?>" <?php  if($item['businessid'] == $b['id']) { ?>selected="selected"<?php  } ?>><?php  echo $b['title'];?></option>
                        <?php  } } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="">酒店地图：</label></th>
                <td>
                    <div class="input-append">
                        <input type="text" id="place" class="input-xlarge valid" name="place" value="" data-rule-required="true">
                        <button class="btn" type="button" id="positioning" onclick="bmap.searchMapByAddress($('#place').val())">搜索</button>
                    </div>
                   
                    <div id="l-map" style="overflow: hidden; position: relative; z-index: 0; background-image: url(http://api.map.baidu.com/images/bg.png);width: 500px; height: 300px;margin-top: 10px; color: rgb(0, 0, 0); text-align: left;"></div>
                    <div id="r-result">
                        <input type="hidden" id="lat" name="lat"> <input type="hidden" id="lng" name="lng">
                    </div>
                </td>
            </tr>
            <tr>
                <th>酒店介绍：</th>
                <td>
                    <textarea style="height:100px;" id="description" name="description" class="span7" cols="60"><?php  echo $item['description'];?></textarea>
                    <div class="help-block">用于正文内的详情</div>
                </td>
            </tr>
             <tr>
                <th>订房说明：</th>
                <td>
                    <textarea style="height:100px;" id="content" name="content" class="span7" cols="60"><?php  echo $item['content'];?></textarea>
                    <div class="help-block">酒店订房说明(选填)</div>
                </td>
            </tr>
            <tr>
                <th>位置交通：</th>
                <td>
                    <textarea style="height:100px;" id="traffic" name="traffic" class="span7" cols="60"><?php  echo $item['traffic'];?></textarea>
                    <div class="help-block">酒店位置交通说明(选填)</div>
                </td>
            </tr>
             <tr>
                <th>促销信息：</th>
                <td>
                    <textarea style="height:100px;" id="sales" name="sales" class="span7" cols="60"><?php  echo $item['sales'];?></textarea>
                    <div class="help-block">酒店促销信息(选填)</div>
                </td>
            </tr>
              <tr>
                <th>状态：</th>
                <td>    <label class="radio inline">
                    <input type="radio" name="status" value="1" <?php  if($item['status'] == 1) { ?>checked<?php  } ?>/>显示
                    </label>
                    <label class="radio inline">
                    <input type="radio" name="status" value="0" <?php  if($item['status'] == 0) { ?>checked<?php  } ?>/>隐藏
                    </label>
                    <span class='help-block'>手机前台是否显示</span>
                    </td>
            </tr>
            <tr>
                <th>接收订单邮箱：</th>
                <td><input type="text" id="mail" name="mail"  class="span7" value="<?php  echo $item['mail'];?>">
                    <span class="help-block">如果客户下订单，自动发送给此邮箱，如果不填写，则不发送</span></td>
            </tr>
             <tr>
                <th></th>
                <td>
                    <button type="submit" class="btn btn-primary span3" name="submit" value="提交">提交</button>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
        </tbody>
    </table>	
    </form>
 


<link type="text/css" rel="stylesheet" href="./resource/script/kindeditor/themes/default/default.css" />
    <link type="text/css" rel="stylesheet" href="./source/modules/hotel2/template/style/css/uploadify_t.css" />
<script type="text/javascript" src="./resource/script/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="./resource/script/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript">
      
$(function(){
	 
	var i = 0;
	$('#selectimage').click(function() {
		var editor = KindEditor.editor({
			allowFileManager : false,
			imageSizeLimit : '30MB',
			uploadJson : './index.php?act=attachment&do=upload'
		});
		editor.loadPlugin('multiimage', function() {
			editor.plugin.multiImageDialog({
				clickFn : function(list) {
					if (list && list.length > 0) {
						for (i in list) {
							if (list[i]) {
								html =	'<li class="imgbox" style="list-type:none">'+
								'<a class="item_close" href="javascript:;" onclick="deletepic(this);" title="删除">删除</a>'+
								'<span class="item_box"> <img src="'+list[i]['url']+'" style="height:80px"></span>'+
								'<input type="hidden" name="attachment-new[]" value="'+list[i]['filename']+'" />'+
								'</li>';
								$('#fileList').append(html);
								i++;
							}
						}
						editor.hideDialog();
					} else {
						alert('请先选择要上传的图片！');
					}
				}
			});
		});
	});
     

        $("#location_p,#location_c,#location_a").change(function(){
              getBusiness();
        })
});

function getBusiness(){

     
            var location_p = $("#location_p").val();
            var location_c = $("#location_c").val();
            var location_a = $("#location_a").val();
            $.ajax({
                 url: '<?php  echo $this->createWebUrl('getbusiness')?>' + "&location_p=" + location_p +"&location_c=" + location_c+"&location_a=" + location_a,
                 dataType:"json",
                 success:function(data){
                     var len = data.length;
                     $("#businessid").get(0).options.length = 0;
                     $("#businessid").append("<option value=''>不限</option>");
                     if(len>0){
                         for(var i=0;i<len;i++)    {
                                $("#businessid").append("<option value='" + data[i].id + "'>" + data[i].title+"</option>");
                         }
                     }
                     <?php  if(!empty($item['id'])) { ?>
                     $("#businessid option[value='<?php  echo $item['businessid'];?>']").attr("selected", true);
                     <?php  } ?>
                 }
            });
            
}
function deletepic(obj){
	if (confirm("确认要删除？")) {
		var $thisob=$(obj);
		var $liobj=$thisob.parent();
		var picurl=$liobj.children('input').val();
		$.post('<?php  echo $this->createMobileUrl('ajaxdelete',array())?>',{ pic:picurl},function(m){
			if(m=='1') {
				$liobj.remove();
			} else {
				alert("删除失败");
			}
		},"html");	
	}
}
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=1.4&ak=&services=&t=20140102035142"></script>
<script type="text/javascript">
    $(function(){
        $(".location").change(function(){
            bmap.searchMapByPCD();
        });
    });
    //new PCAS("location_p", "location_c", "location_a", location_p, location_c, location_a);
    var bmap = {
        'option' : {
            'lock' : false,
            'container' : 'l-map',
            'infoWindow' : {'width' : 250, 'height' : 100, 'title' : ''},
            'point' : {'lng' : "<?php  if($item['lng']!='0.0000000000' && !empty($item['lng'])) { ?><?php  echo $item['lng'];?><?php  } else { ?>116.735049<?php  } ?>", 'lat' : "<?php  if($item['lat']!='0.0000000000' && !empty($item['lat'])) { ?><?php  echo $item['lat'];?><?php  } else { ?>23.367896<?php  } ?>"}
        },
        'init' : function(option) {
            var $this = this;
            $this.option = $.extend({},$this.option,option);

            $this.option.defaultPoint = new BMap.Point($this.option.point.lng, $this.option.point.lat);
            $this.bgeo = new BMap.Geocoder();
            $this.bmap = new BMap.Map($this.option.container);
            $this.bmap.centerAndZoom($this.option.defaultPoint, 15);
            $this.bmap.enableScrollWheelZoom();
            $this.bmap.enableDragging();
            $this.bmap.enableContinuousZoom();
            $this.bmap.addControl(new BMap.NavigationControl());
            $this.bmap.addControl(new BMap.OverviewMapControl());
            //添加标注
            $this.marker = new BMap.Marker($this.option.defaultPoint);
            $this.marker.setLabel(new BMap.Label('请您移动此标记，选择您的坐标！', {'offset':new BMap.Size(10,-20)}));
            $this.marker.enableDragging();
            $this.bmap.addOverlay($this.marker);
            //$this.marker.setAnimation(BMAP_ANIMATION_BOUNCE);
            $this.showPointValue($this.marker.getPosition());
            //拖动地图事件
            $this.bmap.addEventListener("dragging", function() {
                $this.setMarkerCenter();
                $this.option.lock = false;
            });
            //缩入地图事件
            $this.bmap.addEventListener("zoomend", function() {
                $this.setMarkerCenter();
                $this.option.lock = false;
            });
            //拖动标记事件
            $this.marker.addEventListener("dragend", function (e) {
                $this.showPointValue();
                $this.showAddress();
                $this.bmap.panTo(new BMap.Point(e.point.lng, e.point.lat));
                $this.option.lock = false;
                $this.marker.setAnimation(null);
            });
        },
        'searchMapByAddress' : function(address) {
            var $this = this;
            $this.bgeo.getPoint(address, function (point) {
                if (point) {
                    $this.showPointValue();
                    $this.showAddress();
                    $this.bmap.panTo(point);
                    $this.setMarkerCenter();
                }
            });
        },
        'searchMapByPCD' : function(address) {
            var $this = this;
            $this.option.lock = true;
            $this.searchMapByAddress($('#location_p').val()+$('#location_c').val()+$('#location_a').val());
        },
        'setMarkerCenter' : function() {
            var $this = this;
            var center = $this.bmap.getCenter();
            $this.marker.setPosition(new BMap.Point(center.lng, center.lat));
            $this.showPointValue();
            $this.showAddress();
        },
        'showPointValue' : function() {
            var $this = this;
            var point = $this.marker.getPosition();
            $('#lng').val(point.lng);
            $('#lat').val(point.lat);
        },
        'showAddress' : function() {
            var $this = this;
            var point = $this.marker.getPosition();
            $this.bgeo.getLocation(point, function (s) {
                if (s) {
                    $('#place').val(s.address);
                    if (!$this.option.lock) {
                        new PCAS("location_p", "location_c", "location_a", s.addressComponents.province, s.addressComponents.city, s.addressComponents.district);
                    }
                }
            });
        }
    };
    
     var device_num = 1000;
     
    $(function(){
        var option = {};
        bmap.init(option);
  
        $("#add_device").click(function(){
            
             var html = '<div id="add_device_' + device_num + '" class="input-append input-prepend"  style="margin:2px;">';
                                html+='<span class="add-on">';
                                    html+='<label class="checkbox inline"> <input type="checkbox" name="show_new_device[' + device_num + ']" value="1"> </label></span>';
                                 html+='<input type="text" class="span2" name="new_device[' + device_num + ']" VALUE=""/>';
                                html+='<span class="add-on"><a href="javascript:;" id="del_device" onclick="del_device(' + device_num + ')"><i class="icon-remove"></i> 删除</a></span>';
                            html+='</div>';
            $("#hotel_device").append(html);
            device_num++;
        });

    });

    function del_device(num) {
        $("#add_device_" + num).remove();
    }


   function formcheck(){
    if($("#title").isEmpty()){
        Tip.focus("title","请填写酒店名称!","right");
        return false;
    }
                if ($.trim($(':file[name="thumb"]').val()) == '' && $("#thumb-old").isEmpty()) {
                                //message('必须上传预约活动封面.', '', 'error');
                                Tip.focus('thumb_div', '请上传缩略图.', 'right');
                                        return false;
                                }
     if($("#level").isEmpty()){
        Tip.focus("level","请选择酒店星级!","right");
        return false;
    } 
    if($("#phone").isEmpty()){
        Tip.focus("phone","请填写酒店电话!","right");
        return false;
    } if($("#address").isEmpty()){
        Tip.focus("address","请填写酒店地址!","right");
        return false;
    }
    return true;
}
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
