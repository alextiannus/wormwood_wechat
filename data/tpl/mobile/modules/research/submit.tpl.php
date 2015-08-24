<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>
<?php  if($initCalendar) { ?>
<link type="text/css" rel="stylesheet" href="./resource/style/datetimepicker.css" />
<script type="text/javascript" src="./resource/script/datetimepicker.js"></script>
<script type="text/javascript">
	$(function(){
		$('.datepicker').each(function(){
			$(this).datetimepicker({
				format: "yyyy-mm-dd",
				minView: "2",
				pickerPosition: "top-right",
				autoclose: true
			});
		});
	});
</script>
<?php  } ?>
<script type="text/javascript">
	function validate(){
		<?php  if(is_array($ds)) { foreach($ds as $row) { ?>
		<?php  if($row['essential']) { ?>
		<?php  if(in_array($row['type'], array('number', 'text', 'calendar', 'email'))) { ?>
		if($.trim($(':text[name="field_<?php  echo $row['refid'];?>"]').val()) == '') {
			alert('<?php  echo $row['title'];?> 必须填写.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('image'))) { ?>
		if($.trim($(':file[name="field_<?php  echo $row['refid'];?>"]').val()) == '') {
			alert('<?php  echo $row['title'];?> 必须上传.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('textarea'))) { ?>
		if($.trim($('textarea[name="field_<?php  echo $row['refid'];?>"]').val()) == '') {
			alert('<?php  echo $row['title'];?> 必须填写.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('checkbox'))) { ?>
		if($(':checkbox[name="field_<?php  echo $row['refid'];?>[]"]:checked').length == 0) {
			alert('<?php  echo $row['title'];?> 必须选择.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('number'))) { ?>
		var num = parseFloat($.trim($(':text[name="field_<?php  echo $row['refid'];?>"]').val()));
		if(isNaN(num)) {
			alert('<?php  echo $row['title'];?> 必须输入数字.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('email'))) { ?>
		var mail = $.trim($(':text[name="field_<?php  echo $row['refid'];?>"]').val());
		if(!(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/i).test(mail)) {
			alert('<?php  echo $row['title'];?> 必须输入邮箱地址.');
			return false;
		}
		<?php  } ?>
		<?php  } ?>
		<?php  } } ?>
		return true;
	}
</script>
<style>
body{background:#ECECEC;}
.research-thumb{width:100%;}
.dropdown_select{ -webkit-appearance: button; -webkit-user-select:none; overflow:visible; text-overflow:ellipsis; white-space:nowrap; display:inline; position:relative; margin: 0px 1px 0px 1px; width: 100%; height:34px; outline: none; border:0;background-color: transparent;border:1px solid #e5e5e5; font-size:14px; color:#999; background:url(/source/modules/research/template/images/xiala1.png) no-repeat right; background-size:17px 15px; padding-left:5px; line-height:34px;}
.form-table td {
width: 70%;
padding-bottom: 10px;
}
</style>
<div class="research">
	<?php  if(!empty($activity['thumb'])) { ?><img class="research-thumb" src="<?php  echo $_W['attachurl'];?><?php  echo $activity['thumb'];?>"><?php  } ?>
	<div class="mobile-div img-rounded">
		<div class="mobile-hd"><?php  echo $activity['title'];?></div>
		<div class="mobile-content">
		<?php  echo htmlspecialchars_decode($activity['content'])?>
		</div>
	</div>
	<form action="" method="post" enctype="multipart/form-data" onsubmit="return validate();">
	<div class="mobile-div img-rounded">
		<div class="mobile-hd">Please Fill Up The Form</div>
		<div class="mobile-content">
			<table class="form-table">
				<?php  if(is_array($ds)) { foreach($ds as $row) { ?>
				<tr>
					<th><label for=""><?php  echo $row['title'];?><?php  if($row['essential']) { ?> <span title="必填项" class="text-error">*</span><?php  } ?></label></th>
					<td>
						<?php  if($row['type'] == 'number') { ?>
						<input type="text" name="field_<?php  echo $row['refid'];?>" value="<?php  echo $row['default'];?>" />
						<?php  } ?>
						<?php  if($row['type'] == 'text') { ?>
						<input type="text" name="field_<?php  echo $row['refid'];?>" value="<?php  echo $row['default'];?>" />
						<?php  } ?>
						<?php  if($row['type'] == 'textarea') { ?>
						<textarea name="field_<?php  echo $row['refid'];?>" rows="3"><?php  echo $row['default'];?></textarea>
						<?php  } ?>
						<?php  if($row['type'] == 'radio') { ?>
						<select name="field_<?php  echo $row['refid'];?>">
						<?php  if(is_array($row['options'])) { foreach($row['options'] as $v) { ?>
							<option value="<?php  echo $v;?>" <?php  if($v == $row['default']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
						<?php  } } ?>
						</select>
						<?php  } ?>
						<?php  if($row['type'] == 'checkbox') { ?>
						<?php  if(is_array($row['options'])) { foreach($row['options'] as $v) { ?>
						<label class="checkbox inline btn btn-small">
							<input type="checkbox" name="field_<?php  echo $row['refid'];?>[]" value="<?php  echo $v;?>" <?php  if($v == $row['default']) { ?> checked="checked"<?php  } ?>/><?php  echo $v;?>
						</label>
						<?php  } } ?>
						<?php  } ?>
						<?php  if($row['type'] == 'select') { ?>
						<select class='dropdown_select' name="field_<?php  echo $row['refid'];?>">
						<?php  if(is_array($row['options'])) { foreach($row['options'] as $v) { ?>
							<option value="<?php  echo $v;?>" <?php  if($v == $row['default']) { ?> selected="selected"<?php  } ?> /><?php  echo $v;?></option>
						<?php  } } ?>
						</select>
						<?php  } ?>
						<?php  if($row['type'] == 'calendar') { ?>
						<input type="text" class="datepicker" name="field_<?php  echo $row['refid'];?>" value="<?php  echo $row['default'];?>" readonly="readonly" />
						<?php  } ?>
						<?php  if($row['type'] == 'email') { ?>
						<input type="text" name="field_<?php  echo $row['refid'];?>" value="<?php  if($row['default']) { ?><?php  echo $row['default'];?><?php  } else { ?>@<?php  } ?>" />
						<?php  } ?>
						<?php  if($row['type'] == 'image') { ?>
						<div class="file">
							<input type="file" name="field_<?php  echo $row['refid'];?>">
							<button class="btn" type="button"><i class="icon-upload-alt"></i> 上传图片</button>
						</div>
						<?php  } ?>
						<?php  if($row['type'] == 'range') { ?>
						<select name="field_<?php  echo $row['refid'];?>">
							<option value="0:00-1:00" >0:00-1:00</option>
							<option value="1:00-2:00">1:00-2:00</option>
							<option value="2:00-3:00">2:00-3:00</option>
							<option value="3:00-4:00">3:00-4:00</option>
							<option value="4:00-5:00">4:00-5:00</option>
							<option value="5:00-6:00">5:00-6:00</option>
							<option value="6:00-7:00">6:00-7:00</option>
							<option value="7:00-8:00">7:00-8:00</option>
							<option value="8:00-9:00">8:00-9:00</option>
							<option value="9:00-10:00">9:00-10:00</option>
							<option value="10:00-11:00">10:00-11:00</option>
							<option value="11:00-12:00">11:00-12:00</option>
							<option value="12:00-13:00">12:00-13:00</option>
							<option value="13:00-14:00">13:00-14:00</option>
							<option value="14:00-15:00">14:00-15:00</option>
							<option value="15:00-16:00">15:00-16:00</option>
							<option value="16:00-17:00">16:00-17:00</option>
							<option value="17:00-18:00">17:00-18:00</option>
							<option value="18:00-19:00">18:00-19:00</option>
							<option value="19:00-20:00">19:00-20:00</option>
							<option value="20:00-21:00">20:00-21:00</option>
							<option value="21:00-22:00">21:00-22:00</option>
							<option value="22:00-23:00">22:00-23:00</option>
							<option value="23:00-24:00">23:00-24:00</option>
						</select>
						<?php  } ?>
						<?php  if(!empty($row['description'])) { ?><span class="help-block"><?php  echo urldecode($row['description']);?></span><?php  } ?>
					</td>
				</tr>
				<?php  } } ?>
			</table>
		</div>
	</div>
	<div class="mobile-submit">
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		<input type="submit" class="btn btn-large btn-success submit" value="Submit" name="submit" style="width:100%;">
	</div>
</form>
</div>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>
