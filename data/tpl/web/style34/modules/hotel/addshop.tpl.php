<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<div class="main">
	<ul class="nav nav-tabs">		<li<?php  if($_GPC['do'] == 'addshop') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('addshop', array('rid' => $_GPC['id']));?>">添加房型</a></li>	</ul>
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	<h4>房型基本信息</h4>
	<table class="tb">
		<tr>
			<th>房型</th>
			<td><input type="text" name="style" value="<?php  echo $item['style'];?>" class="span5"></td>
		</tr>				<tr>			<th>原价</th>			<td><input type="text" name="oprice" value="<?php  echo $item['oprice'];?>" class="span5"></td>		</tr>				<tr>			<th>现价</th>			<td><input type="text" name="cprice" value="<?php  echo $item['cprice'];?>" class="span5"></td>		</tr>
		<tr>
			<th><label for="">图片展示</label></th>
			<td>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"><?php  if($item['thumb']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>" width="200" /><?php  } ?></div>
					<div>
						<span class="btn btn-file"><span class="fileupload-new">选择图片</span><span class="fileupload-exists">更改</span><input name="thumb" type="file" /></span>
						<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
						<?php  if($item['thumb']) { ?><button type="submit" name="fileupload-delete" value="<?php  echo $item['thumb'];?>" class="btn fileupload-new">删除</button><?php  } ?>
					</div>
				</div>
				<span class="help-block"></span>
			</td>
		</tr>
		<tr>
			<th>简介</th>
			<td>
				<textarea style="height:100px;" class="span7 richtext-clone" name="device" cols="70" id="reply-add-text"><?php  echo $item['device'];?></textarea>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<button type="submit" class="btn btn-primary span3" name="submit" value="提交">提交</button>
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript" src="./resource/script/cascade.js"></script>
<script type="text/javascript">
kindeditor($('.richtext-clone'));
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
