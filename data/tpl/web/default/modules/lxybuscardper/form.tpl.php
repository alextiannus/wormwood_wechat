<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="alert alert-block alert-new">
	<a class="close" data-dismiss="alert">×</a>
	<h4 class="alert-heading">名片回复设置</h4>
	<table>
		<tbody>
			<tr>
				<th>状态</th>
				<td>
					<?php  if($reply['status']) { ?>
					<a id="jinyong" href="<?php  echo $this->createWeburl('status', array('rid' => $reply['rid'], 'status' => 0))?>" onclick="return ajaxopen(this.href)" class="btn btn-primary module-button-switch">禁用</a>
					<?php  } else { ?>
					<a id="qiyong" href="<?php  echo $this->createWeburl('status', array('rid' => $reply['rid'], 'status' => 1))?>" onclick="return ajaxopen(this.href);" class="btn btn-danger module-button-switch">启用</a>
					<?php  } ?>
				</td>
			</tr>
			<tr>
				<th>回复标题</th>
				<td><input type="text" name="title" class="span7" value="<?php  echo $reply['title'];?>"></td>
			</tr>
			<tr>
				<th>图文消息图片</th>
				<td>
					<div id="" class="uneditable-input reply-edit-cover">
						<div class="detail">
							<span class="pull-right">大图片建议尺寸：640像素 * 320像素</span>
							<input type="button" id="bless-picture" fieldname="picture<?php  echo $namesuffix;?>" class="btn btn-mini reply-edit-cover-upload" value="<i class='icon-upload-alt'></i> 上传" style="" />
							<button type="button" class="btn btn-mini reply-news-edit-cover-remove" id="upload-delete" onclick="doDeleteItemImage(this, 'bless-picture-value')" style="<?php  if(empty($reply['picture'])) { ?> display:none;<?php  } ?>"><i class="icon-remove"></i> 删除</button>
						</div>
						<?php  if(!empty($reply['picture'])) { ?>
						<input type="hidden" name="picture-old" value="<?php  echo $reply['picture'];?>">
						<div id="upload-file-view" class="upload-view">
							<input type="hidden" id="bless-picture-value" value="<?php  echo $reply['picture'];?>">
							<img width="100" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['picture'];?>">&nbsp;&nbsp;
						</div>
						<?php  } else { ?>
						<div id="upload-file-view"></div>
						<?php  } ?>
					</div>
				</td>
			</tr>
			<tr>
				<th>名片详情</th>
				<td>
					<textarea style="height:50px;" name="description" class="span7" cols="60"><?php  echo $reply['description'];?></textarea>
					<div class="help-block">用于图文显示的简介</div>
				</td>
			</tr>
            <tr>
			  <th>选择名片</th>
				<td> 
                <select name="users" id="users"   >
				<?php  if(is_array($cards)) { foreach($cards as $ls) { ?>                
					<option <?php  if($reply['cid']==$ls['id']) { ?> selected="selected"<?php  } ?> value="<?php  echo $ls['id'];?>" ><?php  echo $ls['username'];?></option>				    
				<?php  } } ?>
			    </select>
                <div class="help-block">*请先维护名片后在此选择相应名片展示</div>
			  </td>
			</tr>
		</tbody>
	</table>
</div>
<link type="text/css" rel="stylesheet" href="./resource/style/daterangepicker.css" />
<script type="text/javascript" src="./resource/script/daterangepicker.js"></script>
<script type="text/javascript">
	$('#qiyong, #jinyong').click(function () {
	setTimeout("history.go(0)",500);
	});
kindeditor($('#rule'));
kindeditorUploadBtn($('#bless-picture'));
kindeditorUploadBtn($('#user-bgimage'));

	$('#date-range').daterangepicker({
        format: 'YYYY-MM-DD',
        startDate: $(':hidden[name=start_time]').val(),
        endDate: $(':hidden[name=end_time]').val(),
        locale: {
            applyLabel: '确定',
            cancelLabel: '取消',
            fromLabel: '从',
            toLabel: '至',
            weekLabel: '周',
            customRangeLabel: '日期范围',
            daysOfWeek: moment()._lang._weekdaysMin.slice(),
            monthNames: moment()._lang._monthsShort.slice(),
            firstDay: 0
        }
    }, function(start_time, end_time){
        $('#date-range .date-title').html(start_time.format('YYYY-MM-DD') + ' 至 ' + end_time.format('YYYY-MM-DD'));
        $(':hidden[name=start_time]').val(start_time.format('YYYY-MM-DD'));
        $(':hidden[name=end_time]').val(end_time.format('YYYY-MM-DD'));
    });

</script>