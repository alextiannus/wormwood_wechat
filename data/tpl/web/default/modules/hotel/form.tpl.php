<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="alert alert-block alert-new">
	<a class="close" data-dismiss="alert">×</a>
	<h4 class="alert-heading">添加微预定</h4>
	<table>
		<tbody>		
			<tr>
				<th>活动名称</th>
				<td><input type="text" name="title"  class="span7" value="<?php  echo $reply['title'];?>"> </td>
			</tr>
			<tr>
				<th>商户名称</th>
				<td><input type="text" name="shop"  class="span7" value="<?php  echo $reply['shop'];?>"> </td>
			</tr>
			<tr>
				<th>商户地址</th>
				<td><input type="text" name="address"  class="span7" value="<?php  echo $reply['address'];?>"> </td>
			</tr>
			<tr>
				<th>商户电话</th>
				<td><input type="text" name="phone"  class="span7" value="<?php  echo $reply['phone'];?>"> </td>
			</tr>
			<tr>
				<th>接收订单邮箱</th>
				<td><input type="text" name="mail"  class="span7" value="<?php  echo $reply['mail'];?>"> </td>
			</tr>
			<tr>
				<th>每人每天订单数</th>
				<td><input type="text" name="ordermax"  class="span7" value="<?php  echo $reply['ordermax'];?>"> </td>
			</tr>
			<tr>
				<th>每单订房上限</th>
				<td><input type="text" name="numsmax"  class="span7" value="<?php  echo $reply['numsmax'];?>"> </td>
			</tr>
			<tr>
				<th>最长预定天数</th>
				<td><input type="text" name="daymax"  class="span7" value="<?php  echo $reply['daymax'];?>"> </td>
			</tr>
			<tr>
				<th>图文消息图片</th>
				<td>
					<div id="" class="uneditable-input reply-edit-cover">
						<div class="detail">
							<span class="pull-right">大图片建议尺寸：640像素 * 320像素</span>
							<input type="button" id="bless-picture" fieldname="picture<?php  echo $namesuffix;?>" class="btn btn-mini reply-edit-cover-upload" value="<i class='icon-upload-alt'></i> 上传" style="" />
							<button type="button" class="btn btn-mini reply-news-edit-cover-remove" id="upload-delete" onclick="doDeleteItemImage(this, ''<?php  echo create_url('site/module/deleteimage', array('id' => $reply['id'], 'name' => 'grabseat'))?>'')" style="<?php  if(empty($reply['picture'])) { ?> display:none;<?php  } ?>"><i class="icon-remove"></i> 删除</button>
						</div>
						<?php  if(!empty($reply['picture'])) { ?>
						<input type="hidden" name="picture-old" value="<?php  echo $reply['picture'];?>">
						<div id="upload-file-view" class="upload-view">
							<input type="hidden" id="bless-picture-value" value="<?php  echo $reply['picture'];?>">
							<img width="100" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['picture'];?>">&nbsp;&nbsp;
						</div>
						<?php  } else { ?>
						<div id="upload-file-view"></div>
						<?php  } ?>
					</div>
				</td>
			</tr>
			<tr>
				<th>商户简介</th>
				<td>
					<textarea style="height:100px;" name="description" class="span7 " cols="60"><?php  echo $reply['description'];?></textarea>
					<div class="help-block">用于正文内的详情</div>
				</td>
			</tr>
			<tr>
				<th>订房说明</th>
				<td>
					<textarea style="height:100px;" name="content" class="span7 richtext-clone" cols="60"><?php  echo $reply['content'];?></textarea>
					<div class="help-block">生成推广码后页面中显示，多为推荐、邀请的说明。</div>
				</td>
			</tr>
		
		</tbody>
	</table>	
</div>

<script type="text/javascript">

kindeditor($('#rule'));
kindeditorUploadBtn($('#bless-picture'));
kindeditorUploadBtn($('#user-bgimage'));

</script>
<script type="text/javascript">

	kindeditor($('.richtext-clone'));

</script>