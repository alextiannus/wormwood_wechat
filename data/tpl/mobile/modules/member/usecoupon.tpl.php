<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>
<form method="post">
<div class="mobile-div img-rounded">
	<div class="mobile-hd">我的优惠券</div>
	<div class="mobile-content">
		<p><?php  echo $coupon['title'];?> <?php  if($item['consumetime']) { ?>(使用时间：<?php  echo date('Y-m-d H:i:s', $item['consumetime'])?>)<?php  } ?></p>
		<p><?php  echo htmlspecialchars_decode($coupon['content'])?></p>
	</div>
</div>
<?php  if($item['status'] == 1) { ?>
<div class="mobile-submit">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	<input type="password" name="password" style="margin-bottom:10px;" placeholder="请输入消费密码">
	<button type="submit" class="btn btn-success btn-large" style="width:100%;" name="submit" value="提交">验证使用</button>
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</div>
<?php  } ?>
</form>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>