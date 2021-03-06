<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<ul class="nav nav-tabs">
	<li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/module/coupon', array('name' => 'member', 'op' => 'post'));?>">添加</a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/module/coupon', array('name' => 'member', 'op' => 'display'));?>">管理</a></li>
	<li <?php  if($operation == 'history') { ?>class="active"<?php  } ?>><a href="<?php  echo create_url('site/module/coupon', array('name' => 'member', 'op' => 'history'));?>">使用记录</a></li>
</ul>
<?php  if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
		<h4>名称</h4>
		<table class="tb">
			<tr>
				<th><label for="">排序</label></th>
				<td>
					<input type="text" name="displayorder" class="span2" value="<?php  echo $item['displayorder'];?>" />
				</td>
			</tr>
			<tr>
				<th><label for="">是否可用</label></th>
				<td>
					<label for="isshow7" class="radio inline"><input type="radio" name="status" value="1" id="isshow7" <?php  if(empty($item) || $item['status'] == 1) { ?>checked="true"<?php  } ?> /> 是</label>
					&nbsp;&nbsp;&nbsp;
					<label for="isshow8" class="radio inline"><input type="radio" name="status" value="0" id="isshow8"  <?php  if(!empty($item) && $item['status'] == 0) { ?>checked="true"<?php  } ?> /> 否</label>
					<span class="help-block"></span>
				</td>
			</tr>
			<tr>
				<th><label for="">名称</label></th>
				<td>
					<input type="text" name="title" class="span5" value="<?php  echo $item['title'];?>" />
				</td>
			</tr>
			<tr>
				<th><label for="">使用期限</label></th>
				<td>
					<?php  echo tpl_form_field_daterange('datelimit', array(), '')?>
				</td>
			</tr>
			<tr>
				<th><label for="">类型</label></th>
				<td>
					<div class="append-inline">
					<?php  if(is_array($type)) { foreach($type as $i => $row) { ?>
					<label for="isshow<?php  echo $i;?>" class="radio inline"><input type="radio" name="type" value="<?php  echo $i;?>" id="isshow<?php  echo $i;?>" <?php  if($item['type'] == $i) { ?>checked<?php  } ?> /> <?php  echo $row;?></label>&nbsp;&nbsp;&nbsp;
					<?php  } } ?>
					</div>
					<span class="help-block">
						<p>现金券，消费者持券消费可抵用部分现金</p>
						<p>折扣券，消费者持券消费可享受消费折扣</p>
						<p>体验券，消费者持券消费可体验部分服务</p>
						<p>礼品券，消费者持券消费可领用指定礼品</p>
						<p>特价券，消费者持券消费可购买特价商品</p>
						<p>换购券，消费者持换购券可以换购指定商品</p>
					</span>
				</td>
			</tr>
			<tr>
				<th><label for="">每人可领取数量</label></th>
				<td>
					<input type="text" name="pretotal" class="span2" value="<?php  echo $item['pretotal'];?>" />
					<span class="help-block">此设置项设置每个用户可领取此优惠券数量。</span>
				</td>
			</tr>
			<tr>
				<th><label for="">优惠券总数量</label></th>
				<td>
					<input type="text" name="total" class="span2" value="<?php  echo $item['total'];?>" />
					<span class="help-block">此设置项设置优惠券的总发行数量。</span>
				</td>
			</tr>
			<tr>
				<th>内容</th>
				<td>
					<textarea style="height:400px; width:100%;" class="span7 richtext-clone" name="content" cols="70"><?php  echo $item['content'];?></textarea>
				</td>
			</tr>
		<tr>
			<th></th>
			<td>
				<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</td>
		</tr>
		</table>
	</form>
</div>
<script type="text/javascript">
<!--
	kindeditor($('.richtext-clone'));
//-->
</script>
<?php  } else if($operation == 'display') { ?>
<div class="main">
	<div class="search">
		<form action="site.php" method="get">
		<input type="hidden" name="act" value="module" />
		<input type="hidden" name="do" value="coupon" />
		<input type="hidden" name="op" value="display" />
		<input type="hidden" name="name" value="member" />
		<table class="table table-bordered tb">
			<tbody>
				<tr>
					<th>关键字</th>
					<td>
						<input class="span6" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
					</td>
				</tr>
				<tr>
					<th>状态</th>
					<td>
						<select name="status">
							<option value="1" <?php  if(!empty($_GPC['status'])) { ?> selected<?php  } ?>>启用</option>
							<option value="0" <?php  if(empty($_GPC['status'])) { ?> selected<?php  } ?>>禁用</option>
						</select>
					</td>
				</tr>
				<tr>
				 <tr class="search-submit">
					<td colspan="2"><button class="btn pull-right span2"><i class="icon-search icon-large"></i> 搜索</button></td>
				 </tr>
			</tbody>
		</table>
		</form>
	</div>
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="min-width:150px;">标题</th>
					<th style="width:200px;">有效时间</th>
					<th style="width:100px;">每人可用数量</th>
					<th style="width:100px;">总数量</th>
					<th style="width:100px;">类型</th>
					<th style="width:100px;">状态</th>
					<th style="text-align:right; min-width:60px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['title'];?></td>
					<td><?php  echo date('Y-m-d', $item['starttime'])?> - <?php  echo date('Y-m-d', $item['endtime'])?></td>
					<td><?php  echo $item['pretotal'];?></td>
					<td><?php  echo $item['total'];?></td>
					<td><span class="label label-info"><?php  echo $type[$item['type']];?></span></td>
					<td><?php  if($item['status']) { ?><span class="label label-success">可用</span><?php  } else { ?><span class="label label-error">禁用</span><?php  } ?></td>
					<td style="text-align:right;">
						<a href="<?php  echo create_url('site/module/coupon', array('name' => 'member', 'id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-small"><i class="icon-edit"></i></a>
						<a href="<?php  echo create_url('site/module/coupon', array('name' => 'member', 'id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-small"><i class="icon-remove"></i></a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
			<!--tr>
				<td colspan="8">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
					<input type="submit" class="btn btn-primary" name="submit" value="提交" />
				</td>
			</tr-->
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  } else if($operation == 'history') { ?>
<div class="main">
	<div class="search">
		<form action="site.php" method="get">
		<input type="hidden" name="act" value="module" />
		<input type="hidden" name="do" value="coupon" />
		<input type="hidden" name="op" value="history" />
		<input type="hidden" name="name" value="member" />
		<table class="table table-bordered tb">
			<tbody>
				<tr>
					<th>接收者</th>
					<td>
						<select name="receiver">
							<?php  if(is_array($receiver)) { foreach($receiver as $item) { ?>
							<option value="<?php  echo $item['name'];?>" <?php  if($_GPC['receiver'] == $item['name']) { ?> selected<?php  } ?>><?php  echo $item['name'];?></option>
							<?php  } } ?>
						</select>
					</td>
				</tr>
				<tr>
				 <tr class="search-submit">
					<td colspan="2"><button class="btn pull-right span2"><i class="icon-search icon-large"></i> 搜索</button></td>
				 </tr>
			</tbody>
		</table>
		</form>
	</div>
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="min-width:150px;">优惠券名称</th>
					<th style="width:200px;">领券时间</th>
					<th style="width:100px;">使用时间</th>
					<th style="width:100px;">接收者</th>
					<th style="text-align:right; min-width:60px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $coupons[$item['couponid']]['title'];?></td>
					<td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
					<td><?php  echo date('Y-m-d H:i:s', $item['consumetime'])?></td>
					<td><?php  echo $item['receiver'];?></td>
					<td></td>
				</tr>
				<?php  } } ?>
			</tbody>
			<!--tr>
				<td colspan="5">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
					<input type="submit" class="btn btn-primary" name="submit" value="提交" />
				</td>
			</tr-->
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  } ?>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>