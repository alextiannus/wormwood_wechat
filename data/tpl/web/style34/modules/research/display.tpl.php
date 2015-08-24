<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<style>
.table td span{display:inline-block;}
.table td input{margin-bottom:0;}
</style>
<script type="text/javascript">
$(function(){
	$(".main").delegate("span.switch", "click", function(){
		var sw;
		var a = $(this).find("i");
		var reid = $(this).attr("value");
		if(a.attr("class") == 'icon-play') {
			a.attr("class", "icon-stop");
			a.parent().attr("title", "关闭");
			sw = '1';
		} else {
			a.attr("class", "icon-play");
			a.parent().attr("title", "开启");
			sw = '0';
		}
		$.post(location.href, {'reid': reid, 'switch': sw}, function(dat){
		});
	});
});
</script>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
</ul>
<form action="" method="post">
<div class="main">
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:200px;">预约活动名称</th>
					<th style="width:260px;">直接链接</th>
					<th style="width:200px;">启动时间</th>
					<th style="min-width:160px; text-align:right;"></th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($ds)) { foreach($ds as $row) { ?>
				<tr>
					<td><a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>"><?php  echo $row['title'];?></a></td>
					<td><input type="text" class="span3" value="<?php  echo $row['link'];?>" /></td>
					<td><?php  if($row['isstart']) { ?><?php  echo date('Y/m/d H:i:s', $row['starttime'])?><?php  } else { ?>未开始<?php  } ?></td>
					<td style="text-align:right;">
						<a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>" class="btn btn-small" title="预约详情"><i class="icon-search"></i></a>
						<a href="<?php  echo $this->createWebUrl('post', array('id' => $row['reid']))?>" class="btn btn-small" title="编辑"><i class="icon-edit"></i></a>
						<a onclick="return confirm('删除预约活动将删除所有关联预约记录，确认吗？');return false;" href="<?php  echo $this->createWebUrl('delete', array('id' => $row['reid']))?>" class="btn btn-small" title="删除"><i class="icon-remove"></i></a>
						<span class="btn btn-small switch" value="<?php  echo $row['reid'];?>" <?php  if($row['switch'] == 0) { ?>title="开启"><i class="icon-play"></i><?php  } else { ?>title="关闭"><i class="icon-stop"></i><?php  } ?></span>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
</form>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
