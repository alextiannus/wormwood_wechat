<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="alert alert-block alert-new">
	<h4 class="alert-heading">添加微点餐</h4>
	<table>
		<tbody>
			<tr>
				<th>标题</th>
				<td>
					<input type="text" value="<?php  echo $reply['title'];?>" class="span3" name="title">
                    <div class="help-block">用于图文显示的标题</div>
				</td>
			</tr>
            <tr>
                <th>入口类型</th>
                <td>
                    <select id="type" name="type" >
                        <option value=1 <?php  if(empty($reply['type']) || $reply['type']==1) { ?>selected<?php  } ?>>首页</option>
                        <option value=2 <?php  if($reply['type']==2) { ?>selected<?php  } ?>>门店列表</option>
                        <option value=3 <?php  if($reply['type']==3) { ?>selected<?php  } ?>>菜品列表</option>
                        <option value=4 <?php  if($reply['type']==4) { ?>selected<?php  } ?>>我的菜单</option>
                        <option value=4 <?php  if($reply['type']==5) { ?>selected<?php  } ?>>智能点餐</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>入口门店</th>
                <td>
                    <select id="store" name="store" >
                        <?php  if(is_array($stores)) { foreach($stores as $store) { ?>
                        <option value=<?php  echo $store['id'];?> "<?php  if($store['id']==$reply['storeid']) { ?>selected<?php  } ?>"><?php  echo $store['title'];?></option>
                        <?php  } } ?>
                    </select>
                </td>
            </tr>
			<tr>
				<th>封面</th>
				<td><?php  echo tpl_form_field_image('picture', $reply['picture'])?></td>
			</tr>
			<tr>
				<th>内容简介</th>
				<td>
					<textarea style="height:150px;" name="description" class="span7" cols="60"><?php  echo $reply['description'];?></textarea>
					<div class="help-block">用于图文显示的简介</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
