<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<div class="main">
	<ul class="nav nav-tabs">		<li<?php  if($_GPC['do'] == 'addshop') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('addshop', array('rid' => $_GPC['id']));?>">添加房型</a></li>	</ul>
	<div class="search">
		<form action="" method="get">
		<input type="hidden" name="act" value="module" />
		<input type="hidden" name="do" value="shop" />
		<input type="hidden" name="name" value="hotel" />				<input type="hidden" name="id" value="<?php  echo $rid;?>" />
		<table class="table table-bordered tb">
			<tbody>
				<tr>
					<th>房型</th>
					<td>
						<input class="span6" name="style" id="" type="text" value="<?php  echo $_GPC['style'];?>">
					</td>
				</tr>
				 <tr class="search-submit">
					<td colspan="2"><button class="btn pull-right span2"><i class="icon-search icon-large"></i> 搜索</button></td>
				 </tr>
			</tbody>
		</table>
		</form>
	</div>
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:20%;">房型</th>
					<th style="width:20%;">原价</th>										<th style="width:20%;">现价</th>
					<th style="width:20%;">设备</th>
					<th style="min-width:20%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['style'];?></td>
					<td><?php  echo $item['oprice'];?></td>
					<td><?php  echo $item['cprice'];?></td>
					<td><?php  echo $item['device'];?></td>
					<td><span><a href="<?php  echo $this->createWebUrl('addshop', array('id' => $item['id'],'rid' => $item['rid']))?>">编辑</a>&nbsp;<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('deleteshop', array('id' => $item['id']))?>">删除</a></span></td>
				</tr>
				<?php  } } ?>
			</tbody>
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<script type="text/javascript" src="./source/modules/business/images/industry.js"></script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
