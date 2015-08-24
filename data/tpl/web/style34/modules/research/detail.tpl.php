<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<style type="text/css">
table li{padding:5px 0;}
small a{color:#999;}
</style>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
	<li><a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>">预约活动详情</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('detail', array('id' => $row['reid']))?>">预约记录详情</a></li>
</ul>
<div class="main">
	<div class="form form-horizontal">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
		<h4>预约活动信息</h4>
		<table class="tb">
			<tr>
				<th><label for="">预约标题</label></th>
				<td>
					<?php  echo $activity['title'];?>
				</td>
			</tr>
			<tr>
				<th><label for="">预约活动说明</label></th>
				<td>
					<?php  echo $activity['description'];?>
				</td>
			</tr>
			<tr>
				<th><label for="">预约活动提示</label></th>
				<td>
					<?php  echo $activity['information'];?>
				</td>
			</tr>
			<tr>
				<th><label for="">图片介绍</label></th>
				<td>
					<img src="<?php  echo $_W['attachurl'];?><?php  echo $activity['thumb'];?>" style="height:150px;" />
				</td>
			</tr>
			<tr>
				<th><label for="">创建时间</label></th>
				<td>
					<?php  echo date('Y-m-d H:i:s', $activity['createtime']);?>
				</td>
			</tr>
			<tr>
				<th><label for="">开始时间</label></th>
				<td>
					<?php  echo date('Y-m-d H:i:s', $activity['starttime']);?>
				</td>
			</tr>
			<tr>
				<th><label for="">状态</label></th>
				<td>
					<label>
					<?php  if($activity['status'] == '1') { ?>
						<i class="icon-check"> &nbsp; 当前预约活动生效中</i>
					<?php  } else { ?>
						<i class="icon-check-empty"> &nbsp; 当前预约活动已失效</i>
					<?php  } ?>
					</label>
				</td>
			</tr>
			<tr>
				<th><label for="">微站首页展示</label></th>
				<td>
					<label>
					<?php  if($activity['inhome'] == '1') { ?>
						<i class="icon-check"> &nbsp; 当前预约活动将展示在微站首页上</i>
					<?php  } else { ?>
						<i class="icon-check-empty"> &nbsp; 当前预约活动不显示在微站首页</i>
					<?php  } ?>
					</label>
				</td>
			</tr>
		</table>
		<h4>用户提交的信息</h4>
		<table class="tb">
			<tr>
				<th><label for="">用户</label></th>
				<td>
					<a href="<?php  echo create_url('site/module/profile', array('name' => 'fans', 'from_user' => $row['openid']));?>"><?php  echo $row['openid'];?></a>
				</td>
			</tr>
			<tr>
				<th><label for="">用户提交时间</label></th>
				<td>
					<?php  echo date('Y-m-d H:i:s', $row['createtime']);?>
				</td>
			</tr>
			<tr>
				<th><label for="">是否通过审核</label></th>
				<td>
					<input type="text" name="sta" style="width:50px" value="<?php echo $row['status'] == 1?'通过':'未审核';?>" /><span style="color:red"> &nbsp; &nbsp;注：2是未审核 | 1是通过</span>
				</td>
			</tr>
			<?php  if(is_array($ds)) { foreach($ds as $fid => $ftitle) { ?>
			<tr>
				<th><label for=""><?php  echo $ftitle['fid'];?></label></th>
				<td>
					<?php  if($ftitle['type'] == 'image') { ?><a target="_blank" href="<?php  echo $_W['attachurl'];?><?php  echo $row['fields'][$fid];?>">点击查看<?php  echo $ftitle['fid'];?></a><?php  } else { ?><?php  echo $row['fields'][$fid];?><?php  } ?>
				</td>
			</tr>
			<?php  } } ?>
			<tr>
				<th></th>
				<td>
				<button type="submit" class="btn btn-primary span3" name="submit" value="提交">提交</button>&nbsp; &nbsp; &nbsp;
				</form>
					<!--<input type="submit" class="btn btn-primary span3" name="submit" onclick="history.go(-1)" value="返回" />-->
				</td>
			</tr>
		</table>
		
	</div>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
