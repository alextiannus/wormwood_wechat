<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<style type="text/css">
.form .alert{width:700px;}
</style>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
	<li<?php  if(!$reid) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
	<?php  if($reid) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('post', array('id' => $reid))?>">编辑预约活动</a></li><?php  } ?>
</ul>
<div class="main">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
		<h4>预约活动 <small>通过预约你可以实现服务预约, 在线咨询, 在线调查等功能</small></h4>
		<table class="tb">
			<tr>
				<th><label for="">预约名称</label></th>
				<td>
					<input type="text" class="span4" placeholder="" name="activity" value="<?php  echo $activity['title'];?>" />
				</td>
			</tr>
			<tr>
				<th>简介</th>
				<td>
					<textarea style="height:200px;" class="span7" name="description" cols="70"><?php  echo $activity['description'];?></textarea>
				</td>
			</tr>
			<tr>
				<th><label for="">预约说明</label></th>
				<td>
					<textarea type="text" class="span8 richtext-clone" placeholder="" name="content"><?php  echo $activity['content'];?></textarea>
					<span class="help-block">此预约活动的说明信息. 例如: 请提交你的联系方式, 和要咨询的产品信息. 我们会尽快联系你</span>
				</td>
			</tr>
			<tr>
				<th><label for="">提交提示信息</label></th>
				<td>
					<textarea type="text" class="span8" placeholder="" name="information"><?php  echo $activity['information'];?></textarea>
					<span class="help-block">预约提交成功以后提示的信息. 例如: 你的咨询问题我们已经收到, 很快会有专人联系你. </span>
				</td>
			</tr>
			<tr>
				<th><label for="">预约活动封面</label></th>
				<td>
					<?php  echo tpl_form_field_image('thumb', $activity['thumb'])?>
					<span class="help-block">用一张图片来更好的表现你的预约主题</span>
				</td>
			</tr>
			<tr>
				<th><label for="">每人可预约次数</label></th>
				<td>
					<input type="text" class="span4" name="pretotal" value="<?php  if(!empty($activity['pretotal'])) { ?><?php  echo $activity['pretotal'];?><?php  } else { ?>1<?php  } ?>" />
				</td>
			</tr>
			<?php  if(!empty($reid)) { ?>
			<tr>
				<th><label for="">状态</label></th>
				<td>
					<label class="radio inline"><input type="radio" name="status" value="1" <?php  if($activity['status'] == 1 || empty($activity['status'])) { ?> checked="checked"<?php  } ?> /> 开始</label>
					<label class="radio inline"><input type="radio" name="status" value="0" <?php  if(!empty($activity) && $activity['status'] == 0) { ?> checked="checked"<?php  } ?> /> 停止</label>
				</td>
			</tr>
			<?php  } ?>
			<tr>
				<th><label for="">开启时间</label></th>
				<td>
					<?php  echo tpl_form_field_date('starttime', $activity['starttime'], true)?>
				</td>
			</tr>
			<tr>
				<th><label for="">结束时间</label></th>
				<td>
					<?php  echo tpl_form_field_date('endtime', $activity['endtime'], true)?>
				</td>
			</tr>
			<tr>
				<th><label for="">在微站首页展示</label></th>
				<td>
					<label class="radio inline"><input type="radio" name="inhome" value="1" <?php  if($activity['inhome'] == 1) { ?> checked="checked"<?php  } ?> /> 显示</label>
					<label class="radio inline"><input type="radio" name="inhome" value="0" <?php  if(empty($activity) || $activity['inhome'] == 0) { ?> checked="checked"<?php  } ?> /> 不显示</label>
				</td>
			</tr>
			<tr>
				<th><label for="">接收通知Email</label></th>
				<td>
					<input type="text" class="span4" name="noticeemail" value="<?php  echo $activity['noticeemail'];?>" />
				</td>
			</tr>
			<tr>
				<th><label for="">要调查的内容</label></th>
				<td>
					<div class="alert alert-block alert-new">
						<table class="table table-hover">
							<thead>
								<tr>
									<th style="min-width:200px;">调查项目</th>
									<th style="width:40px;">必填</th>
									<th style="width:160px;">类型</th>
									<th style="width:160px;">关联默认值</th>
									<th style="width:120px;"></th>
								</tr>
							</thead>
							<tbody id="re-items">
								<?php  if(is_array($ds)) { foreach($ds as $r) { ?>
									<tr>
										<td><input name="title[]" type="text" class="span3" value="<?php  echo $r['title'];?>"/></td>
										<td><input name="essential[]" type="checkbox" title="必填项" <?php  if($r['essential']) { ?> checked="checked"<?php  } ?>/></td>
										<td>
											<select name="type[]" class="span2">
											<?php  if(is_array($types)) { foreach($types as $k => $v) { ?>
											<option value="<?php  echo $k;?>"<?php  if($k == $r['type']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
											<?php  } } ?>
											</select>
										</td>
										<td>
											<select name="bind[]" class="span2">
												<option value="">不关联粉丝数据</option>
												<?php  if(is_array($fields)) { foreach($fields as $k => $v) { ?>
												<option value="<?php  echo $k;?>"<?php  if($k == $r['bind']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
												<?php  } } ?>
											</select>
											<input type="hidden" name="value[]" value="<?php  echo $r['value'];?>"/>
											<input type="hidden" name="desc[]" value="<?php  echo $r['desc'];?>"/>
											<input type="hidden" name="essentialvalue[]" value="<?php  if($r['essential']) { ?>true<?php  } else { ?>false<?php  } ?>"/>
										</td>
										<td><?php  if(!$hasData) { ?><a href="javascript:;" class="icon-move" title="拖动调整此条目显示顺序" style="margin-top:10px;"></a> &nbsp; <a href="javascript:;" onclick="deleteItem(this)" class="icon-remove-sign" style="margin-top:10px;" title="删除此条目"></a> &nbsp; <a href="javascript:;" class="icon-edit" title="设置详细信息" style="margin-top:10px;" onclick="setValues(this);"></a><?php  } ?></td>
									</tr>
								<?php  } } ?>
							</tbody>
						</table>
					</div>
					<div class="alert alert-block alert-new">
						<?php  if($hasData) { ?>
						<a href="javascript:;">已经存在调查数据, 不能修改调查条目信息</a>
						<?php  } else { ?>
						<a href="javascript:;" onclick="addItem();">添加调查条目 <i class="icon-plus-sign" title="添加调查条目"></i></a>
						<?php  } ?>
					</div>
					<span class="help-block">预约成功启动以后(已经有粉丝用户提交给预约信息), 将不能再修改调查项目, 请仔细编辑. </span>
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
</div>
<div id="dialog" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">设置选项</h3>
	</div>
	<div class="modal-body">
		<div class="well">
			<textarea id="re-desc" class="span6" rows="3"></textarea>
			<span class="help-block"><strong>设置此条目的说明信息</strong></span>
		</div>
		<div class="well re-value hide">
			<textarea id="re-value" class="span6" rows="6"></textarea>
			<span class="help-block"><strong>设置预约条目的选项(如果有需要的话.) 每行一条记录, 例如: 性别 男, 女</strong></span>
		</div>
	</div>
</div>
<script type="text/javascript" src="./resource/script/jquery-ui-1.10.3.min.js"></script>
<script text="text/javascript">
	kindeditor($('.richtext-clone'));
	var currentItem = null;
	$(function(){
		$('#re-items').sortable({handle: '.icon-move'});
		$('#dialog').on('hide', function(){
			if(currentItem == null) return;
			var v = $('#dialog #re-value').val();
			$(currentItem).parent().prev().find(':hidden[name="value[]"]').val(encodeURIComponent(v.replace(/\n/g, ',')));
			var v = $('#dialog #re-desc').val();
			$(currentItem).parent().prev().find(':hidden[name="desc[]"]').val(encodeURIComponent(v));
		});
		<?php  if($hasData) { ?>
		$('#re-items').find(':text,:checkbox,select').attr('disabled', 'disabled');
		<?php  } ?>
	});
	function setValues(o) {
		var v = $(o).parent().prev().find(':hidden[name="value[]"]').val();
		v = decodeURIComponent(v);
		$('#dialog #re-value').val(v.replace(/,/g, '\n'));
		var v = $(o).parent().prev().find(':hidden[name="desc[]"]').val();
		v = decodeURIComponent(v);
		$('#dialog #re-desc').val(v);
		var v = $(o).parent().prev().prev().find('select[name="type[]"]').val();
		if(v == 'radio' || v == 'checkbox' || v == 'select') {
			$('.well.re-value').show();
		} else {
			$('.well.re-value').hide();
		}
		$('#dialog').modal({keyboard: false});
		currentItem = o;
	}
	function addItem() {
		var html = '' + 
				'<tr>' +
					'<td><input name="title[]" type="text" class="span3" /></td>' +
					'<td><input name="essential[]" type="checkbox" title="必填项" /></td>' +
					'<td>' +
						'<select name="type[]" class="span2">' +
						<?php  if(is_array($types)) { foreach($types as $k => $v) { ?>'<option value="<?php  echo $k;?>"><?php  echo $v;?></option>' + <?php  } } ?>
						'</select>' +
					'</td>' +
					'<td>' +
						'<select name="bind[]" class="span2">' +
							'<option value="">不关联粉丝数据</option>' +
						<?php  if(is_array($fields)) { foreach($fields as $k => $v) { ?><?php  if(!empty($v)) { ?>'<option value="<?php  echo $k;?>"><?php  echo $v;?></option>' + <?php  } ?><?php  } } ?>
						'</select>' +
						'<input type="hidden" name="value[]" />' +
						'<input type="hidden" name="desc[]" />' +
						'<input type="hidden" name="essentialvalue[]" />' +
					'</td>' +
					'<td><a href="javascript:;" class="icon-move" title="拖动调整此条目显示顺序" style="margin-top:10px;"></a> &nbsp; <a href="javascript:;" onclick="deleteItem(this)" class="icon-remove-sign" style="margin-top:10px;" title="删除此条目"></a> &nbsp; <a href="javascript:;" class="icon-edit" title="设置详细信息" style="margin-top:10px;" onclick="setValues(this);"></a></td>' +
				'</tr>';
		$('#re-items').append(html);
	}
	function deleteItem(o) {
		$(o).parent().parent().remove();
	}
	function validate() {
		if($.trim($(':text[name="activity"]').val()) == '') {
			message('必须填写预约活动标题.', '', 'error');
			return false;
		}
		if($.trim($('textarea[name="information"]').val()) == '') {
			message('必须填写预约活动成功提示信息.', '', 'error');
			return false;
		}
		<?php  if(empty($reid)) { ?>
		if($.trim($(':input[name="thumb"]').val()) == '') {
			message('必须上传预约活动封面.', '', 'error');
			return false;
		}
		<?php  } ?>
		if($(':text[name="title[]"]').length == 0) {
			message('必须设定预约活动的调查条目.', '', 'error');
			return false;
		}
		var isError = false;
		$(':text[name="title[]"]').each(function(){
			if($.trim($(this).val()) == '') {
				isError = true;
			}
		});
		if(isError) {
			message('必须要设定每个调查条目的标题.', '', 'error');
			return false;
		}
		
		var isError = false;
		$('#re-items tr').each(function(){
			var t = $(this).find('select[name="type[]"]').val();
			if(t == 'radio' || t == 'checkbox' || t == 'select') {
				if($.trim($(this).find(':hidden[name="value[]"]').val()) == '') {
					isError = true;
				}
			}
		});
		if(isError) {
			message('单选, 多选或下拉选择项目必须要设定备选项.', '', 'error');
			return false;
		}
		
		$(':checkbox').each(function(){
			if($(this).attr('checked') == 'checked') {
				$(this).parent().parent().find(':hidden[name="essentialvalue[]"]').val('true');
			} else {
				$(this).parent().parent().find(':hidden[name="essentialvalue[]"]').val('false');
			}
		});
		return true;
	}
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
