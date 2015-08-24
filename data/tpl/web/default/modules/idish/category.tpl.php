<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<!--<ul class="nav nav-tabs">-->
	<!--<li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('category', array('op' => 'post'))?>">添加分类</a></li>-->
	<!--<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('category', array('op' => 'display'))?>">管理分类</a></li>-->
<!--</ul>-->
<input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
<?php  echo $this -> set_tabbar($action, $storeid);?>
<?php  if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
    <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'idish'));?>" style="font-size:0.8em">入口设置</a></h4>
	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
		<h4>分类详细设置</h4>
		<table class="tb">
			<?php  if(!empty($parentid)) { ?>
			<tr>
				<th><label for="">上级分类</label></th>
				<td>
					<?php  echo $parent['name'];?>
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
				<th><label for="">分类名称</label></th>
				<td>
					<input type="text" name="catename" class="span6" value="<?php  echo $category['name'];?>" />
				</td>
			</tr>
			<tr>
				<th><label for="">分类描述</label></th>
				<td>
					<textarea name="description" class="span6" cols="70"><?php  echo $category['description'];?></textarea>
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
<?php  } else if($operation == 'display') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'idish'));?>" style="font-size:0.8em">入口设置</a></h4>
        <a class="btn" href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'storeid' => $storeid))?>"><i class="icon-plus"></i>添加分类</a>
        <a class="btn" href="javascript:location.reload()"><i class="icon-refresh"></i>刷新</a>
        <div style="padding-top: 15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:60px;">显示顺序</th>
                <th>分类名称</th>
                <th style="width:80px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($category)) { foreach($category as $row) { ?>
            <tr>
                <td><input type="text" class="span1" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
                <td><div class="type-parent"><?php  echo $row['name'];?>&nbsp;&nbsp;</div></td>
                <td><a href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'id' => $row['id'], 'storeid' => $storeid))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('category', array('op' => 'delete', 'id' => $row['id'], 'storeid' => $storeid))?>" onclick="return confirm('确认删除此分类吗？');return false;">删除</a></td>
            </tr>
            <?php  } } ?>
            <tr>
                <td colspan="3">
                    <input name="submit" type="submit" class="btn btn-primary" value="批量更新排序">
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </form>
    <?php  echo $pager;?>
</div>
<?php  } ?>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>