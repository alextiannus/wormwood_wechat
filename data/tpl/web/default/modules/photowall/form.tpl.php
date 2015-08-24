<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common', TEMPLATE_INCLUDEPATH);?>
<input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="alert alert-block alert-new">
	<h4 class="alert-heading">基本设置</h4>
	<table>
		<tbody>
			<tr>
				<th>
					<span class='red'>*</span>
					活动名称：
				</th>
				<td>
					<input type="text" id="title" class="span7" placeholder="" name="title" value="<?php  echo $reply['title'];?>"></td>
			</tr>
			<tr>
				<th>
					<span class='red'>*</span>
					活动图片
				</th>
				<td>
					<?php  echo tpl_form_field_image('start_picurl',$reply['start_picurl']);?>
				</td>
			</tr>

			<tr>
				<th>
					<span class='red'>*</span>
					活动说明
				</th>
				<td>
					<textarea style="height:60px;" id='description' name="description" class="span7" cols="60"><?php  echo $reply['description'];?></textarea>
				</td>
			</tr>

			<tr>
				<th>
					<span class='red'>*</span>
					活动时间：
				</th>
				<td>
					<?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>$reply['starttime'],'endtime'=>$reply['endtime']), array('time'=>true))?>
				</td>
			</tr>
			<tr>
				<th>
					<span class='red'>*</span>
					兑奖信息：
				</th>
				<td>
					<input type="text" id="ticket_information" class="span7" placeholder="" name="ticket_information" value="<?php  echo $reply['ticket_information'];?>">
					<div class="help-block">例如: 兑奖请联系我们，电话 13xxxxxxxxx</div>
				</td>
			</tr>
			<tr>
				<th>版权信息：</th>
				<td>
					<input type="text" id="copyright" class="span7" placeholder="" name="copyright" value="<?php  echo $reply['copyright'];?>">
					<div class="help-block">版权信息，如果不填写，默认为公众号名称！</div>
				</td>
			</tr>
		</tbody>
	</table>
	<h4 class="alert-heading">结束设置</h4>
	<table>

		<tr>
			<th>
				<span class='red'>*</span>
				活动结束标题：
			</th>
			<td>
				<input type="text" id="end_theme" class="span7" placeholder="" name="end_theme" value="<?php  echo $reply['end_theme'];?>"></td>
		</tr>
		<tr>
			<th>
				<span class='red'>*</span>
				活动结束图片：
			</th>
			<td>
				<?php  echo tpl_form_field_image('end_picurl',$reply['end_picurl']);?>
			</td>
		</tr>

		<tr>
			<th>
				<span class='red'>*</span>
				活动结束说明：
			</th>
			<td>
				<textarea style="height:60px;" id='end_instruction' name="end_instruction" class="span7" cols="60"><?php  echo $reply['end_instruction'];?></textarea>
			</td>
		</tr>
	</table>
	<h4 class="alert-heading">活动设置</h4>
	<table>
		<tbody>
			<tr>
				<th>
					<label for="">每人最多发送图片次数：</label>
				</th>
				<td>
					<div class="input-append">
						<input type="text" class="span1" name="sendtimes" value="<?php  echo $reply['sendtimes'];?>" />
						<span class="add-on">张</span>
					</div>
					<div class="help-block">单个用户最多发送的照片张数，0为不限制</div>
				</td>
			</tr>
			<tr>
				<th>
					<label for="">每人每天最多发送照片张数:</label>
				</th>
				<td>
					<div class="input-append">
						<input type="text" class="span1" name="daysendtimes" value="<?php  echo $reply['daysendtimes'];?>" />
						<span class="add-on">张</span>
					</div>
					<div class="help-block">必须小于最多发送照片张数！0为不限制</div>
				</td>
			</tr>
			<tr>
				<th>是否需要审核</th>
				<td>
					<div class="radio inline"><input type="radio" name="isshow" value="1" id="isshow_1" <?php  if($reply['isshow'] == '1') { ?>checked="true"<?php  } ?>><label for="isshow_1">是</label></div>
					<div class="radio inline"><input type="radio" name="isshow" value="0" id="isshow_0"  <?php  if($reply['isshow'] == '0') { ?>checked="true"<?php  } ?>><label for="isshow_0">否</label></div>
					<div class="help-block">当用户在照片墙中发表图片，是否需要审核，为否为则直接通过审核。</div></td>
			</tr>
			<tr>
				<th>是否需要输入描述信息</th>
				<td>
					<div class="radio inline"><input type="radio" name="isdes" value="1" id="isdes_1" <?php  if($reply['isdes'] == '1') { ?>checked="true"<?php  } ?>><label for="isdes_1">是</label></div>
					<div class="radio inline"><input type="radio" name="isdes" value="0" id="isdes_0"  <?php  if($reply['isdes'] == '0') { ?>checked="true"<?php  } ?>><label for="isdes_0">否</label></div>
					<div class="help-block">当用户在照片墙中发表图片，是否需要输入描述信息</div></td>
			</tr>
		</tbody>
	</table>
</div>
<script>
 $('form').submit(function(){
 
   if($("#title").isEmpty()){
		Tip.focus("title","请输入活动名称!","right");
		return false;
   }
   if($("#upload-image-url-start_picurl").isEmpty()){
		Tip.focus("upload-image-url-start_picurl","请上传活动图片!","right");
		return false;
   }
    if($("#description").isEmpty()){
		Tip.focus("description","请输入活动简介!","right");
		return false;
   }
    if($("#end_theme").isEmpty()){
		Tip.focus("end_theme","请输入活动结束标题!","right");
		return false;
   }
   if($("#upload-image-url-end_picurl").isEmpty()){
		Tip.focus("upload-image-url-end_picurl","请上传活动结束图片!","right");
		return false;
   }
    if($("#end_instruction").isEmpty()){
		Tip.focus("end_instruction","请输入活动结束说明!","right");
		return false;
   }
   return true;
});
</script>