<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>

<div class="main">
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th>PUB</th>
					<th>用户姓名</th>
					<th>提交时间</th>
					<th>openid</th>
					<th>留言内容</th>
					<th>状态</th>
					<th class="norightborder">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td><?php  echo $row['pub_name'];?></td>
						<td><?php  echo $row['user_name'];?></td>
						<td><?php  echo date('Y-m-d H:i:s',$row['createtime'])?></td>
						<td><?php  echo $row['from_user'];?></td>
						<td><?php  echo $row['txt'];?></td>
						<td><?php  if($row['isok']==0) { ?>等待审核<?php  } else { ?>通过<?php  } ?></td>
						<td class="norightborder">
							<a class="btn" rel="tooltip"  href="<?php  echo $this->createWeburl('chatit', array('id'=>$row['id'],'foo'=>'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="icon-remove"></i></a>
							<?php  if($row['isok']==0) { ?>
							<a class="btn" rel="tooltip"  href="<?php  echo $this->createWeburl('chatit', array('id'=>$row['id'],'foo'=>'change','val'=>1))?>" onclick="return confirm('确定审核通过?');return false;"><i class="icon-unlock"></i></a>
							<?php  } else { ?>
							<a class="btn" rel="tooltip"  href="<?php  echo $this->createWeburl('chatit', array('id'=>$row['id'],'foo'=>'change','val'=>0))?>" onclick="return confirm('确认更改为未审核状态?');return false;"><i class="icon-unlock-alt"></i></a>
							<?php  } ?>
 						</td>
					</tr>
					<?php  } } ?> 
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>