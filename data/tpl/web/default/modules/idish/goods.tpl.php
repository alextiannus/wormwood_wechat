<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<link rel="stylesheet" type="text/css" href="./source/modules/ishopping/style/css/uploadify_t.css" media="all" />
<!--<ul class="nav nav-tabs">-->
	<!--<li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('goods', array('op' => 'post'))?>">添加商品</a></li>-->
	<!--<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('goods', array('op' => 'display'))?>">管理商品</a></li>-->
<!--</ul>-->
<?php  echo $this -> set_tabbar($action, $storeid);?>
<?php  if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
		<h4>添加菜品 - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'idish'));?>" style="font-size:0.8em">入口设置</a></h4>
		<table class="tb">
            <tr>
                <th><label for="">人气值</label></th>
                <td>
                    <input type="text" name="subcount" class="span7" value="<?php  echo $item['subcount'];?>" />
                    <div class="help-block">人气值大于20时显示人气图标</div>
                </td>
            </tr>
			<tr>
				<th>菜品分类</th>
				<td>
					<select class="span3" style="margin-right:15px;" name="pcate" onchange="fetchChildCategory(this.options[this.selectedIndex].value)"  autocomplete="off">
						<option value="0">请选择分类</option>
						<?php  if(is_array($category)) { foreach($category as $row) { ?>
						<option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $item['pcate']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
						<?php  } } ?>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="">菜品名称</label></th>
				<td>
					<input type="text" name="goodsname" class="span3" value="<?php  echo $item['title'];?>" />
				</td>
			</tr>
            <tr>
                <th><label for="" style="color:#f00">特价菜品</label></th>
                <td>
                    <select class="span3" style="margin-right:15px;" id="isspecial" name="isspecial" autocomplete="off">
                        <option value="1" <?php  if($item['isspecial']==1 || empty($item)) { ?> selected="selected"<?php  } ?>>未启用</option>
                        <option value="2" <?php  if($item['isspecial']==2) { ?> selected="selected"<?php  } ?>>特价</option>
                        <option value="3" <?php  if($item['isspecial']==3) { ?> selected="selected"<?php  } ?>>会员</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="" style="color:#f00">特价价格</label></th>
                <td>
                    <input type="text" name="marketprice" class="span3" value="<?php  echo $item['marketprice'];?>" /> 元
                </td>
            </tr>
            <tr>
                <th><label for="">菜品原价</label></th>
                <td>
                    <input type="text" name="productprice" class="span3" value="<?php  echo $item['productprice'];?>" /> 元
                </td>
            </tr>
			<tr>
				<th><label for="">菜品单位</label></th>
				<td>
					<!--<input type="text" name="unitname" class="span3" value="<?php  echo $item['unitname'];?>" />-->
                    <select id="unitname" name="unitname">
                        <option <?php  if($item['unitname']=='份' || empty($item)) { ?>selected="selected"<?php  } ?> value="份">份</option>
                        <option <?php  if($item['unitname']=='斤') { ?>selected="selected"<?php  } ?> value="斤">斤</option>
                        <option <?php  if($item['unitname']=='两') { ?>selected="selected"<?php  } ?> value="两">两</option>
                        <option <?php  if($item['unitname']=='打') { ?>selected="selected"<?php  } ?> value="打">打</option>
                        <option <?php  if($item['unitname']=='袋') { ?>selected="selected"<?php  } ?> value="袋">袋</option>
                        <option <?php  if($item['unitname']=='台') { ?>selected="selected"<?php  } ?> value="台">台</option>
                        <option <?php  if($item['unitname']=='升') { ?>selected="selected"<?php  } ?> value="升">升</option>
                        <option <?php  if($item['unitname']=='个') { ?>selected="selected"<?php  } ?> value="个">个</option>
                    </select>
				</td>
			</tr>
			<tr>
				<th><label for="">是否上架</label></th>
				<td>
					<label for="isshow1" class="radio inline"><input type="radio" name="status" value="1" id="isshow1" <?php  if(empty($item) || $item['status'] == 1) { ?>checked="true"<?php  } ?> /> 是</label>
					&nbsp;&nbsp;&nbsp;
					<label for="isshow2" class="radio inline"><input type="radio" name="status" value="0" id="isshow2"  <?php  if(!empty($item) && $item['status'] == 0) { ?>checked="true"<?php  } ?> /> 否</label>
					<span class="help-block"></span>
				</td>
			</tr>
			<tr>
				<th><label for="">菜品图片</label></th>
				<td>
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"><?php  if($item['thumb']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>" width="200" /><?php  } ?></div>
						<div>
							<span class="btn btn-file"><span class="fileupload-new">选择图片</span><span class="fileupload-exists">更改</span><input name="thumb" type="file" /></span>
							<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
						</div>
					</div>
					<span class="help-block"></span>
				</td>
			</tr>
			<tr>
				<th>菜品描述</th>
				<td>
					<textarea style="height:150px;" class="span7" name="description" cols="70"><?php  echo $item['description'];?></textarea>
				</td>
			</tr>
            <tr>
                <th>口味</th>
                <td>
                    <textarea style="height:50px;" class="span7" name="taste" cols="70"><?php  echo $item['taste'];?></textarea>
                </td>
            </tr>
            <tr>
                <th><label for="">排序</label></th>
                <td>
                    <input type="text" name="displayorder" class="span1" value="<?php  echo $item['displayorder'];?>" />
                </td>
            </tr>
			<!--<tr>-->
				<!--<th>内容</th>-->
				<!--<td>-->
					<!--<textarea style="height:400px; width:100%;" class="span7 richtext-clone" name="content" cols="70"><?php  echo $item['content'];?></textarea>-->
				<!--</td>-->
			<!--</tr>-->
			<!--<tr>-->
				<!--<th>商品图片</th>-->
				<!--<td>-->
					<!--<div id="upimg_main">-->
						<!--<div id="file_upload" class="uploadify">-->
						<!--<span class="btn btn-file"><span class="fileupload-new" id="file_upload-button">选择图片</span></span><span class="maroon">*</span></div>-->
						<!--<div id="file_upload-queue" class="uploadify-queue"></div>-->
						<!--<ul class="ipost-list ui-sortable" id="fileList">-->
							<?php  if(is_array($item['thumbArr'])) { foreach($item['thumbArr'] as $row) { ?>
							<!--<li class="imgbox"><a class="thumb_close" href="javascript:void(0)" title="删除"></a>  -->
							<!--<input type="hidden" value="<?php  echo $row;?>" name="thumb_url[]">-->
							<!--<span class="item_box"><img src="<?php  echo $row;?>"></span>-->
							<!--</li>-->
							<?php  } } ?>
						<!--</ul>-->
						<!--<div id="file_upload_queue" class="uploadifyQueue"></div>-->
					<!--</div>-->
				<!--</td>-->
			<!--</tr>-->
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
	var category = <?php  echo json_encode($children)?>;
	kindeditor($('.richtext-clone'));
//-->
</script>
<script type="text/javascript" src="./resource/script/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="./resource/script/kindeditor/lang/zh_CN.js"></script>
<link type="text/css" rel="stylesheet" href="./resource/script/kindeditor/themes/default/default.css" />
 <script type="text/javascript">
var editor = KindEditor.editor({
	allowFileManager : true,
	uploadJson : "./index.php?act=attachment&do=upload",
	fileManagerJson : "./index.php?act=attachment&do=manager"
	});
	$("#file_upload-button").click(function() {
		editor.loadPlugin("image", function() {
		editor.plugin.imageDialog({
			imageUrl : $("#upload-image-url-thumb").val(),
			clickFn : function(url) {
				editor.hideDialog();
				var filename = /images(.*)/.exec(url);
					html='<li class="imgbox"><a class="thumb_close" href="javascript:void(0)" title="删除"></a><input type="hidden" value="'+url+'" name="thumb_url[]"><span class="item_box"><img src="'+url+'"></span></li>';
					$("#fileList").append(html);
			}
		});
	});
});
    $("a.thumb_close").live("click ", function (n) {
        $(this).parent().remove();
    });
</script>
<script type="text/javascript">
    $(function(){
//        $('#isspecial').change(function(){
//            alert('123123');
//        });
    });

</script>
<?php  } else if($operation == 'display') { ?>
<div class="main">
    <div class="search">
        <form action="site.php" method="get">
            <input type="hidden" name="act" value="module" />
            <input type="hidden" name="do" value="goods" />
            <input type="hidden" name="name" value="idish" />
            <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
            <input type="hidden" name="op" value="display" />
            <table class="table table-bordered tb">
                <tbody>
                <tr>
                    <th>关键字</th>
                    <td>
                        <input class="span6" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
                    </td>
                </tr>
                <tr>
                    <th>菜品分类</th>
                    <td>
                        <select class="span3" style="margin-right:15px;" name="category_id" >
                            <option value="0">请选择菜品分类</option>
                            <?php  if(is_array($category)) { foreach($category as $row) { ?>
                            <option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $_GPC['category_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                <tr class="search-submit">
                    <td colspan="2"><button class="btn span2 btn-primary" style="margin-left: 95px;"><i class="icon-search icon-large"></i> 搜索</button></td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
    <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
    <a class="btn" href="<?php  echo $this->createWebUrl('goods', array('op' => 'post', 'storeid' => $storeid))?>"><i class="icon-plus"></i>添加菜品</a>
    <a class="btn" href="javascript:location.reload()"><i class="icon-refresh"></i>刷新</a>
	<div style="padding-top:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
                    <th style="width:100px;">显示顺序</th>
					<th style="width:30px;">ID</th>
					<th style="min-width:150px;">菜品名称</th>
                    <th style="max-width:30px;">图片</th>
                    <th style="width:100px;">特价</th>
					<th style="width:100px;">原价</th>
                    <th style="width:60px;">单位</th>
					<th style="min-width:100px;">是否上架</th>
                    <th style="min-width:80px;">人气</th>
					<th style="text-align:right; min-width:60px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
                    <td><input type="text" class="span1" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>"></td>
					<td><?php  echo $item['id'];?></td>
					<td><?php  if(!empty($category[$item['pcate']])) { ?><span class="text-error">[<?php  echo $category[$item['pcate']]['name'];?>] </span><?php  } ?><?php  echo $item['title'];?></td>
                    <td>
                        <img src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>" width="50" />
                    </td>
                    <td style="color:#f00;">
                        <?php  if($item['isspecial'] == 2) { ?>[特价]<?php  echo $item['marketprice'];?>元<?php  } else if($item['isspecial'] == 3) { ?>[会员]<?php  echo $item['marketprice'];?>元<?php  } ?>
                    </td>
					<td>
                        <?php  echo $item['productprice'];?>元
                    </td>
                    <td>
                        <?php  echo $item['unitname'];?>
                    </td>
					<td><?php  if($item['status']) { ?><span class="label label-success">已上架</span><?php  } else { ?><span class="label label-error">已下架</span><?php  } ?></td>
                    <td><?php  echo $item['subcount'];?></td>
					<td style="text-align:right;">
						<a href="<?php  echo $this->createWebUrl('goods', array('id' => $item['id'], 'op' => 'post', 'storeid' => $storeid))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('goods', array('id' => $item['id'], 'op' => 'delete', 'storeid' => $storeid))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;">删除</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
			<tr>
				<td colspan="10">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
					<input type="submit" class="btn btn-primary" name="submit" value="批量更新排序" />
				</td>
			</tr>
		</table>
		<?php  echo $pager;?>
	</div>
    </form>
</div>
<script type="text/javascript">
<!--
	var category = <?php  echo json_encode($children)?>;
//-->
</script>
<?php  } ?>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>