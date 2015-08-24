<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>
<style>
body{background:#F9F9F9;}
.cardsn{position:absolute; color:<?php  echo $card['color']['number'];?>; right:20px; bottom:10px; text-shadow:0 1px 0 rgba(255, 255, 255, 0.5); font-size:16px;}
.cardtitle{position:absolute; right:20px; top:10px; color:<?php  echo $card['color']['title'];?>; font-size:16px;}
.cardlogo{position:absolute; top:10px; left:20px;}
</style>
<?php  if(!empty($member)) { ?>
<div style="position:relative; margin:10px 5px; max-width:534px; max-height:318px;">
	<div class="cardsn">卡号：<?php  echo $member['cardsn'];?></div>
	<div class="cardtitle"><?php  echo $card['title'];?></div>
	<div class="cardlogo"><img src="<?php  echo $_W['attachurl'];?><?php  echo $card['logo'];?>"></div>
	<img src="<?php  echo $card['background']['image'];?>">
</div>
<?php  } else { ?>
<div id="profile">
<form action="" method="post" onsubmit="return checkform(this); return false;">
<div class="mobile-div img-rounded">
	<div class="mobile-hd">请填写领卡资料</div>
	<div class="mobile-content">
		<table class="form-table">
		<?php  if(is_array($card['fields'])) { foreach($card['fields'] as $item) { ?>
			<tr>
				<th><label for=""><?php  echo $item['title'];?> <?php  if($item['require'] == 1) { ?><span title="必填项" class="text-error">*</span><?php  } ?></label></th>
				<td><?php  echo tpl_fans_form($item['bind'])?></td>
			</tr>
		<?php  } } ?>
		</table>
	</div>
</div>
<div class="mobile-submit">
	<button type="submit" class="btn btn-success btn-large" style="width:100%;" name="submit" value="提交">提交</button>
</div>
<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</form>
<script type="text/javascript">
<!--
	function checkform(form) {
		<?php  if(is_array($card['fields'])) { foreach($card['fields'] as $item) { ?>
			<?php  if(!empty($item['require'])) { ?>
			if (form['<?php  echo $item['bind'];?>'] && !form['<?php  echo $item['bind'];?>'].value) {
				alert('请填写<?php  echo $item['title'];?>项。');
				return false;
			}
			<?php  } ?>
		<?php  } } ?>
		return true;
	}
//-->
</script>
</div>
<?php  } ?>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>