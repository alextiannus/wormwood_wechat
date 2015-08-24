<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<div class="main">
	<form action="" method="post" class="form-horizontal form">
		<h4>参数设置</h4>
		<table class="tb">
			<tr>
				<th>是否需要审核</th>
				<td>
					<input type="radio" name="ischeck" value="0" <?php  if($settings['ischeck'] == '0'|| empty($settings['ischeck'])) { ?>checked<?php  } ?>/> 否
					<input type="radio" name="ischeck" value="1" <?php  if($settings['ischeck'] == '1') { ?>checked<?php  } ?>/> 是
					<div class="help-block">邻座的他是否开启审核</div>
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</td>
			</tr>
		</table>
		<h4>参数设置</h4>
		<tr>
				<th>借用WORMWOODoAuth2.0高级权限</th>
				<td>
				<a href="<?php  echo create_url('site/module/Osetting',array('name'=>'oauth2'));?>">点击进入设置</a>
				</td>
			</tr>
	</form>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>