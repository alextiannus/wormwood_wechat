<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>

<link href="./source/modules/icard/template/css/style.css?v=<?php echo TIMESTAMP;?>" rel="stylesheet"  type="text/css"/>
<link href="./source/modules/icard/template/css/imageselect.css?v=<?php echo TIMESTAMP;?>" media="screen" rel="stylesheet" type="text/css"/>
<script src="./source/modules/icard/template/js/imageselect.js?v=<?php echo TIMESTAMP;?>" type="text/javascript"></script>
<link href="./source/modules/icard/template/css/colorpicker.css?v=<?php echo TIMESTAMP;?>" rel="stylesheet"  type="text/css"/>
<script src="./source/modules/icard/template/js/bootstrap-colorpicker.js?v=<?php echo TIMESTAMP;?>"></script>

<style>
    .ke-inline-block {
        display: -moz-inline-stack;
        display: inline-block;
        vertical-align: middle;
        zoom: 1;
        *display: inline;
    }
    .ke-clearfix {
        zoom: 1;
    }
    .ke-clearfix:after {
        content: ".";
        display: block;
        clear: both;
        font-size: 0;
        height: 0;
        line-height: 0;
        visibility: hidden;
    }
    .ke-shadow {
        box-shadow: 1px 1px 3px #A0A0A0;
        -moz-box-shadow: 1px 1px 3px #A0A0A0;
        -webkit-box-shadow: 1px 1px 3px #A0A0A0;
        filter: progid:DXImageTransform.Microsoft.Shadow(color='#A0A0A0', Direction=135, Strength=3);
        background-color: #F0F0EE;
    }

    .ke-upload-button {
        position: relative;
    }
    .ke-upload-area {
        position: relative;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    .ke-upload-area .ke-upload-file {
        position: absolute;
        top: 0;
        right: 0;
        height: 25px;
        padding: 0;
        margin: 0;
        z-index: 811212;
        border: 0 none;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>

<div class="main">
	<form action="" method="post" onsubmit="return check();" class="form-horizontal form" enctype="multipart/form-data">
		<h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
		<table class="tb">
			<tr>
				<th><label for="">会员卡样式</label></th>
				<td>
                    <div class="card">
                        <img id="cardbg" src="<?php  echo $reply['bg'];?>">
                        <img id="cardlogo" class="cardlogo" src="<?php  echo $reply['logo'];?>" >
                        <h1 id="card_name" style="<?php  echo $reply['vipnamecolor'];?>"><?php  echo $reply['cardname'];?></h1>
                        <strong class="pdo verify" id="card_num" ><span><em>会员卡号</em>2188 8888</span></strong>
                    </div>
                    <div class="cardbg">
                        <select name="selbg">
                            <?php  echo $page_sel_bg;?>
                        </select>
                        <input type="hidden" id="hidbg" name="hidbg" value="<?php  echo $reply['bg'];?>"/>
                    </div>
				</td>
			</tr>
			<tr>
				<th><label for="">会员卡名称</label></th>
				<td>
                    <input type="text" name="cardname" value="<?php  echo $reply['cardname'];?>" id="cardname" class="px" style="width:200px;" onkeyup="DivFollowingText();">
                    名称颜色 <input type="text" class="span1" value="<?php  echo $reply['cardnamecolor'];?>" id="cardnamecolor"  name="cardnamecolor" onblur="cardnamecoloronblur();">
                    卡号颜色 <input type="text" class="span1" value="<?php  echo $reply['cardnumcolor'];?>"   name="cardnumcolor" id="cardnumcolor" onblur="cardnumcoloronblur();">
				</td>
			</tr>
            <tr>
                <th><label for="">自定义卡号英文编号</label></th>
                <td>
                    <input type="text" name="cardpre" value="<?php  echo $reply['cardpre'];?>" id="cardpre" class="span1" >
                    起始卡号  <input type="text" name="cardstart" value="<?php  if(empty($reply['cardstart'])) { ?>1000001<?php  } else { ?><?php  echo $reply['cardstart'];?><?php  } ?>" id="cardstart" class="span2" >
                    <div class="help-block"><font color="red">例：ZSH100001 ZSH就是英文编号.英文编号在8位内，起始卡号必须位数字并且在9位内.</font></div>
                </td>
            </tr>
            <tr>
                <th><label for="">图标</label></th>
                <td>
                    <div id="" class="uneditable-input reply-edit-cover">
                        <div class="detail">
                            <span class="pull-right">大图片建议尺寸：80像素 * 80像素</span>
                            <input type="button" id="btnlogo" fieldname="hidlogo" class="btn btn-mini reply-edit-cover-upload" value="<i class='icon-upload-alt'></i> 上传" style="" />
                            <button type="button" class="btn btn-mini reply-news-edit-cover-remove" id="upload-delete" onclick="doDeleteItemImageNew(this, 'hidlogo', $('#logo'))" style="<?php  if(empty($reply['logo'])) { ?> display:none;<?php  } ?>"><i class="icon-remove"></i> 删除</button>
                        </div>
                        <?php  if(!empty($reply['logo'])) { ?>
                        <input type="hidden" name="hidlogo-old" value="<?php  echo $reply['logo'];?>">
                        <div id="upload-file-view" class="upload-view" style="max-width: 80px;">
                            <input type="hidden" id="hidlogo" name="hidlogo" value="<?php  echo $reply['logo'];?>">
                            <img src="<?php  echo $reply['logo'];?>">
                        </div>
                        <?php  } else { ?>
                        <div id="upload-file-view" style="max-width: 80px;"></div>
                        <?php  } ?>
                    </div>
                    <div class="input-append" style="margin-top:5px; ">
                        <input type="text" name="logo" id="logo" value="<?php  echo $reply['logo'];?>" class="input-large span7">
                    </div>
                </td>
            </tr>
            <tr>
                <th>自定义背景</th>
                <td>
                    <div id="" class="uneditable-input reply-edit-cover">
                        <div class="detail">
                        <span class="pull-right">大图片建议尺寸：270像素 * 160像素</span>
                        <input type="button" id="btnlogo2" fieldname="hidlogo2" class="btn btn-mini reply-edit-cover-upload" value="<i class='icon-upload-alt'></i> 上传" style="" />
                        <button type="button" class="btn btn-mini reply-news-edit-cover-remove" id="upload-delete" onclick="doDeleteItemImageNew(this, 'hidlogo2', $('#diybg'))" style="<?php  if(empty($reply['diybg'])) { ?> display:none;<?php  } ?>"><i class="icon-remove"></i> 删除</button>
                        </div>
                        <?php  if(!empty($reply['diybg'])) { ?>
                        <input type="hidden" name="hidlogo-old2" value="<?php  echo $reply['diybg'];?>">
                        <div id="upload-file-view" class="upload-view" style="width: 270px;">
                            <input type="hidden" id="hidlogo2" name="hidlogo2" value="<?php  echo $reply['diybg'];?>">
                            <img width="100" src="<?php  echo $reply['diybg'];?>">
                        </div>
                        <?php  } else { ?>
                        <div id="upload-file-view" style="width: 270px;"></div>
                        <?php  } ?>
                    </div>
                    <div class="input-append" style="margin-top:5px; ">
                        <input type="text" name="diybg" id="diybg" value="<?php  echo $reply['diybg'];?>" class="input-large span7">
                    </div>
                    <input type="hidden" name="hidisfirst" id="hidisfirst"  value="0" />
                    <script>
                        kindeditorUploadBtnNew($('#btnlogo'), $('#logo'));
                        kindeditorUploadBtnNew($('#btnlogo2'), $('#diybg'));
                        function kindeditorUploadBtnNew(obj, showobj) {
                            if (typeof KindEditor == 'undefined') {
                                $.getScript('./resource/script/kindeditor/kindeditor-min.js', initUploader);
                            } else {
                                initUploader();
                            }
                            function initUploader() {
                                var uploadbutton = KindEditor.uploadbutton({
                                    button : obj,
                                    fieldName : 'imgFile',
                                    url : './index.php?act=attachment&do=upload',
                                    width : 100,
                                    afterUpload : function(data) {
                                        if (data.error === 0) {
                                            var url = KindEditor.formatUrl(data.url, 'absolute');
                                            $(uploadbutton.div.parent().parent()[0]).find('#upload-file-view').html('<input value="'+data.filename+'" type="hidden" name="'+obj.attr('fieldname')+'" id="'+obj.attr('id')+'-value" /><img src="'+url+'" width="100" />');
                                            showobj.val(url);
                                            $(uploadbutton.div.parent().parent()[0]).find('#upload-file-view').addClass('upload-view');
                                            $(uploadbutton.div.parent().parent()[0]).find('#upload-delete').show();
                                        } else {
                                            message('上传失败，错误信息：'+data.message);
                                        }
                                    },
                                    afterError : function(str) {
                                        message('上传失败，错误信息：'+str);
                                    }
                                });
                                uploadbutton.fileBox.change(function(e) {
                                    uploadbutton.submit();
                                });
                            }
                        }

                        function doDeleteItemImageNew(obj, id, showobj) {
                            var filename = $(obj).parent().parent().find('#' + id).val();
                            ajaxopen('./index.php?act=attachment&do=delete&filename=' + filename, function(){
                                $(obj).parent().parent().find('#upload-file-view').html('');
                            });
                            showobj.val('');
                            return false;
                        }
                    </script>
                </td>
            </tr>
            <tr>
                <th><label for="">商家确认消费密码</label></th>
                <td>
                    <input type="text" id="pwd" name="pwd" value="<?php  echo $reply['pwd'];?>" class="span3">
                    <div class="help-block">手机端确认使用优惠券等输入此密码，不超过20个字。</div>
                </td>
            </tr>
            <tr>
                <th><label for="">是否显示特权</label></th>
                <td>
                    <div class="make-switch switch-small" data-on="danger" data-off="default">
                        <input type="checkbox" name="show_privilege" id="show_privilege" value=1 <?php  if(empty($reply) || $reply['show_privilege']==1 ) { ?>checked<?php  } ?>>
                    </div>
                    <div class="help-block">是否在首页显示会员特权.</div>
                </td>
            </tr>
            <tr>
                <th><label for="">是否显示优惠券</label></th>
                <td>
                    <div class="make-switch switch-small" data-on="danger" data-off="default">
                        <input type="checkbox" id="show_coupon" name="show_coupon" value=1 <?php  if(empty($reply) || $reply['show_coupon']==1 ) { ?>checked<?php  } ?>/>
                    </div>
                    <div class="help-block">是否在首页显示优惠券.</div>
                </td>
            </tr>
            <tr>
                <th><label for="">是否显示礼品券</label></th>
                <td>
                    <div class="make-switch switch-small" data-on="danger" data-off="default">
                        <input type="checkbox" id="show_gift" name="show_gift" value=1 <?php  if(empty($reply) || $reply['show_gift']==1 ) { ?>checked<?php  } ?>/>
                    </div>
                    <div class="help-block">是否在首页显示礼品券.</div>
                </td>
            </tr>
			<tr>
				<th></th>
				<td>
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</td>
			</tr>
		</table>
	</form>
</div>

<script type="text/javascript">
    $(function(){
        $('#cardnamecolor').colorpicker({
            format: 'hex'
        });
        $('#cardnumcolor').colorpicker({
            format: 'hex'
        });
        $('#cardnamecolor').colorpicker().on('changeColor', function(ev){
            $('#cardnamecolor').css("background-color", ev.color.toHex());
        });
        $('#cardnumcolor').colorpicker().on('changeColor', function(ev){
            $('#cardnumcolor').css("background-color", ev.color.toHex());
        });
    });

    $(document).ready(function(){
        //图片下拉框
        $('select[name=selbg]').ImageSelect({dropdownWidth:200});
        //设置颜色
        $('#cardnamecolor').css("background-color", "<?php  echo $reply['cardnamecolor'];?>");
        $("#cardnumcolor").css("background-color", "<?php  echo $reply['cardnumcolor'];?>");
        $('#card_name').css("color", "<?php  echo $reply['cardnamecolor'];?>");
        $('#card_num').css("color", "<?php  echo $reply['cardnumcolor'];?>");
        $('#cardbg').attr('src',"<?php  echo $reply['diybg'];?>");
    });
</script>
<script type="text/javascript">
    function DivFollowingText(){
        $('#card_name').html($("#cardname").val());
    }

    function cardnamecoloronblur(){
        //$('#card_name').html($("#cardnamecolor").val());
        $('#card_name').css('color',$("#cardnamecolor").val());
        $('#cardnamecolor').css('background-color',$("#cardnamecolor").val());
    }

    function cardnumcoloronblur(){
        //$('#card_num').html($("#cardnumcolor").val());
        $('#card_num').css('color',$("#cardnumcolor").val());
        $('#cardnumcolor').css('background-color',$("#cardnumcolor").val());
    }

    function showlogo(){
        if($('#logo').val() == ''){
            $('#cardlogo').css('display','none');
        }else{
            $('#cardlogo').css('display','block');
            $('#cardlogo').attr('src',$('#logo').val());
        }
    }

    function showbg(){
        $('#cardbg').attr('src',$('#diybg').val());
    }
</script>
<script type="text/javascript">
    function check() {
        if($.trim($('#cardname').val()) == '') {
            message('没有输入会员卡名称.', '', 'error');
            return false;
        }
        if($.trim($('#cardname').val()).length > 20) {
            message('会员卡名称不能多于20个字.', '', 'error');
            return false;
        }
        return true;
    }
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
