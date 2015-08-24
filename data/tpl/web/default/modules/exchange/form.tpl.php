<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="alert alert-block alert-new">
	<a class="close" data-dismiss="alert">×</a>
	<h4 class="alert-heading">添加兑换活动</h4>
	<table>
		<tbody>		
			<tr>
				<th>活动名称</th>
				<td><input type="text" name="title"  class="span7" value="<?php  echo $reply['title'];?>"> </td>
			</tr>
			<tr>
				<th>奖品名称</th>
				<td><input type="text" name="product"  class="span7" value="<?php  echo $reply['product'];?>"> </td>
			</tr>
			<tr>
				<th>奖品单价</th>
				<td><input type="text" name="price"  class="span7" value="<?php  echo $reply['price'];?>"> </td>
			</tr>
			<tr>
				<th>奖品数量</th>
				<td><input type="text" name="amount"  class="span7" value="<?php  echo $reply['amount'];?>"> </td>
			</tr>
			<tr>
				<th>每日兑换次数</th>
				<td><input type="text" name="times"  class="span7" value="<?php  echo $reply['times'];?>"> </td>
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
				<th>活动简介</th>
				<td>
					<textarea style="height:100px;" name="description" class="span7 " cols="60"><?php  echo $reply['description'];?></textarea>
				</td>
			</tr>
			<tr>
				<th>活动内容</th>
				<td>
					<textarea style="height:100px;" name="content" class="span7 richtext-clone" cols="60"><?php  echo $reply['content'];?></textarea>
				</td>
			</tr>
			<tr>
				<th>兑换完成提示</th>
				<td>
					<textarea style="height:100px;" name="success" class="span7 " cols="60"><?php  echo $reply['success'];?></textarea>
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