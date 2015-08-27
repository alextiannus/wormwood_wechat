<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no">
<title>排行榜</title>
<link rel="stylesheet" href="./source/modules/mm/images/jquery.mobile-1.4.2.min.css">
<link rel="stylesheet" href="./source/modules/mm/images/mobile.css">

<script src="./source/modules/mm/images/jquery-2.1.1.min.js"></script>
<script src="./source/modules/mm/images/jquery.mobile-1.4.2.min.js"></script>

<div data-role="page" >
<script type="text/javascript">

	</script>
	  <div data-role="content">
		  <div role="main" class="ui-content" >
		  <div class="TheArmory">
		    	<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<a href="#" data-ajax="false">
				<div class="TheArmoryList" >
				
			    	<dl class="Thefirst Theranking">
		    	
		    	
		    	
			        	<dt><img src="<?php  echo $detail['thumb'];?><?php  echo $item['tou'];?>" width="54" height="54" /></dt>
			            <dd>
			            	<span style="color:#000">姓名:</span><a data-ajax="false" style="color:#000;font-weight:normal;" href='mobile.php?act=module&id=<?php  echo $item['id'];?>&weid=<?php  echo $_W['weid'];?>&name=mm&do=detail'><?php  echo $item['name'];?></a>
			                <label style="color:#000">地址:<?php  echo $item['address'];?></label>
			            </dd>
			        </dl>
			        <ul>
			        	<li style="color:#000"><img src="./source/modules/mm/images/zan.png" width="11" height="11" />(<?php  echo $item['zan'];?>)</li>
			            <li style=" margin-left:-1px; border-left:1px solid #e1e5e6;color:#000"></li>
			        </ul>
			    </div>
			   </a>
	<?php  } } ?>
	</div>	    
		<?php  echo $pager;?>
		    
		</div>	  </div>
	</div> 
