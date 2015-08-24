<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<ul class="nav nav-tabs">
	<li <?php  if($op == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('mmphoto', array('op' => 'post'));?>">添加美图</a></li>
	<li <?php  if($op == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('mmphoto', array('op' => 'display'));?>">美图列表</a></li>
</ul>
<style>
.table td span{display:inline-block;margin-top:4px;}
.table td input{margin-bottom:0;}
</style>
<?php  if($op == 'display') { ?>
<div class="main">
	<div style="padding:15px;">
		<table class="table table-hover table-striped">
			<thead class="navbar-inner">
				<tr>
					<th style="width:60px">编号</th>
					<th style="width:100px;">姓名</th>
					<th style="width:180px;">地址</th>
					<th style="width:50px;">年龄</th>
					<th style="width:100px;">工作</th>
					<th style="width:50px;">QQ</th>
					<th style="width:50px;">微信</th>
					<th style="width:100px;">获赞次数</th>
					<th style="width:50px;">排名</th>
					<th style="width:100px;text-align:right;">操作</th>
				</tr>
			</thead>
			<tbody>
					<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
<td><?php  echo $item['id'];?></td>
<td><a target='_blank' href='mobile.php?act=module&id=<?php  echo $item['id'];?>&weid=<?php  echo $_W['weid'];?>&name=mm&do=detail'><?php  echo $item['title'];?></a></td>
<td><?php  echo $item['address'];?></td>
<td><?php  echo $item['age'];?></td>
<td><?php  echo $item['work'];?></td>
<td><?php  echo $item['qq'];?></td>
<td><?php  echo $item['weixin'];?></td>
<td><?php  echo $item['zan'];?></td>
<td><?php  echo $item['tops'];?></td>
					<td style="text-align:right;">
						<a href="<?php  echo $this->createWebUrl('mmphoto', array('op' => 'post', 'id' => $item['id']))?>" title="编辑" class="btn btn-mini"><i class="icon-edit"></i></a>
						<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('mmphoto', array('op' => 'del', 'id' => $item['id']))?>" title="删除" class="btn btn-mini"><i class="icon-remove"></i></a>
					</td>
				</tr>
				
				<?php  } } ?>
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  } else if($op == 'post') { ?>
<div class="main">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
		<h4>图片管理</h4>
		<table class="tb">
			<?php  if(!empty($item)) { ?>
			<tr>
				<th><label for="">访问地址</label></th>
				<td>
					<a href="<?php  echo $this->createMobileUrl('detail', array('id' => $item['id'], 'weid' => $_W['weid']))?>" target="_blank"><?php  echo $this->createMobileUrl('detail', array('id' => $item['id'], 'weid' => $_W['weid']))?></a>
					<span class="help-block">手机端图文地址</span>
				</td>
			</tr>
			<?php  } ?>
			<tr>
				<th><label for="">姓名</label></th>
				<td>
					<input type="text" class="span4" placeholder="" name="title" value="<?php  echo $item['title'];?>">
					<span class="help-block">填写你的名字,或者照片名字</span>
				</td>
			</tr>
			
			<tr>
				<th><label for="">头像</label></th>
				<td>
				<?php echo tpl_form_field_image('tou', $item['tou'] =='' ? $setting['thumb'] : $item['tou']);?>
					<span class="help-block">头像</span>
				</td>
			</tr>
			
			
			<tr>
				<th><label for="">图片</label></th>
				<td>
					<?php echo tpl_form_field_image('img', $item['img'] =='' ? $setting['thumb'] : $item['img']);?>
					<span class="help-block">上传的图片,支持本地或网络图片</span>
				</td>
			</tr>
						<tr>
				<th><label for="">来自</label></th>
				<td>
					<input type="text" class="span6" placeholder="" name="address" value="<?php  echo $item['address'];?>">
					<span class="help-block">住址</span>
				</td>
			</tr>
			<tr>
				<th><label for="">图片拍照地址</label></th>
				<td>
					<input type="text" class="span6" placeholder="" name="paddress" value="<?php  echo $item['paddress'];?>">
					<span class="help-block">照片拍照地</span>
				</td>
			</tr>
			<tr>
				<th><label for="">年龄</label></th>
				<td>
<input type="text" class="span2" placeholder="" name="age" value="<?php  echo $item['age'];?>">
<span class="help-block">选填信息</span>
				</td>
			</tr>
			<tr>
				<th><label for="">工作</label></th>
				<td>
<input type="text" class="span7" placeholder="" name="work" value="<?php  echo $item['work'];?>">
<span class="help-block">选填信息</span>
				</td>
			</tr>
			<tr>
				<th><label for="">QQ</label></th>
				<td>
<input type="text" class="span3" placeholder="" name="qq" value="<?php  echo $item['qq'];?>">
<span class="help-block">选填信息</span>
				</td>
			</tr>
			<tr>
				<th><label for="">微信号</label></th>
				<td>
<input type="text" class="span3" placeholder="" name="weixin" value="<?php  echo $item['weixin'];?>">
<span class="help-block">选填信息</span>
				</td>
			</tr>
			<tr>
				<th>附加信息,用于图文模式详细页面</th>
				<td>
					<textarea style="height:200px; width:80%;" class="span7 richtext-clone" name="txt" cols="70" id="reply-add-text"><?php  echo $item['txt'];?></textarea>
				</td>
			</tr>
		</table>

		<table class="tb">
			<tr>
				<th></th>
				<td>
					<button type="submit" class="btn btn-primary span3" name="submit" value="提交">保存</button>
				
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</td>
			</tr>
		</table>
	</form>
</div>
<script type="text/javascript">
<!--
	kindeditor($('.richtext-clone'));
//-->
</script>
<?php  } ?>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
