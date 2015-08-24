<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>
<style>
  img{max-width:100%!important;}
  #mbutton{padding:15px 10px 15px 10px; overflow:hidden;}
  #mbutton > span{float:right; display:inline-block; background:#58a3ff; border:1px #63a0eb solid; color:#FFF; height:30px; line-height:30px; padding:0 10px; margin-left:10px;}
</style>
<link rel="stylesheet" type="text/css" href="./themes/mobile/default/site/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="./themes/mobile/default/site/css/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="./themes/mobile/default/site/css/peak-3.css" media="all" />
<link rel="stylesheet" type="text/css" href="./themes/mobile/default/site/css/share_and_recommond.css" />
<script type="text/javascript" src="./themes/mobile/default/site/css/jQuery.js"></script>
<link rel="stylesheet" type="text/css" href="./themes/mobile/default/site/css/font-awesome.css" media="all" />
<style>
body {
	background-color: #e7e8eb;
	font-family: "Helvetica Neue", Helvetica, "Hiragino Sans GB",
		"Microsoft YaHei", "微软雅黑", Arial, sans-serif;
}

h2 {
	line-height: 24px;
	font-weight: 700;
	font-size: 20px;
	word-wrap: break-word;
	-webkit-hyphens: auto;
	-ms-hyphens: auto;
	hyphens: auto
}
	 
</style>
<div class="body" style="padding-bottom: 60px;">
	<section class="news_article">
		<header>
			<h2 style="font-size:20px;"><?php  echo $detail['title'];?></h2>
			<br>
		<!--  <hr style="borber:1px blue solid;position: relative;" /> -->
			<small class="gray"> &nbsp; <?php  echo date("Y-m-d", $detail['createtime']);?> 
				&nbsp;&nbsp;
				<!--<?php  if(empty($detail['author'])) { ?> <?php  echo $_W['account']['name'];?> <?php  } else { ?> <?php  echo $detail['author'];?> <?php  } ?> -->
				&nbsp;&nbsp; 
				<?php  $alink = $_W['account']['accountlink']?>
				<a href="<?php  echo $alink;?>" target="_blank"> <?php  if(empty($detail['source'])) { ?><?php  echo $_W['account']['name'];?> <?php  } ?> </a>
			</small>
		</header>
		
		<img data-src="/themes/mobile/default/images/0.gif" data-ratio="0.1" data-w="500" style="width: auto !important; visibility: visible !important; height: auto !important;" src="/themes/mobile/default/images/0.gif">
		
		<article><?php  echo $detail['content'];?></article>
	</section>
	
		
</div>

<div id="mbutton">
	<a class="source"
		href="<?php  echo $this->createMobileUrl('detail', array('id' => $detail['id'], 'weid' => $_W['weid']))?>"
		target="_blank"> 阅读原文</a> <!--<span class="img-rounded">
		<i class="icon-home"></i>
	 <a style="color: white" href="<?php  echo create_url('mobile/channel', array('name'=>'index', 'weid'=>$_W['weid']))?>">首页</a>  
	</span>-->
	<span class="img-rounded" onclick="$('#mcover').show()"> <i class="icon-share-alt"></i> 转发</span> 
	<span class="img-rounded" onclick="$('#mcover').show()"><i class="icon-group"></i> 分享 </span>
</div>
<div id="mcover" onclick="$(this).hide()"><img src="./source/modules/site/template/image/guide.png"></div>

<div class="toogle_wrap">
  <hr style="border:1px dashed #000; height:1px">
  <div class="toggle_container">
    <ul class="lists">
      <p style="padding:4px;weight:bold">相关推荐</p>
      <?php  include_once IA_ROOT . '/source/modules/site/model.php'?>
      <?php  $slide = site_article_search($detail['pcate'], '');?>
      <?php  if(is_array($slide['list'])) { foreach($slide['list'] as $v) { ?>
      <p style="padding:2px 4px"><a href="<?php  echo create_url('mobile/channel', array('name' => 'detail', 'id' => $v['id'], 'weid' => $_W['weid']))?>"><?php  echo $v['title'];?>→</a></li>
      <?php  } } ?>
    </ul>
  </div>
</div>
<div class="clear"></div>

<script>
$(function() {
});
</script>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>
