<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<style>
.field label{float:left;margin:0 !important; width:140px;}
</style>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('manage', array('id' => $reid))?>">预约活动详情</a></li>
</ul>
<div class="main">
	<div class="stat">
		<div class="stat-div">
			<div class="navbar navbar-static-top">
				<div class="sub-item">
					<h4 class="sub-title">搜索</h4>
					<form action="">
					<input type="hidden" name="act" value="module" />
					<input type="hidden" name="name" value="research" />
					<input type="hidden" name="do" value="manage" />
					<input type="hidden" name="id" value="<?php  echo $reid;?>" />
					<table class="table sub-search">
					<tbody>
						<tr>
							<th style="width:100px;">
								预约记录情况
								<div style="font-weight:normal;">
									<label class="checkbox inline" id="field-all"><input type="checkbox" onchange="selectall(this, 'select');"> 全选</label>
								</div>
							</th>
							<td class="field">
								<?php  if(is_array($ds)) { foreach($ds as $field => $comment) { ?>
								<label class="checkbox inline"><input type="checkbox" name="select[]" value="<?php  echo $field;?>" <?php  if(in_array($field, $select)) { ?> checked="checked"<?php  } ?> /> <?php  echo $comment;?></label>
								<?php  } } ?>
							</td>
						</tr>
						<tr>
							<th>预约提交时间</th>
							<td>
								<span style="margin:0; width:100%;" class="uneditable-input" id="date-range"><span class="date-title"><?php  echo date('Y-m-d', $starttime)?> 至 <?php  echo date('Y-m-d', $endtime)?></span> <i class="icon-caret-down"></i></span>
								<input name="start" type="hidden" value="<?php  echo date('Y-m-d', $starttime)?>" />
								<input name="end" type="hidden" value="<?php  echo date('Y-m-d', $endtime)?>" />
							</td>
						</tr>
						<tr>
							<th>搜索内容</th>
							<td>
								<select name="sou" style="width:110px">
								<?php  if(is_array($ds)) { foreach($ds as $field => $comment) { ?>
									<option value="<?php  echo $field;?>"><?php  echo $comment;?></option>
								<?php  } } ?>
								</select>
								<input type="text" name="title" value="" style="margin-top:-10px"/>
							</td>
						</tr>
						<tr>
							<th></th>
							<td><input type="submit" name="" value="搜索" class="btn btn-primary"></td>
						</tr>
					</tbody>
					</table>
					</form>
				</div>
			</div>
			<form action="" method="post" onsubmit="">
			<div class="sub-item" id="table-list">
				<h4 class="sub-title">详细数据  <span style="float:right"><a href="<?php  echo $this->createWebUrl('excel', array('id' => $reid,'select'=>$sel))?>">导出Excel</a></span></h4>
				<div class="sub-content">
					<table class="table table-hover">
						<thead class="navbar-inner">
							<tr>
								<th class="row-hover" style="width:150px;">用户<i></i></th>
								<?php  if(is_array($select)) { foreach($select as $fid) { ?>
								<th><?php  echo $ds[$fid];?><i></i></th>
								<?php  } } ?>
								<th style="width:130px;">提交时间<i></i></th>
								<th style="min-width:40px;">是否通过审核</th>
								<th style="min-width:40px;"></th>
							</tr>
						</thead>
						<tbody>
							<?php  if(is_array($list)) { foreach($list as $row) { ?>
							<tr>
								<td class="row-hover"><a href="javascript:;" title="<?php  echo $row['from_user'];?>"><?php  echo cutstr($row['openid'], 8)?></a></td>
								<?php  if(is_array($select)) { foreach($select as $fid) { ?>
								<td><?php  echo $row['fields'][$fid];?><i></i></td>
								<?php  } } ?>
								<td style="font-size:12px; color:#666;">
								<?php  echo date('Y-m-d H:i:s', $row['createtime']);?>
								</td>
								<td>
									<div align="center"><?php echo $row['status'] == 1?'通过':'未审核';?></div>
								</td>
								<td>
								<!--<a href="<?php  echo $this->createWebUrl('detail', array('id' => $row['rerid']))?>">编辑</a>&nbsp;|&nbsp;-->
								<a href="<?php  echo $this->createWebUrl('detail', array('id' => $row['rerid']))?>">详情</a>&nbsp;|&nbsp;
								<a href="<?php  echo $this->createWebUrl('researchdelete', array('id' => $row['rerid']))?>">删除</a>
								</td>
							</tr>
							<?php  } } ?>
						</tbody>
					</table>
					<table class="table">
						<tr>
							<td class="row-first"></td>
							<td>
								<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
							</td>
						</tr>
					</table>
				</div>
				</form>
				<?php  echo $pager;?>
			</div>
		</div>
	</div>
</div>
<link type="text/css" rel="stylesheet" href="./resource/style/daterangepicker.css" />
<script type="text/javascript" src="./resource/script/daterangepicker.js"></script>
<script>
$(function() {
	//详细数据相关操作
	var tdIndex;
	$("#table-list thead").delegate("th", "mouseover", function(){
		if($(this).find("i").hasClass("")) {
			$("#table-list thead th").each(function() {
				if($(this).find("i").hasClass("icon-sort")) $(this).find("i").attr("class", "");
			});
			$("#table-list thead th").eq($(this).index()).find("i").addClass("icon-sort");
		}
	});
	$("#table-list thead th").click(function() {
		if($(this).find("i").length>0) {
			var a = $(this).find("i");
			if(a.hasClass("icon-sort") || a.hasClass("icon-caret-up")) { //递减排序
				/*
					数据处理代码位置
				*/
				$("#table-list thead th i").attr("class", "");
				a.addClass("icon-caret-down");
			} else if(a.hasClass("icon-caret-down")) { //递增排序
				/*
					数据处理代码位置
				*/
				$("#table-list thead th i").attr("class", "");
				a.addClass("icon-caret-up");
			}
			$("#table-list thead th,#table-list tbody:eq(0) td").removeClass("row-hover");
			$(this).addClass("row-hover");
			tdIndex = $(this).index();
			$("#table-list tbody:eq(0) tr").each(function() {
				$(this).find("td").eq(tdIndex).addClass("row-hover");
			});
		}
	});
	$('#date-range').daterangepicker({
		format: 'YYYY-MM-DD',
		startDate: $(':hidden[name=start]').val(),
		endDate: $(':hidden[name=end]').val(),
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
	}, function(start, end){
		$('#date-range .date-title').html(start.format('YYYY-MM-DD') + ' 至 ' + end.format('YYYY-MM-DD'));
		$(':hidden[name=start]').val(start.format('YYYY-MM-DD'));
		$(':hidden[name=end]').val(end.format('YYYY-MM-DD'));
	});
});
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
