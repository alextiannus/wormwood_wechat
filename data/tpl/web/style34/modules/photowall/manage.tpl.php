<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  include $this->template('common', TEMPLATE_INCLUDEPATH);?>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'list' || $_GPC['do'] == '' ) { ?> class="active"<?php  } ?>>
			<a href="<?php  echo $this->createWebUrl('list');?>">照片墙管理</a>
		</li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>>
			<a href="<?php  echo create_url('rule/post',array('module'=>'photowall'));?>">添加照片墙规则</a>
		</li>
	</ul>
	<div class="search">
		<form action="site.php" method="get">
			<input type="hidden" name="act" value="entry" />
			<input type="hidden" name="do" value="manage" />
			<input type="hidden" name="eid" value="<?php  echo $_GPC['eid'];?>" />
			<table class="table table-bordered tb">
				<tbody>
					<tr>
						<th>关键字</th>
						<td>
							<input class="span6" name="keywords" id="" type="text" value="<?php  echo $_GPC['keywords'];?>"></td>
					</tr>
					<tr class="search-submit">
						<td colspan="2">
							<button class="btn btn-primary pull-left span2" style='margin-left:95px;'> <i class="icon-search icon-large"></i>
								搜索
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th class='with-checkbox'>
						<input type="checkbox" class="check_all" />
					</th>
					<th style="width:200px;">活动名称</th>
					<th style="width:100px;">最多照片数</th>
					<th style="width:100px;">每天最多照片数</th>
					<th style="width:70px;">需要审核？</th>
					<th style="width:100px;">需要描述？</th>
					<th>开始时间/结束时间</th>
					<th>状态</th>
					<th style="min-width:60px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td class="with-checkbox">
						<input type="checkbox" name="check" value="<?php  echo $row['id'];?>"></td>
					<td><?php  echo $row['name'];?></td>
					<td><?php  echo $row['sendtimes'];?></td>
					<td><?php  echo $row['daysendtimes'];?></td>
					<td><?php  if($row['isshow'] == '1') { ?>是<?php  } else { ?>否<?php  } ?></td>
					<td><?php  if($row['isdes'] == '1') { ?>是<?php  } else { ?>否<?php  } ?></td>
					<td>
						<?php  echo $row['starttime'];?>
						<br><?php  echo $row['endtime'];?></td>
					<td><?php  echo $row['statuss'];?></td>
					<td >
						<a href="<?php  echo $this->createWebUrl('display', array('rid'=>$row['id']));?>" class="btn" rel="tooltip" title="管理图片">
							管理图片
						</a>
						<a class="btn" rel="tooltip" href="<?php  echo create_url('rule/post',array('module'=>'photowall','id'=>$row['id']));?>" title="编辑">
							<i class="icon-edit"></i>
						</a>
						<?php  if($row['status']==0) { ?>
						<a class="btn" title="开始活动" href="#" onclick="drop_confirm('您确定要开始吗,设置中途可以随时修改!', '<?php  echo create_url('site/module', array('do' =>'setshow', 'name' => 'photowall','rid'=>$row['id'],'status'=>1));?>');">
							<i class="icon-play"></i>
						</a>
						<?php  } else if($row['status']==1) { ?>
						<a class="btn" title="结束活动" href="#" onclick="drop_confirm('您确定要暂停吗,设置中途可以随时修改!', '<?php  echo create_url('site/module', array('do' =>'setshow', 'name' => 'photowall','rid'=>$row['id'],'status'=>0));?>');">
							<i class="icon-stop"></i>
						</a>
						<?php  } ?>
						<a class="btn" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo create_url('site/module', array('do' =>'delete', 'name' => 'photowall','rid'=>$row['id']))?>');" title="删除">
							<i class="icon-remove"></i>
						</a>
					</td>
				</tr>
				<?php  } } ?>
				<tr>
					<td colspan="7">

						<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
					</td>
				</tr>
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>

</div>
<script>
$(function(){
   
    $(".check_all").click(function(){
       var checked = $(this).get(0).checked;
       $("input[type=checkbox]").attr("checked",checked);
    });
	$("input[name=deleteall]").click(function(){
 
		var check = $("input:checked");
		if(check.length<1){
			err('请选择要删除的记录!');
			return false;
		}
        if( confirm("确认要删除选择的记录?")){
		var id = new Array();
		check.each(function(i){
			id[i] = $(this).val();
		});
		$.post('<?php  echo create_url('site/module', array('do' => 'deleteAll', 'name' => 'bigwheel'))?>', {idArr:id},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				alert(data.error);
			}


		},'json');
		}

	});
});
</script>
<script>
function drop_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>