<?php defined('IN_IA') or exit('Access Denied');?><?php  include template('common/header', TEMPLATE_INCLUDEPATH);?>
	<div class="main">
	<div style="padding:15px;">
			<h4>微站内容设置</h4>
			<table class="tb">
				<tr>
				<tr>
					<th><label for="">微站文章栏目设置</label></th>
					<td>
					<a href="<?php  echo create_url('site/module/Category',array('name'=>'site'));?>">点击管理栏目</a>
					</td>
				</tr>
				<tr>
					<th><label for="">微站文章内容设置</label></th>
					<td>
				    <a href="<?php  echo create_url('site/module/Article',array('name'=>'site'));?>">点击管理文章</a>
					</td>
				</tr>
				<tr>
					<th>温馨提示：</th>
					<td>
						<font color="red">本微站文章是结合：行业应用里面的：‘微文章CMS’功能模块来处理实现的，功能更强大，更容易后期扩展。</font>
					</td>
				</tr>
			</table>
			</div>
	</div>
<?php  include template('common/footer', TEMPLATE_INCLUDEPATH);?>
