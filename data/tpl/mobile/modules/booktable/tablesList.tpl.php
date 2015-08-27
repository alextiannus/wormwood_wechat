<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>
<style>
.list{}
.list li a{display:block; height:60px; padding:5px; border-bottom:1px #EEE solid; color:#333; overflow:hidden; text-decoration:none !important; position:relative;}
.list li a .thumb{width:80px; height:60px;}
.list li a .title{font-size:16px;}
.list li a .tableSize{font-size:12px; color:#999; position:absolute; bottom:0;}
.head{height:40px; line-height:40px; background:#2786fb; margin-bottom:5px; padding:0 5px; color:#FFF;}
.head .bn{display:inline-block; height:30px; line-height:30px; padding:0 10px; margin-top:4px; font-size:20px; border:1px #1176f2 solid; background:#3f95ff; color:#FFF; text-decoration:none;}
.head .bn.pull-right{position:absolute; right:5px; top:0;}
.head .title{font-size:12pt;display:block;font-weight:bolder;text-align:center;height:40px;line-height:40px;text-overflow:ellipsis;white-space:nowrap;overflow: hidden;}
.head .order{background:#F9F9F9; position:absolute; z-index:9999; right:0;}
.head .order li > a{display:block; padding:0 10px; min-width:100px; height:35px; line-height:35px; font-size:16px; color:#333; text-decoration:none; border-top:1px #EEE solid;}
.head .order li.icon-caret-up{font-size:20px;color:#F9F9F9;position:absolute;top:-11px;right:16px;}
</style>
<div class="head">
	<span class="title">房间类型列表</span>
</div>
<ul class="list unstyled">
	<?php  if(is_array($tableList)) { foreach($tableList as $row) { ?>
	<li>
		<a href="<?php  echo $this->createMobileUrl('research', array('id' => $row['reid'],'tableName' =>$row['tableName'] ))?>">
			<?php  if($row['img']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $row['img'];?>" class="pull-right thumb" onerror="this.parentNode.removeChild(this)" /><?php  } ?>
			<div class="tableName"><?php  echo $row['tableName'];?></div>
			<div class="tableSize"><?php  echo $row['tableSize'];?></div>
		</a>
	</li>
	<?php  } } ?>
</ul>
<?php  echo $result['pager'];?>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>