<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<div class="main">

	<form action="" method="post" class="form-horizontal form">
	
		<h4>邮件设置</h4>
		
		<table class="tb">
		
			<tr>
			
				<th>邮箱服务器</th>
				
				<td>
				
					<select name="host" class="span3">
					
						<option value="smtp.qq.com" <?php  if($settings['host'] == 'smtp.qq.com' ) { ?> selected="selected"<?php  } ?>>QQ邮箱</option>	
						
						<option value="smtp.126.com" <?php  if($settings['host'] == 'smtp.126.com' ) { ?> selected="selected"<?php  } ?>>126邮箱</option>	

						<option value="smtp.163.com" <?php  if($settings['host'] == 'smtp.163.com' ) { ?> selected="selected"<?php  } ?>>163邮箱</option>

						<option value="smtp.sina.com" <?php  if($settings['host'] == 'smtp.sina.com' ) { ?> selected="selected"<?php  } ?>>sina邮箱</option>						
						
					</select>
				
					<div>QQ邮箱务必开启smtp服务</div>
				</td>

			</tr>
			
			<tr>
			
				<th>发件邮箱</th>
				
				<td>
				
					<input type="text" name="sendmail" class="span3" value="<?php  echo $settings['sendmail'];?>" />
					<div>通过此邮箱向商家发送订单信息</div>
				</td>

			</tr>
			
			<tr>
			
				<th>发件邮箱用户名</th>
				
				<td>
				
					<input type="text" name="senduser" class="span3" value="<?php  echo $settings['senduser'];?>" />
					<div>邮箱用户名</div>
				</td>

			</tr>
			
			<tr>
			
				<th>发件邮箱密码</th>
				
				<td>
				
					<input type="password" name="sendpwd" class="span3" value="<?php  echo $settings['sendpwd'];?>" />
					<div>邮箱密码</div>
				</td>

			</tr>
			
			<tr>
			
				<th></th>
				
				<td>
					
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3" style="height:30px" />
					
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				
				</td>
				
			</tr>
			
		</table>
		
	</form>
	
</div>

<link rel="stylesheet" type="text/css" href="./source/modules/grabseat/template/style/css/main.css" />
<link rel="stylesheet" type="text/css" href="./source/modules/grabseat/template/style/css/jquery-ui.css" />

<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>