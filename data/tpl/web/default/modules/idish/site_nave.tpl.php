<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<ul class="nav nav-tabs">
	<li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('nave', array('op' => 'post'))?>">添加导航</a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('nave', array('op' => 'display'))?>">管理导航</a></li>
</ul>
<input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
<?php  if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
    <h4><?php  echo $title;?></h4>
	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
		<table class="tb">
            <tr>
                <th>导航类型</th>
                <td>
                    <select id="type" name="type" onchange="return changeType(this.value);">
                        <option value=-1 <?php  if($nave['type']==-1) { ?>selected<?php  } ?>>自定义</option>
                        <option value=2 <?php  if(empty($nave['type']) || $nave['type']==2) { ?>selected<?php  } ?>>门店列表</option>
                        <option value=3 <?php  if($nave['type']==3) { ?>selected<?php  } ?>>菜品列表</option>
                        <option value=4 <?php  if($nave['type']==4) { ?>selected<?php  } ?>>我的菜单</option>
                        <option value=5 <?php  if($nave['type']==5) { ?>selected<?php  } ?>>智能点餐</option>
                        <option value=6 <?php  if($nave['type']==6) { ?>selected<?php  } ?>>我的订单</option>
                    </select>
                    <span class="help-block">门店为显示顺序排第一的门店</span>
                </td>
            </tr>
			<tr>
				<th><label for="">导航名称</label></th>
				<td>
					<input type="text" name="linkname" class="span3" value="<?php  echo $nave['name'];?>" />
				</td>
			</tr>
            <tr id="trlink" style="display: none;">
                <th><label for="">导航链接</label></th>
                <td>
                    <input class="span6" type="text" name="link" id="link" value="<?php  echo $nave['link'];?>" />
                    <span class="help-block">指定这个导航的链接目标</span>
                    <div class="alert-block" style="padding:3px 0;"><strong class="text-error">使用模块链接:</strong>
                        <a href="javascript:;" class="icon-external-link" onclick="$('#link').val('mobile.php?act=module&do=wapindex&name=icard&weid=<?php  echo $_W['weid'];?>');">会员卡</a> &nbsp;
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="">状态</label></th>
                <td>
                    <label for="status_1" class="radio inline"><input autocomplete="off" type="radio" name="status" id="status_1" value="1" <?php  if($nave['status'] == 1 || empty($nave['status'])) { ?> checked="checked"<?php  } ?> /> 显示</label>
                    <label for="status_0" class="radio inline"><input autocomplete="off" type="radio" name="status" id="status_0" value="0" <?php  if(isset($nave['status']) && $nave['status'] == 0) { ?> checked="checked"<?php  } ?> /> 隐藏</label>
                    <span class="help-block">设置导航菜单的显示状态</span>
                </td>
            </tr>
            <tr>
                <th><label for="">排序</label></th>
                <td>
                    <input type="text" name="displayorder" class="span6" value="<?php  echo $nave['displayorder'];?>" />
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
<script language="javascript">
    function changeType(v) {
        var type = v;
        if (type == -1) {
            $("#trlink").show();
        } else {
            $("#trlink").hide();
        }
    }
    $("trlink").hide();
</script>
<?php  } else if($operation == 'display') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?></h4>
        <div>
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:60px;">显示顺序</th>
                <th>导航名称</th>
                <th style="width:80px;">状态</th>
                <th style="width:80px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($nave)) { foreach($nave as $row) { ?>
            <tr>
                <td><input type="text" class="span1" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
                <td><div class="type-parent"><?php  echo $row['name'];?>&nbsp;&nbsp;</div></td>
                <td>
                    <?php  if($row['status']==1) { ?>
                    <span class="label label-success">显示</span>
                    <?php  } else { ?>
                    <span class="label label-error">隐藏</span>
                    <?php  } ?>
                </td>
                <td>
                    <a class="btn" href="<?php  echo $this->createWebUrl('nave', array('op' => 'post', 'id' => $row['id']))?>" title="编辑"><i class="icon-edit"></i></a>&nbsp;&nbsp;<a class="btn" href="<?php  echo $this->createWebUrl('nave', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除吗？');return false;" title="删除"><i class="icon-remove"></i></a></td>
            </tr>
            <?php  } } ?>
            <tr>
                <td colspan="4">
                    <input name="submit" type="submit" class="btn btn-primary" value="提交">
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </form>
    <?php  echo $pager;?>
</div>
<?php  } ?>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>