<?php defined('IN_IA') or exit('Access Denied');?><?php  include template('common/header', TEMPLATE_INCLUDEPATH);?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo create_url('index/welcome/' . $do);?>">概况</a></li>
	<li class="active"><a href="<?php  echo create_url('index/sysinfo/' . $do);?>">系统信息</a></li>
</ul>
<div class="main">
	<div style="padding:15px 15px 0 15px;">
		<table class="table">
			<tr><th colspan="2" class="alert alert-info">用户信息</th></tr>
			<tr>
				<th style="width:250px;">用户ID</th>
				<td><?php  echo $info['uid'];?></td>
			</tr>
			<tr>
				<th style="width:250px;">当前公众号</th>
				<td><?php  echo $info['account'];?></td>
			</tr>
			<tr><th colspan="2" class="alert alert-info">系统信息</th></tr>
			<tr>
				<th style="width:250px;">WORMWOOD程序版本</th>
				<td>WDL 0508 &nbsp; &nbsp; <a href="http://bbs.wormwood.com" target="_blank">查看最新版本</a></td>
			</tr>
			<tr>
				<th>产品系列</th>
				<td>您的产品是商业版, 可以正常商业使用..</td>
			</tr>
			<tr>
				<th>服务器系统</th>
				<td><?php  echo $info['os'];?></td>
			</tr>
			<tr>
				<th>PHP版本 </th>
				<td>PHP Version <?php  echo $info['php'];?></td>
			</tr>
			<tr>
				<th>服务器软件</th>
				<td><?php  echo $info['sapi'];?></td>
			</tr>
			<tr>
				<th>服务器 MySQL 版本</th>
				<td><?php  echo $info['mysql']['version'];?></td>
			</tr>
			<tr>
				<th>上传许可</th>
				<td><?php  echo $info['limit'];?></td>
			</tr>
			<tr>
				<th>当前数据库尺寸</th>
				<td><?php  echo $info['mysql']['size'];?></td>
			</tr>
			<tr>
				<th>当前附件根目录</th>
				<td><?php  echo $info['attach']['url'];?></td>
			</tr>
			<tr>
				<th>当前附件尺寸</th>
				<td><?php  echo $info['attach']['size'];?></td>
			</tr>
		</table>
		<?php  if($_W['isfounder']) { ?>
		<table class="table">
			<tr><th colspan="2" class="alert alert-info">WORMWOOD开发团队</th></tr>
			<tr>
				<th style="width:250px;">版权所有</th>
				<td><a href="http://www.wormwood.com/" target="_blank"><b>WDL_v7.0</b></a></td>
			</tr>
			<tr>
				<th>Team 成员</th>
				<td>
					<a href="javascript:;" class="lightlink2 smallfont" target="_blank">曾进 (Cosen	)</a>; &nbsp;
					<a href="javascript:;" class="lightlink2 smallfont" target="_blank">许秦</a>; &nbsp;
					<a href="javascript:;" class="lightlink2 smallfont" target="_blank">李明</a>
				</td>
			</tr>
	
			<tr>
				<th>相关链接</th>
				<td>
					<a href="http://www.wormwood.com/" class="lightlink2" target="_blank">公司网站</a>,
					<a href="http://www.wormwood.com/" class="lightlink2" target="_blank">购买授权</a>,
					<a href="http://bbs.wormwood.com/" class="lightlink2" target="_blank">更多模块</a>,
					<a href="http://www.wormwood.com/" class="lightlink2" target="_blank">文档</a>,
					<a href="http://bbs.wormwood.com/" class="lightlink2" target="_blank">讨论区</a>
				</td>
			</tr>
		</table>
		<?php  } ?>
	</div>
</div>
<?php  include template('common/footer', TEMPLATE_INCLUDEPATH);?>
