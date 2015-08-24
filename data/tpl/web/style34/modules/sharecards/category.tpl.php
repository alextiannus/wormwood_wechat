<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<ul class="nav nav-tabs">
	<li <?php  if($foo == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'post'))?>">添加新类型</a></li>
	<li <?php  if($foo == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'display'))?>">管理类型/预设词</a></li>
</ul>
<?php  if($foo == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
		<h4><?php  if(!empty($parentid)) { ?>预设词<?php  } else { ?>类型<?php  } ?>详细设置</h4>
		<h6>说明：类型为卡的种类如：春节卡，中秋卡，同学卡；预设词为卡类型下的预设词以及内容，最好十个；如：含蓄－－含蓄的表白词</h6>
		<table class="tb">
			<?php  if(!empty($parentid)) { ?>
			<tr>
				<th><label for="">万能卡类型</label></th>
				<td>
					<?php  echo $parent['title'];?>
				</td>
			</tr>
			<?php  } ?>
			<tr>
				<th><label for="">排序</label></th>
				<td>
					<input type="text" name="displayorder" class="span6" value="<?php  echo $category['displayorder'];?>" />
				</td>
			</tr>
			<tr>
				<th><label for=""><?php  if(!empty($parentid)) { ?>预设词<?php  } else { ?>类型<?php  } ?>名称</label></th>
				<td>
					<input type="text" name="cname" class="span6" value="<?php  echo $category['title'];?>" />
				</td>
			</tr>
			<tr>
				<th><label for=""><?php  if(!empty($parentid)) { ?>预设词<?php  } else { ?>类型<?php  } ?>内容</label></th>
				<td>
					<textarea name="description" class="span6" cols="70"><?php  echo $category['description'];?></textarea>
				</td>
			</tr>
		</table>
		<table class="tb">
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
<?php  } else if($foo == 'display') { ?>
<div class="main">
	<div class="category">
		<form action="" method="post" onsubmit="return formcheck(this)">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="width:10px;"></th>
					<th style="width:60px;">显示顺序</th>
					<th style="width:120px;">类型/预设词</th>
					<th>预设词内容</th>
					<th style="width:80px;">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($category)) { foreach($category as $row) { ?>
				<tr>
					<td><?php  if(count($children[$row['id']]) > 0) { ?><a href="javascript:;"><i class="icon-chevron-down"></i></a><?php  } ?></td>
					<td><input type="text" class="span1" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td><div class="type-parent"><?php  echo $row['title'];?>&nbsp;&nbsp;<?php  if(empty($row['parentid'])) { ?><a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'post', 'parentid' => $row['id']))?>" title="添加预设词"><i class="icon-plus-sign-alt"></i></a><?php  } ?></div></td>
					<td><?php  echo $row['description'];?></td>
					<td><a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'post', 'id' => $row['id']))?>" title="编辑" class="btn btn-small"><i class="icon-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'delete', 'name' => 'sharecards', 'id' => $row['id']))?>" onclick="return confirm('确认删除此预设词吗？');return false;" title="删除" class="btn btn-small"><i class="icon-remove"></i></a></a>
					</td>
				</tr>
				<?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row) { ?>
				<tr>
					<td></td>
					<td><input type="text" class="span1" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td><div class="type-child"><?php  echo $row['title'];?>&nbsp;&nbsp;<?php  if(empty($row['parentid'])) { ?><a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'post', 'parentid' => $row['id']))?>"><i class="icon-plus-sign-alt" title="添加预设词"><i class="icon-plus-sign-alt"></i></a><?php  } ?></div></td>
					<td><?php  echo $row['description'];?></td>
					<td><a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'post', 'id' => $row['id']))?>" title="编辑" class="btn btn-small"><i class="icon-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此预设词吗？');return false;" title="删除" class="btn btn-small"><i class="icon-remove"></i></a>
				</td>
				</tr>
				<?php  } } ?>
			<?php  } } ?>
				<tr>
					<td></td>
					<td colspan="5">
						<a href="<?php  echo $this->createWebUrl('sharecardscategory', array('foo' => 'post'))?>"><i class="icon-plus-sign-alt"></i> 添加新类型</a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="5">
						<input name="submit" type="submit" class="btn btn-primary" value="提交">
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</td>
				</tr>
			</tbody>
		</table>
		</form>
		<?php  echo $pager;?>
	</div>
</div>
<?php  } ?>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>