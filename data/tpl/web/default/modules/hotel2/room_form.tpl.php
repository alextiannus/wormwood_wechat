<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  include $this->template('common', TEMPLATE_INCLUDEPATH);?>
<div class="main">
<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('hotel');?>">酒店管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('hotel', array('op'=>'edit','id' => $hotelid));?>">酒店编辑</a></li>
    <li <?php  if($_GPC['op'] == 'edit') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('room', array('op'=>'edit','hotelid' => $hotelid));?>">添加房型</a></li>
    <li <?php  if(empty($_GPC['op'])) { ?>class="active"<?php  } ?> ><a href="<?php  echo $this->createWebUrl('room', array('hotelid' => $rid));?>">房型管理</a></li>
</ul>
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
<h4>
    <?php  if($_GPC['op'] == 'edit' && $_GPC['id'] != '') { ?>
    编辑房型
    <?php  } else { ?>
    添加房型
    <?php  } ?>
</h4>
<table class="tb">
    <tr>
        <th><span class="red">*</span><label for="">所属酒店</label></th>
        <td>
            <input type="text" name="hotel" maxlength="30" value="<?php  echo $hotel['title'];?>" id="hotel" class="span5" readonly />
            <input type='hidden' id='hotelid' name='hotelid' value="<?php  echo $hotel['id'];?>" />
            <button class="btn" type="button" onclick="popwin = $('#modal-module-menus').modal();">选择酒店</button>
            <div id="modal-module-menus" class="modal fade hide" tabindex="-1" role="dialog" aria-hidden="true" style=" width:600px;">
                <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择酒店</h3></div>
                <div class="modal-body">
                    <table class="tb">
                        <tr>
                            <th><label for="">搜索酒店</label></th>
                            <td><input type="text" class="span3" name="keyword" value="" id="search-kwd" /><button type="button" class="btn" onclick="search_hotels();">搜索</button>
                            </td>
                        </tr>
                    </table>
                    <div id="module-menus"></div>
                </div>
                <div class="modal-footer"><a href="#" class="btn" data-dismiss="modal" aria-hidden="true">关闭</a></div>
            </div>

        </td>
    </tr>

    <tr>
        <th><span class="red">*</span>房型：</th>
        <td><input type="text" name="title" id="title" value="<?php  echo $item['title'];?>" class="span5"></td>
    </tr>
    <tr>
        <th><span class="red">*</span>早餐设置</th>
        <td>
            <label class="radio inline">
                <input type="radio" value="0" class="change_breakfast" name="breakfast" <?php  if($item['breakfast']==0 || empty($item['breakfast'])) { ?>checked<?php  } ?>/> 无早
            </label>
            <label class="radio inline">
                <input type="radio" value="1" class="change_breakfast" name="breakfast" <?php  if($item['breakfast']==1) { ?>checked<?php  } ?>/> 单早
            </label>
            <label class="radio inline">
                <input type="radio" value="2" class="change_breakfast" name="breakfast" <?php  if($item['breakfast']==2) { ?>checked<?php  } ?>/> 双早
            </label>
        </td>
    </tr>
    <tr>
        <th><span class="red">*</span>前台价（原价)：</th>
        <td><input type="text" name="oprice" id="oprice" value="<?php  echo $item['oprice'];?>" class="span5"></td>
    </tr>				<tr>
    <th><span class="red">*</span>优惠价(现价)：</th>
    <td><input type="text" name="cprice" id="cprice" value="<?php  echo $item['cprice'];?>" class="span5"></td>
</tr>
    <tr>
        <th><span class="red">*</span>会员价：</th>
        <td><input type="text" name="mprice" id="mprice" value="<?php  echo $item['mprice'];?>" class="span5"></td>
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
        <th>房型图片</th>
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
    <tr>
        <th>房间参数：</th>
        <td>
            <div class="input-append input-prepend">
                <span class="add-on">
                    <label class='checkbox inline'> <input type='checkbox' id='area_show' name="area_show" value="1" <?php  if($item['area_show']==1) { ?>checked<?php  } ?> /> 房间面积</label></span>
                <input type="text" name="area" id="area" class="span2" value="<?php  echo $item['area'];?>" />
                <span class="add-on">平方米</span>
            </div>
            <div class="input-append input-prepend">
                <span class="add-on">
                    <label class='checkbox inline'> <input type='checkbox' id='floor_show' name="floor_show" value="1" <?php  if($item['floor_show']==1) { ?>checked<?php  } ?>/> 楼层</label></span>
                <input type="text" name="floor" id="floor" class="span2" value="<?php  echo $item['floor'];?>" />
                <span class="add-on">楼</span>
            </div>

        </td>
    </tr>
    <tr>
        <th></th>
        <td>

            <div class="input-append input-prepend">
                <span class="add-on">
                    <label class='checkbox inline'> <input type='checkbox' id='bed_show' name="bed_show" value="1" <?php  if($item['bed_show']==1) { ?>checked<?php  } ?>/> 床位</label></span>
                <input type="text" name="bed" id="bed" class="span2" value="<?php  echo $item['bed'];?>" />
                <span class="add-on">例如: 2米大床</span>
            </div>

            <div class="input-append input-prepend">
                <span class="add-on">
                    <label class='checkbox inline'> <input type='checkbox' id='bedadd_show' name="bedadd_show" value="1" <?php  if($item['bedadd_show']==1) { ?>checked<?php  } ?>/> 是否可加床</label></span>
                <input type="text" name="bedadd" id="bedadd" class="span2" value="<?php  echo $item['bedadd'];?>" placeholder='加床说明' />

            </div>

        </td>
    </tr>

    <tr>
        <th></th>
        <td>

            <div class="input-append input-prepend">
                <span class="add-on">
                    <label class='checkbox inline'> <input type='checkbox' id='smoke_show' name="smoke_show" value="1" <?php  if($item['smoke_show']==1) { ?>checked<?php  } ?>/> 无烟房</label></span>
                <input type="text" name="smoke" id="smoke" class="span2" value="<?php  echo $item['smoke'];?>" />
                <span class="add-on">无烟房说明</span>
            </div>

            <div class="input-append input-prepend">
                <span class="add-on">
                    <label class='checkbox inline'> <input type='checkbox' id='persons_show' name="persons_show" value="1" <?php  if($item['persons_show']==1) { ?>checked<?php  } ?>/> 入住人数</label></span>
                <input type="text" name="persons" id="persons" class="span2" value="<?php  echo $item['persons'];?>" />
                <span class="add-on">人</span>

            </div>

        </td>
    </tr>

    <tr>
        <th>订房积分：</th>
        <td>
            <div class="input-append input-prepend">
                <span class="add-on">积分</span>
                <input type="text" name="score" id="score" class="span2" value="<?php  echo $item['score'];?>" />
                <span class="add-on">分</span>
            </div>

        </td>
    </tr>
    <tr>
        <th>促销信息：</th>
        <td>
            <textarea style="height:100px;" id="sales" class="span8" name="sales" cols="70" id="reply-add-text"><?php  echo $item['sales'];?></textarea>
            <span class="help-block">房间的促销信息（选填）</span>
        </td>
    </tr>
    <tr>
        <th>其他说明：</th>
        <td>
            <textarea style="height:100px;" id="device" class="span8" name="device" cols="70" id="reply-add-text1"><?php  echo $item['device'];?></textarea>
            <span class="help-block">房间的特别说明（选填）</span>
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
        <th></th>
        <td>
            <button type="submit" class="btn btn-primary span3" name="submit" value="提交">提交</button>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </td>
    </tr>
</table>
</form>

<link type="text/css" rel="stylesheet" href="./resource/script/kindeditor/themes/default/default.css" />
<link type="text/css" rel="stylesheet" href="./source/modules/hotel2/template/style/css/uploadify_t.css" />
<script type="text/javascript" src="./resource/script/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="./resource/script/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
    kindeditor($('.richtext-clone'));

    function search_hotels() {
        $("#module-menus").html("正在搜索....")
        $.post('<?php  echo $this->createWebUrl('hotel',array('op'=>'query'));?>', {
            keyword: $.trim($('#search-kwd').val()),
            industry: $.trim($("#industry").val()),
            nature: $.trim($("#nature").val()),
            scale: $.trim($("#scale").val())
        }, function(dat){
            $('#module-menus').html(dat);
        });
    }
    function select_hotel(o) {
        $("#hotelid").val(o.id);
        $("#hotel").val( o.title );
        $(".close").click();
    }


    function formcheck() {
        if ($("#hotel").isEmpty()) {
            Tip.focus("hotel", "请选择所属酒店!", "right");
            return false;
        }
        if ($("#title").isEmpty()) {
            Tip.focus("title", "请填写房型名称!", "right");
            return false;
        }
        if (!$("#oprice").isNumber()) {
            Tip.select("oprice", "请填写房型数字原价!", "right");
            return false;
        }
        if (!$("#cprice").isNumber()) {
            Tip.select("cprice", "请填写房型数字现价!", "right");
            return false;
        }
        if (!$("#mprice").isNumber()) {
            Tip.select("mprice", "请填写房型数字会员价!", "right");
            return false;
        }
        if ($.trim($(':file[name="thumb"]').val()) == '' && $("#thumb-old").isEmpty()) {
            //message('必须上传预约活动封面.', '', 'error');
            Tip.focus('thumb_div', '请上传缩略图.', 'right');
            return false;
        }
        if($("#area_show").get(0).checked)               {
            if($("#area").isEmpty()){
                Tip.focus("area","请输入房型面积!","top");
                return false;
            }
        }
        if($("#floor_show").get(0).checked)               {
            if($("#floor").isEmpty()){
                Tip.focus("floor","请输入房型楼层!","top");
                return false;
            }

        }
        if($("#bed_show").get(0).checked)               {
            if($("#bed").isEmpty()){
                Tip.focus("bed","请输入房型床位!","top");
                return false;
            }
        }

        if($("#persons_show").get(0).checked)               {
            if($("#persons").isEmpty()){
                Tip.focus("persons","请输入房型人数!","top");
                return false;
            }
        }
        return true;
    }
    $(function(){

        $('.change_breakfast').click(function() {
            var value = $(this).val();
            var name = $("#title").val();
            var new_name = name.replace(/\[含早\]/g,'');

            if (value == 0) {
                $("#title").val(new_name);
            } else  {
                $("#title").val(new_name + "[含早]");
            }
        });

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
    });
    function deletepic(obj){
        if (confirm("确认要删除？")) {
            var $thisob=$(obj);
            var $liobj=$thisob.parent();
            var picurl=$liobj.children('input').val();
            $liobj.remove();
//		$.post('<?php  echo $this->createMobileUrl('ajaxdelete',array())?>',{ pic:picurl,f},function(m){
//			if(m=='1') {
//				$liobj.remove();
//			} else {
//				alert("删除失败");
//			}
//		},"html");
        }
    }
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
