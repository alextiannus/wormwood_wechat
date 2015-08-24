<?php defined('IN_IA') or exit('Access Denied');?>	<div id="footer">
		<span class="pull-left">
			<p><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://wormwood.com.sg"><b>WORMWOOD</b></a> V4.12 &copy; 2014 <a href="http://wormwood.com.sg">wormwood.com.sg</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></p>
		</span>
		<span class="pull-right">
			<p><?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><a href="http://wormwood.com.sg">关于WORMWOOD</a>&nbsp;&nbsp;<a href="http://wormwood.com.sg">WORMWOOD手册</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?>&nbsp;&nbsp;<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></p>
		</span>
	</div>
	<div class="emotions" style="display:none;"></div>
	<script>
		<?php  if(!empty($_W['weid']) && $_W['account']['level'] == 2) { ?>
			$.post('./account.php?act=fansync');
		<?php  } ?>
	</script>
</body>
</html>